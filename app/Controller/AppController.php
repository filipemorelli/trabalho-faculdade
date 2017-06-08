<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
     public $helpers = array('MinifyHtml');
     public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'pages',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'index'
            ),
            'authenticate' => array(
                'Form' => array(
                    'scope' => array('User.ativo' => '1'),
                    'fields' => array(
                        'username' => 'email',
                        'password' => 'senha'
                    ),
                ),
            )
        )
    );

    public function isAuth(){
        return $this->verifyPermission();
    }

    private function verifyPermission(){
        //$this->request->params['controller']
        $userRole = $this->Session->read('Auth.User.tipo');

        //verifica permisao geral de paginas
        if($this->permissaoGeral()){
            return true;
        }

        //verifica permissao de acesso de paginas
        switch ($userRole) {
            case 'trabalhador':
                return $this->permissaoTrabalhador();
                break;
            case 'empregador':
                return $this->permissaoEmpregador();
                break;
            default:
                return false;
                break;
        }
        
        return false;
    }

    private function permissaoGeral(){
        $controller = $this->request->params['controller'];
        $action = $this->request->params['action'];
        if($controller === "users"){
            switch ($action) {
                case 'login':
                    return true;
                    break;
                case 'add':
                    return true;
                    break;
                case 'forgot':
                    return true;
                    break;
                case 'logout':
                    return true;
                    break;
                case 'vaga':
                    return true;
                    break;
                case 'vagas':
                    return true;
                    break;
                case 'enderecoRapido':
                    return true;
                    break;
                case 'tituloVagasRapido':
                    return true;
                    break;
                default:
                    return false;
                    break;
            }
        }
    } 

    private function permissaoTrabalhador(){
        $controller = $this->request->params['controller'];
        $action = $this->request->params['action'];
        if($controller === "trabalhadores"){
            switch ($action) {
                case 'perfil':
                    return true;
                    break;
                case 'editarPerfil':
                    return true;
                    break;
                case 'curriculosPerfil':
                    return true;
                    break;
                case 'historicoCandidaturas':
                    return true;
                    break;
                case 'editarPerfilTrabalhador':
                    return true;
                    break;
                default:
                    return false;
                    break;
            }
        }
    }

    private function permissaoEmpregador(){
        $controller = $this->request->params['controller'];
        $action = $this->request->params['action'];
        if($controller === "empresas"){
            switch ($action) {
                case 'buscarProfissionais':
                    return true;
                    break;
                case 'perfilEmpresa':
                    return true;
                    break;
                case 'editarPerfilEmpresa':
                    return true;
                    break;
                case 'adicionarVaga':
                    return true;
                    break;
                case 'editarVaga':
                    return true;
                    break;
                case 'excluirVaga':
                    return true;
                    break;
                case 'ativarVaga':
                    return true;
                    break;
                case 'listarVagas':
                    return true;
                    break;
                case 'detalhesVaga':
                    return true;
                    break;
                case 'candidatarVaga':
                    return true;
                    break;
                case 'candidadosAVaga':
                    return true;
                    break;
                default:
                    return false;
                    break;
            }
        }
    }
}
