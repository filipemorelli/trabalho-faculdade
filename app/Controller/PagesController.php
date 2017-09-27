<?php
/**
 * Class PagesController | Controller/PagesController
 * 
 * Controla todas as ações das páginas de acesso publico
 * 
 * @author Filipe Morelli <morellitecinfo@gmail.com>
 * @version 1.0.0
 */

App::uses('AppController', 'Controller');

/**
 * Controla todas as ações das páginas de acesso publico
 *
 * @package       app.Controller
 */
class PagesController extends AppController
{

    /**
     * Componentes ativos
     * 
     * @var array
     */
    public $components = array('Paginator');

    /**
     * Executa antes de executar os metodos
     */
    public function beforeFilter()
    {
        $this->Auth->allow(array(
            'index',
            'sobre',
            'contato',
            'politicasDePrivacidade',
            'termosDeUso'
        ));
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
    }

    /**
     * Página inicial
     */
    public function index()
    {
        $this->set('title_for_layout', __('Bem vindo'));
        $this->loadModel('Vaga');
        $vagas = $this->Vaga->find("all", array(
            'conditions' => array(
                'Vaga.ativo'     => 1,
                'Vaga.status !=' => 2
            ),
            'order'      => array(
                'Vaga.modified' => 'desc',
                'Vaga.created'  => 'desc',
                'Vaga.id'       => 'desc'
            ),
            'limit'      => '10'
        ));
        $qtdeVagas = $this->Vaga->find("count", array(
            'conditions' => array(
                'Vaga.ativo'     => 1,
                'Vaga.status !=' => 2
            )
        ));

        $this->set('qtdeVagas', $qtdeVagas);
        $this->set('vagas', $vagas);
    }

    /**
     * Página Sobre
     */
    public function sobre()
    {
        $this->set('title_for_layout', __('Sobre'));
    }

    /**
     * Página Contato
     */
    public function contato()
    {
        $this->set('title_for_layout', __('Contato'));
    }

    /**
     * Página Politicas de Privacidade
     */
    public function politicasDePrivacidade()
    {
        $this->set('title_for_layout', __('Políticas de Privacidade - FreeJobs'));
    }

    /**
     * Página de Termos de uso
     */
    public function termosDeUso()
    {
        $this->set('title_for_layout', __('Políticas de Privacidade - FreeJobs'));
    }
}
