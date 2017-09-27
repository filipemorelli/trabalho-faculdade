<?php
/**
 * Class TrabalhadoresController | Controller/TrabalhadoresController
 * 
 * Controller dos trabalhadores
 * 
 * @author Filipe Morelli <morellitecinfo@gmail.com>
 * @version 1.0.0
 */
App::uses('AuthComponent', 'Controller/Component');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

/**
 * Class TrabalhadoresController controle da parte dos trabalhadores
 */
class TrabalhadoresController extends AppController
{
    /**
     * Para mudar o nome da model para deixar no portugues
     * 
     * @var array
     */
    public $uses = array('Trabalhador');
    
    /**
     * Ativa os componentes que serão usados
     * 
     * @var array
     */
    public $components = array('Paginator');

    /**
     * Verifica se usuário tem perfil
     *
     * @return bool
     */
    private function TemPerfil()
    {
        $qtde = $this->Trabalhador->find('count', array(
            'conditions' => array(
                'user_id =' => $this->Session->read('Auth.User.id'),
            ),
        ));
        return $qtde == 1;
    }

    /**
     * Força com que o usuário crie seu perfil antes de fazer qualquer modificação de seus dados
     *
     * @return bool|\Cake\Network\Response|null
     */
    private function ForcaCriarPerfil()
    {
        if (!$this->TemPerfil() && $this->request->params['action'] !== "editarPerfilTrabalhador") {
            if ($this->Session->read('Auth.User.tipo') === "trabalhador") {
                $this->Session->setFlash(__('Precisa criar seu perfil!'), 'info');
            }
            return $this->redirect(array('action' => 'editarPerfilTrabalhador'));
        }
        return true;
    }

