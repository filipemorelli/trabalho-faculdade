<?php

App::uses('AuthComponent', 'Controller/Component');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

/**
 * Class TrabalhadorVagaController Faz o controlole da relacao entre trabalhador e vagas
 */
class TrabalhadorVagaController extends AppController
{
    /**
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
        $qtde = $this->TrabalhadorVaga->Trabalhador->find('count', array(
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
            return $this->redirect(array(
                'controller' => 'trabalhadores',
                'action'     => 'editarPerfilTrabalhador'
            ));
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
        //$this->Auth->allow(array('buscarfissionais', 'perfilEmpresa', 'editarPerfilEmpresa', 'adicionarVaga', 'listarVagas', 'detalhesVaga', 'candidatarVaga', 'candidadosAVaga'));
    }

    /**
     * Mostra Historico de candidaturas
     *
     * @param int $page
     */
    public function historicoCandidaturas($page = 1)
    {
        $this->set('title_for_layout', __('Histórico de candidaturas'));
        $conditions = array(
            'user_id' => $this->Session->read('Auth.User.id')
        );
        $limit = 10;
        $this->Paginator->settings = array(
            'conditions' => $conditions,
            'page'       => $page,
            'limit'      => $limit
        );
        $vagas = $this->Paginator->paginate('TrabalhadorVaga');
        $this->set(compact('vagas'));
    }

}

?>