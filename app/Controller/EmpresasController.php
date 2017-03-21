<?php

App::uses('AuthComponent', 'Controller/Component');

class EmpresasController extends AppController
{
    public $components = array('Paginator');

    public function beforeFilter()
    {
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
    Perfil visualizados por empresas e outros usuarios
    */
    public function perfilEmpresa(){
        $this->set('title_for_layout', __('Vizualizar perfil da Empresa'));
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
                    'user_id =' => $this->Session->read('Auth.User.id')
                )
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
                return $this->redirect(array('action' => 'perfilEmpresa'));
            }
            $this->Session->setFlash(
                __('Perfil não pode ser salvo.'), 'error'
            );
        } else {
            $this->request->data = $this->Empresa->find('first', array(
                'conditions' => array(
                    'user_id =' => $this->Session->read('Auth.User.id')
                ),
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
        $this->set('title_for_layout', __('Adicionar vaga'));
    }

    public function listarVagas(){
        $this->set('title_for_layout', __('Listar Vaga da empresa'));
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