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

            $trabalhadorId = $this->Trabalhadores->find('first', array(
                'fields' => array('id'),
                'conditions' => array(
                    'user_id =' => $this->Session->read('Auth.User.id'),
                ),
                'recursive' => -1
            ));
            if(!isset($trabalhadorId['Trabalhadores']['id'])){
                $this->Trabalhadores->create(); //cria perfil
            } else {
                $this->request->data['Trabalhadores']['id'] = $trabalhadorId['Trabalhadores']['id'];
            }
            //coloca o user_id para vincular a conta
            $this->request->data['Trabalhadores']['user_id'] = $this->Session->read('Auth.User.id');
            //salva ou atualiza
            if ($this->Trabalhadores->save($this->request->data)) {
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

}

?>