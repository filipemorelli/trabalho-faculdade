<?php

App::uses('AuthComponent', 'Controller/Component');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class TrabalhadoresController extends AppController
{
    public $uses = array('Trabalhador');
    public $components = array('Paginator');

    private function TemPerfil(){
        $qtde = $this->Trabalhador->find('count', array(
            'conditions' => array(
                'user_id =' => $this->Session->read('Auth.User.id'),
            ),
        ));
        return $qtde == 1;
    }

    private function ForcaCriarPerfil(){
        if(!$this->TemPerfil() && $this->request->params['action'] !== "editarPerfilTrabalhador"){
            if($this->Session->read('Auth.User.tipo') === "trabalhador"){
                $this->Session->setFlash(__('Precisa criar seu perfil!'), 'info');
            }
            return $this->redirect(array('action' => 'editarPerfilTrabalhador'));
        }
        return true;
    }

    public function beforeFilter()
    {
        $this->ForcaCriarPerfil();
        if(!parent::isAuth()){
            $this->redirect(array("controller" => "pages", "action" => "editarPerfilTrabalhador"));
        }
        $tipoUsuario = $this->Session->read('Auth.User.tipo');
        switch ($tipoUsuario) {
            case 'trabalhador':
                $this->layout = "trabalhador";
                break;
            case 'empregador':
                $this->layout = "empregador";
                break;
            default:
                $this->layout = "pagina";
                break;
        }
        //$this->Auth->allow(array('buscarfissionais', 'perfilEmpresa', 'editarPerfilEmpresa', 'adicionarVaga', 'listarVagas', 'detalhesVaga', 'candidatarVaga', 'candidadosAVaga'));
    }

    /**
    Editar Perfil Trabalhador
    */
    public function editarPerfilTrabalhador(){
        $this->set('title_for_layout', __('Editar Perfil'));

        if ($this->request->is(array('post', 'put'))) {
            // verifica se existe perfil criado

            $trabalhadorId = $this->Trabalhador->find('first', array(
                'fields' => array('id'),
                'conditions' => array(
                    'user_id =' => $this->Session->read('Auth.User.id'),
                ),
                'recursive' => -1
            ));
            if(!isset($trabalhadorId['Trabalhador']['id'])){
                $this->Trabalhador->create(); //cria perfil
            } else {
                $this->request->data['Trabalhador']['id'] = $trabalhadorId['Trabalhador']['id'];
            }
            //coloca o user_id para vincular a conta
            $this->request->data['Trabalhador']['user_id'] = $this->Session->read('Auth.User.id');
            //salva ou atualiza
            if ($this->salvaRequisicaoTrabalhador($this->request->data)) {
                $this->Session->setFlash(__('Perfil salvo com sucesso'), 'success');
                return $this->redirect(array('action' => 'editarPerfilTrabalhador'));
            }
            $this->Session->setFlash(
                __('Perfil não pode ser salvo.'), 'error'
            );
        } else {
            $this->request->data = $this->Trabalhador->find('first', array(
                'conditions' => array(
                    'user_id =' => $this->Session->read('Auth.User.id')
                )
            ));
            if(!isset($this->request->data['Trabalhador']['nome'])){
                $this->request->data['Trabalhador']['nome'] = $this->Session->read('Auth.User.nome');
            }
            if(!isset($this->request->data['Trabalhador']['email'])){
                $this->request->data['Trabalhador']['email'] = $this->Session->read('Auth.User.email');
            }
            unset($this->request->data['Trabalhador']['password']);
        }
    }

    private function salvaRequisicaoTrabalhador($data){
        $endereco = $data['Endereco'];
        $trabalhador = $data['Trabalhador'];
        $trabalhadorEscolaridade = $data['TrabalhadorEscolaridade'];
        $trabalhadorExperiencia = $data['TrabalhadorExperiencia'];

        $endereco_id = 0; //mudar para 0 depois dos testes
             
        //salvar/atualizar endereco
        $endereco_id = $this->salvaEndereco($endereco);

        //manipulacao de pedido
        $trabalhador['endereco_id'] = $endereco_id;
        $trabalhador_id = $this->salvaTrabalhador($trabalhador);
        $this->salvaTrabalhadorEscolaridade($trabalhadorEscolaridade, $trabalhador_id);
        return $this->salvaTrabalhadorExperiencia($trabalhadorExperiencia, $trabalhador_id);

    }

    private function salvaEndereco($endereco){

        $existeEndereco = $this->Trabalhador->Endereco->find('first', array(
            'conditions' => array(
                'endereco' => $endereco['endereco'],
                'complemento' => $endereco['complemento'],
                'bairro' => $endereco['bairro'],
                'cidade' => $endereco['cidade'],
                'estado' => $endereco['estado'],
                'numero' => $endereco['numero'],
                'cep' => $endereco['cep'],
            )
        ));
        if (!$existeEndereco) {
            $this->Empresa->Vaga->Endereco->create();
            if ($this->Empresa->Vaga->Endereco->save($endereco)) {
                return $this->Empresa->Vaga->Endereco->id;
            } else {
                //nao chega aqui mas caso chegar
                 throw new NotFoundException(__('Imposivel cadastro de endereco'));
            }
        } else {
            return $existeEndereco['Endereco']['id'];
        }
    }

    private function salvaTrabalhador($trabalhador){
        $id = $trabalhador['id'];
        $this->Trabalhador->id = $id;
        if (!$this->Trabalhador->exists()) {
            $this->Trabalhador->create();
            if ($this->Trabalhador->save($trabalhador)) {
                return $this->Trabalhador->id;
            } else {
                //nao chega aqui mas caso chegar
                 throw new NotFoundException(__('Imposivel cadastro de trabalhador'));
            }
        } else if ($this->Trabalhador->save($trabalhador)) {
            return $this->Trabalhador->id;
        } else {
            throw new NotFoundException(__('Imposivel cadastro/edicao de trabalhador'));
        }
    }

    private function salvaTrabalhadorEscolaridade($trabalhadorEscolaridades, $trabalhador_id){

        //limpa dados que existem na tabela
        $this->limpaTrabalhadorEscolaridade($trabalhador_id);

        foreach ($trabalhadorEscolaridades as $escolaridade) {
            $escolaridade['TrabalhadorEscolaridade'] = $escolaridade;
            $escolaridade['TrabalhadorEscolaridade']['trabalhador_id'] = $trabalhador_id;
            if (!$this->Trabalhador->TrabalhadorEscolaridade->saveAll($escolaridade)) {
                throw new NotFoundException(__('Imposivel cadastro de Escolaridade'));
            }
        }
        return true;
    }

    private function limpaTrabalhadorEscolaridade($trabalhador_id){
        return $this->Trabalhador->TrabalhadorEscolaridade->query("DELETE FROM escolaridade WHERE trabalhador_id = $trabalhador_id");
    }

    private function salvaTrabalhadorExperiencia($trabalhadorExperiencia, $trabalhador_id){

        //limpa dados que existem na tabela
        $this->limpaTrabalhadorExperiencia($trabalhador_id);

        foreach ($trabalhadorExperiencia as $experiencia) {
            $experiencia['TrabalhadorExperiencia'] = $experiencia;
            $experiencia['TrabalhadorExperiencia']['trabalhador_id'] = $trabalhador_id;
            $this->Trabalhador->TrabalhadorExperiencia->create();
            if (!$this->Trabalhador->TrabalhadorExperiencia->save($experiencia)) {
                throw new NotFoundException(__('Imposivel cadastro de Experiência'));
            }
        }
        return true;
    }

    private function limpaTrabalhadorExperiencia($trabalhador_id){
        return $this->Trabalhador->TrabalhadorExperiencia->query("DELETE FROM experiencia WHERE trabalhador_id = $trabalhador_id");
    }

}

?>