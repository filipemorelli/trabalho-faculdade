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

    /**
    Editar Perfil Trabalhador
    */
    public function editarPerfilTrabalhador(){
        $this->set('title_for_layout', __('Editar Perfil'));
    }

}

?>