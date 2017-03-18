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
        $this->Auth->allow(array('index', 'sobre', 'contato'));
    }

	public function index(){
		$this->layout = "pagina";
		$this->set('title_for_layout', __('Bem vindo'));
	}

	public function sobre(){
		$this->layout = "pagina";
		$this->set('title_for_layout', __('Sobre'));
	}

	public function contato(){
		$this->layout = "pagina";
		$this->set('title_for_layout', __('Contato'));		
	}
}