    /**
     * Executa antes de executar os metodos
     */
    public function beforeFilter()
    {
        $this->ForcaCriarPerfil();
        if (!parent::isAuth()) {
            $this->redirect(array(
                "controller" => "pages",
                "action"     => "index"
            ));
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
        //$this->Auth->allow(array('buscarfissionais', 'perfilEmpresa', 'editarPerfilEmpresa', 'adicionarVaga', 'listarVagas', 'detalhesVaga', 'candidatarVaga', 'candidatosAVaga'));
    }

    /**
     * Editar Perfil Trabalhador
     */
    public function editarPerfilTrabalhador()
    {
        $this->set('title_for_layout', __('Editar Perfil'));

        if ($this->request->is(array(
            'post',
            'put'
        ))
        ) {
            // verifica se existe perfil criado

            $trabalhadorId = $this->Trabalhador->find('first', array(
                'fields'     => array('id'),
                'conditions' => array(
                    'user_id =' => $this->Session->read('Auth.User.id'),
                ),
                'recursive'  => -1
            ));
            if (!isset($trabalhadorId['Trabalhador']['id'])) {
                $this->Trabalhador->create(); //cria perfil
            }
            else {
                $this->request->data['Trabalhador']['id'] = $trabalhadorId['Trabalhador']['id'];
            }
            //coloca o user_id para vincular a conta
            $this->request->data['Trabalhador']['user_id'] = $this->Session->read('Auth.User.id');
            //salva ou atualiza
            if ($this->salvaRequisicaoTrabalhador($this->request->data)) {
                $this->Session->setFlash(__('Perfil salvo com sucesso'), 'success');
                return $this->redirect(array('action' => 'editarPerfilTrabalhador'));
            }
            $this->Session->setFlash(__('Perfil não pode ser salvo.'), 'error');
        }
        else {
            $this->request->data = $this->Trabalhador->find('first', array(
                'conditions' => array(
                    'user_id =' => $this->Session->read('Auth.User.id')
                )
            ));
            if (!isset($this->request->data['Trabalhador']['nome'])) {
                $this->request->data['Trabalhador']['nome'] = $this->Session->read('Auth.User.nome');
            }
            if (!isset($this->request->data['Trabalhador']['email'])) {
                $this->request->data['Trabalhador']['email'] = $this->Session->read('Auth.User.email');
            }
            unset($this->request->data['Trabalhador']['password']);
        }
    }


    /**
     * Metodo para usuário candidatar a vaga
     * 
     * @param int $id
     * @return void|\Cake\Network\Response
     */
    public function candidatarVaga($id = null)
    {
        $this->set('title_for_layout', __('Candidatar a vaga'));
        if (!is_null($id)) {
            $trabalhador = $this->Trabalhador->find('first', array(
                'conditions' => array(
                    'user_id' => $this->Session->read('Auth.User.id'),
                ),
                'recursive'  => -1
            ));
            $candidatoVaga = array(
                'TrabalhadorVaga' => array(
                    'trabalhador_id' => $trabalhador['Trabalhador']['id'],
                    'vaga_id'        => $id
                )
            );
            if ($this->Trabalhador->TrabalhadorVaga->save($candidatoVaga)) {
                $this->Session->setFlash(__('Candidatado com sucesso'), 'success');
                return $this->redirect(array(
                    'controller' => 'users',
                    'action'     => 'vaga',
                    'id'         => $id
                ));
            }
            $this->Session->setFlash(__('Não pode candidatar a vaga.'), 'error');
        }
        else {
            $this->redirect(array(
                "controller" => "users",
                "action"     => "vagas"
            ));
        }
    }

    /**
     * cancelar candidatura a vaga
     * 
     * @param int $id
     * @return void|\Cake\Network|response
     */
    public function cancelarCandidadidaturaVaga($id = null)
    {
        $this->set('title_for_layout', __('Candidatar a vaga'));
        if (!is_null($id)) {
            $trabalhador = $this->Trabalhador->find('first', array(
                'conditions' => array(
                    'user_id' => $this->Session->read('Auth.User.id'),
                ),
                'recursive'  => -1
            ));
            if ($this->removeCandidatura($trabalhador['Trabalhador']['id'], $id)) {
                $this->Session->setFlash(__('Candidatura cancelada com sucesso'), 'success');
                return $this->redirect(array(
                    'controller' => 'users',
                    'action'     => 'vaga',
                    'id'         => $id
                ));
            }
            $this->Session->setFlash(__('Não pode cancelar candididatura a vaga.'), 'error');
        }
        else {
            $this->redirect(array(
                "controller" => "users",
                "action"     => "vagas"
            ));
        }
    }

    /**
     * Remove candidatura da vaga
     *
     * @param int|null $trabalhador_id
     * @param int|null $vaga_id
     * @return bool
     */
    private function removeCandidatura($trabalhador_id = null, $vaga_id = null)
    {
        if (!is_null($trabalhador_id) && !is_null($vaga_id)) {
            $this->Trabalhador->TrabalhadorVaga->query("DELETE FROM trabalhador_vaga WHERE trabalhador_id = $trabalhador_id AND vaga_id = $vaga_id");
            return true;
        }
        return false;
    }

    /**
     * Salvar requisicao de perfil do trabalhador
     *
     * @param array $data
     * @return bool
     */
    private function salvaRequisicaoTrabalhador($data)
    {
        $endereco = $data['Endereco'];
        $trabalhador = $data['Trabalhador'];
        $trabalhadorEscolaridade = $data['TrabalhadorEscolaridade'];

        $endereco_id = 0; //mudar para 0 depois dos testes

        //salvar/atualizar endereco
        $endereco_id = $this->salvaEndereco($endereco);

        //manipulacao de pedido
        $trabalhador['endereco_id'] = $endereco_id;
        $trabalhador_id = $this->salvaTrabalhador($trabalhador);

        if (isset($data['TrabalhadorExperiencia'])) {
            $trabalhadorExperiencia = $data['TrabalhadorExperiencia'];
            $this->salvaTrabalhadorExperiencia($trabalhadorExperiencia, $trabalhador_id);
        }
        return $this->salvaTrabalhadorEscolaridade($trabalhadorEscolaridade, $trabalhador_id);

    }

    /**
     * Salva endereço do trabalhador
     *
     * @param $endereco
     * @return mixed
     */
    private function salvaEndereco($endereco)
    {

        $existeEndereco = $this->Trabalhador->Endereco->find('first', array(
            'conditions' => array(
                'endereco'    => $endereco['endereco'],
                'complemento' => $endereco['complemento'],
                'bairro'      => $endereco['bairro'],
                'cidade'      => $endereco['cidade'],
                'estado'      => $endereco['estado'],
                'numero'      => $endereco['numero'],
                'cep'         => str_replace('-', '', str_replace('.', '', $endereco['cep'])),
            )
        ));
        if (!$existeEndereco) {
            $this->Empresa->Vaga->Endereco->create();
            if ($this->Empresa->Vaga->Endereco->save($endereco)) {
                return $this->Empresa->Vaga->Endereco->id;
            }
            else {
                //nao chega aqui mas caso chegar
                throw new NotFoundException(__('Imposivel cadastro de endereco'));
            }
        }
        else {
            return $existeEndereco['Endereco']['id'];
        }
    }

    /**
     * Salva perfil do trabalhador
     *
     * @param $trabalhador
     * @return mixed
     */
    private function salvaTrabalhador($trabalhador)
    {
        $id = $trabalhador['id'];
        $this->Trabalhador->id = $id;
        if (!$this->Trabalhador->exists()) {
            $this->Trabalhador->create();
            if ($this->Trabalhador->save($trabalhador)) {
                return $this->Trabalhador->id;
            }
            else {
                //nao chega aqui mas caso chegar
                throw new NotFoundException(__('Imposivel cadastro de trabalhador'));
            }
        }
        else if ($this->Trabalhador->save($trabalhador)) {
            return $this->Trabalhador->id;
        }
        else {
            throw new NotFoundException(__('Imposivel cadastro/edicao de trabalhador'));
        }
    }

    /**
     * Salva as escolaridades do trabalhador
     *
     * @param array $trabalhadorEscolaridades
     * @param int $trabalhador_id
     * @return bool
     */
    private function salvaTrabalhadorEscolaridade($trabalhadorEscolaridades, $trabalhador_id)
    {

        //limpa dados que existem na tabela
        $this->limpaTrabalhadorEscolaridade($trabalhador_id);

        foreach ($trabalhadorEscolaridades as $escolaridade) {
            $escolaridade['TrabalhadorEscolaridade'] = $escolaridade;
            $escolaridade['TrabalhadorEscolaridade']['trabalhador_id'] = $trabalhador_id;
            if (!$this->Trabalhador->TrabalhadorEscolaridade->save($escolaridade)) {
                throw new NotFoundException(__('Imposivel cadastro de Escolaridade'));
            }
        }
        return true;
    }

    /**
     * Limpa as escolaridades do trabalhador
     *
     * @param int $trabalhador_id
     * @return boolean
     */
    private function limpaTrabalhadorEscolaridade($trabalhador_id)
    {
        return $this->Trabalhador->TrabalhadorEscolaridade->query("DELETE FROM escolaridade WHERE trabalhador_id = $trabalhador_id");
    }

    /**
     * Salva as experiencias do trabalhador
     *
     * @param array $trabalhadorExperiencia
     * @param int $trabalhador_id
     * @return bool
     */
    private function salvaTrabalhadorExperiencia($trabalhadorExperiencia, $trabalhador_id)
    {

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

    /**
     * Limpa as experiencias do trabalhador
     *
     * @param $trabalhador_id
     * @return boolean
     */
    private function limpaTrabalhadorExperiencia($trabalhador_id)
    {
        return $this->Trabalhador->TrabalhadorExperiencia->query("DELETE FROM experiencia WHERE trabalhador_id = $trabalhador_id");
    }

}

?>