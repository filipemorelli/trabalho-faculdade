<?php

App::uses('AuthComponent', 'Controller/Component');

class EmpresasController extends AppController
{
    public $components = array('Paginator');

    private function TemPerfil(){
        $qtde = $this->Empresa->find('count', array(
            'conditions' => array(
                'user_id =' => $this->Session->read('Auth.User.id'),
            ),
        ));
        return $qtde == 1;
    }

    private function ForcaCriarPerfil(){
        if(!$this->TemPerfil() && $this->request->params['action'] !== "editarPerfilEmpresa"){
            if($this->Session->read('Auth.User.tipo') === "empregador"){
                $this->Session->setFlash(__('Precisa criar perfil da empresa!'), 'info');
            }
            return $this->redirect(array('action' => 'editarPerfilEmpresa'));
        }
        return true;
    }

    public function beforeFilter()
    {
        $this->ForcaCriarPerfil();
        if(!parent::isAuth()){
            $this->redirect(array("controller" => "pages", "action" => "index"));
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

    public function buscarfissionais(){
        $this->set('title_for_layout', __('curar fissionais'));
    }

    /**
    Perfil visualizados pelo administrador do perfil
    */
    public function perfilEmpresa(){
        $this->set('title_for_layout', __('Vizualizar perfil da Empresa'));
        $empresa = $this->Empresa->find('first', array(
            'conditions' => array(
                'user_id =' => $this->Session->read('Auth.User.id'),
            ),
            'recursive' => -1
        ));
        unset($empresa['Empresa']['password']);
        $this->set('empresa', $empresa);
    }
    /**
    Curriculo visualizado somente pelo usuario e pode ser editado
    */
    public function editarPerfilEmpresa(){
        $this->set('title_for_layout', __('Editar perfil'));

        if ($this->request->is(array('post', 'put'))) {
            // verifica se existe perfil criado

            $empresaId = $this->Empresa->find('first', array(
                'fields' => array('id'),
                'conditions' => array(
                    'user_id =' => $this->Session->read('Auth.User.id'),
                ),
                'recursive' => -1
            ));
            if(!isset($empresaId['Empresa']['id'])){
                $this->Empresa->create(); //cria perfil
            } else {
                $this->request->data['Empresa']['id'] = $empresaId['Empresa']['id'];
            }
            //coloca o user_id para vincular a conta
            $this->request->data['Empresa']['user_id'] = $this->Session->read('Auth.User.id');
            //salva ou atualiza
            if ($this->Empresa->save($this->request->data)) {
                $this->Session->setFlash(__('Perfil salvo com sucesso'), 'success');
                return $this->redirect(array('action' => 'editarPerfilEmpresa'));
            }
            $this->Session->setFlash(
                __('Perfil não pode ser salvo.'), 'error'
            );
        } else {
            $this->request->data = $this->Empresa->find('first', array(
                'conditions' => array(
                    'user_id =' => $this->Session->read('Auth.User.id')
                ),
                'recursive' => -1
            ));
            unset($this->request->data['Empresa']['password']);
        }
    }

/*
    public function edit(){
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário Inválido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuário editado com sucesso'), 'success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('Usuário não pode ser editado.'), 'error'
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }
*/
    public function adicionarVaga(){
        $this->loadModel('Vaga');
        $this->set('title_for_layout', __('Adicionar vaga'));
        if ($this->request->is('post')) {
            //$this->
            $this->Vaga->create();
            $empresa_id = $this->Empresa->find('first', array(
                'fields' => array('id'),
                'conditions' => array(
                    'Empresa.user_id' => $this->Session->read('Auth.User.id')
                ),
                'recursive' => -1
            ));
            $this->request->data['Vaga']['empresa_id'] = $empresa_id['Empresa']['id'];
            if ($this->Vaga->save($this->request->data)) {
                $this->Session->setFlash(__('Vaga salvo com sucesso'), 'success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('Vaga não pode ser salvo.'), 'error'
            );
        }
    }

    public function editarVaga($id = null){
        $this->loadModel('Vaga');

        $this->Vaga->id = $id;
        if(!$this->Vaga->exists()){
            //throw new NotFoundException(__('Vaga Inválida'));
           return $this->redirect(array('action' => 'listarVagas'));
        }

        $vaga = $this->Vaga->find('first', array(
            'conditions' => array(
                'Vaga.id' => $id,
                'Empresa.user_id' => $this->Session->read('Auth.User.id')
            ),
        ));
        if(count($vaga) == 0) {
            return $this->redirect(array('action' => 'listarVagas'));
        }        
        
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Vaga']['empresa_id'] = $vaga['Empresa']['id'];
            if ($this->Vaga->save($this->request->data)) {
                $this->Session->setFlash(__('Vaga editado com sucesso'), 'success');
                return $this->redirect(array('action' => 'listarVagas'));
            }
            $this->Session->setFlash(
                __('Vaga não pode ser editado.'), 'error'
            );
        } else {
            $this->request->data = $vaga;
        }
    }

    public function listarVagas($page = 1){
        $this->loadModel('Vaga');
        $this->set('title_for_layout', __('Listar Vaga da empresa'));
        
        $this->Paginator->settings = array(
            'fields' => array('Vaga.id', 'Vaga.nome', 'Vaga.url_imagem', 'Vaga.modified', 'Empresa.nome', 'Vaga.ativo'),
            'conditions' => array(
                'Empresa.user_id' => $this->Session->read('Auth.User.id')
            ),
            'order' => array(
                'Vaga.modified' => 'DESC',
                'Vaga.id' => 'DESC'
            ),
            'page' => $page,
            'limit' => 2
        );
        $vagas = $this->Paginator->paginate('Vaga');
        $this->set(compact('vagas'));
    }

    public function excluirVaga($id = null){
        $this->loadModel('Vaga');
        $this->Vaga->id = $id;
        if(!$this->Vaga->exists()){
            //throw new NotFoundException(__('Vaga Inválida'));
           return $this->redirect(array('action' => 'listarVagas'));
        }

        $vaga = $this->Vaga->find('first', array(
            'conditions' => array(
                'Vaga.id' => $id,
                'Empresa.user_id' => $this->Session->read('Auth.User.id')
            ),
        ));
        if(count($vaga) == 0) {
            return $this->redirect(array('action' => 'listarVagas'));
        }        
        
        if ($this->Vaga->inativar($vaga)) {
            $this->Session->setFlash(__('Vaga excluida com sucesso'), 'success');
            return $this->redirect(array('action' => 'listarVagas'));
        }
        $this->Session->setFlash(__($this->Vaga->errorMessage), 'error');
        return $this->redirect(array('action' => 'listarVagas'));
    }

    public function ativarVaga($id = null){
        $this->loadModel('Vaga');
        $this->Vaga->id = $id;
        if(!$this->Vaga->exists()){
            //throw new NotFoundException(__('Vaga Inválida'));
           return $this->redirect(array('action' => 'listarVagas'));
        }

        $vaga = $this->Vaga->find('first', array(
            'conditions' => array(
                'Vaga.id' => $id,
                'Empresa.user_id' => $this->Session->read('Auth.User.id')
            ),
        ));
        if(count($vaga) == 0) {
            return $this->redirect(array('action' => 'listarVagas'));
        }        
        
        if ($this->Vaga->reativar($vaga)) {
            $this->Session->setFlash(__('Vaga excluida com sucesso'), 'success');
            return $this->redirect(array('action' => 'listarVagas'));
        }
        $this->Session->setFlash(__($this->Vaga->errorMessage), 'error');
        return $this->redirect(array('action' => 'listarVagas'));
    }

    public function detalhesVaga(){
        $this->set('title_for_layout', __('Sobre a vaga'));
    }

    public function candidatarVaga() {
        $this->set('title_for_layout', __('Candidatar a vaga'));
	}

    public function candidadosAVaga(){
        $this->set('title_for_layout', __('Candidatos à vaga'));
    }
}

?>