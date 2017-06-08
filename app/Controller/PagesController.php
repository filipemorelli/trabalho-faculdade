<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

	public $components = array('Paginator');

    public function beforeFilter()
    {
		$this->Auth->allow(array('index', 'sobre', 'contato', 'politicasDePrivacidade', 'termosDeUso'));
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

	public function index(){ 
		$this->set('title_for_layout', __('Bem vindo'));
        $this->loadModel('Vaga');
        $vagas = $this->Vaga->find("all", array(
            'conditions' => array(
                'Vaga.ativo' => 1,
                'Vaga.status !=' => 2
            ),
            'order' => array(
                'Vaga.modified' => 'desc',
                'Vaga.created' => 'desc',
                'Vaga.id' => 'desc'
            ),
            'limit' => '10'
        ));
        $this->set('vagas', $vagas);
	}

	public function sobre(){
		$this->set('title_for_layout', __('Sobre'));
	}

	public function contato(){
		$this->set('title_for_layout', __('Contato'));		
	}

    public function politicasDePrivacidade(){
        $this->set('title_for_layout', __('Políticas de Privacidade - FreeJobs'));
    }

    public function termosDeUso(){
        $this->set('title_for_layout', __('Políticas de Privacidade - FreeJobs'));
    }
}
