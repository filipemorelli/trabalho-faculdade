<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
 	/*Login area*/
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	Router::connect('/esqueceu-a-senha', array('controller' => 'users', 'action' => 'forgot'));
	Router::connect('/cadastrar', array('controller' => 'users', 'action' => 'add'));
	Router::connect('/endereco-rapido', array('controller' => 'users', 'action' => 'enderecoRapido'));
	Router::connect('/titulo-vagas-rapido', array('controller' => 'users', 'action' => 'tituloVagasRapido'));

	/*Paginas simples em geral*/
	Router::connect('/sobre', array('controller' => 'pages', 'action' => 'sobre'));
	Router::connect('/contato', array('controller' => 'pages', 'action' => 'contato'));
	Router::connect('/politicas-de-privacidade', array('controller' => 'pages', 'action' => 'politicasDePrivacidade'));
	Router::connect('/termos-de-uso', array('controller' => 'pages', 'action' => 'termosDeUso'));

	/*Recursos do trabalhador*/
	Router::connect('/vagas', array('controller' => 'users', 'action' => 'vagas'));
	Router::connect('/vagas/:page', array('controller' => 'users', 'action' => 'vagas'), array('pass' => array('page')));
	Router::connect('/vaga', array('controller' => 'users', 'action' => 'vaga'));
	Router::connect('/vaga/:id/:titulo', array('controller' => 'users', 'action' => 'vaga'), array('pass' => array('id', 'titulo')));
	Router::connect('/perfil', array('controller' => 'users', 'action' => 'perfil'));
	Router::connect('/visualizar-perfil/:nome/:id', array('controller' => 'users', 'action' => 'visualizarPerfil'), array('pass' => array('id', 'nome')));
	Router::connect('/editar-curriculo', array('controller' => 'users', 'action' => 'editarPerfil'));
	Router::connect('/curriculos', array('controller' => 'users', 'action' => 'curriculosPerfil'));
	Router::connect('/endereco-rapido', array('controller' => 'users', 'action' => 'enderecoRapido'));

	//Router::connect('/historico-de-candidaturas', array('controller' => 'users', 'action' => 'historicoCandidaturas'));

	/*Trabalhadores*/
	Router::connect('/editar-perfil', array('controller' => 'trabalhadores', 'action' => 'editarPerfilTrabalhador'));
	Router::connect('/historico-de-candidaturas', array('controller' => 'trabalhador_vaga', 'action' => 'historicoCandidaturas'));
	Router::connect('/historico-de-candidaturas/:page', array('controller' => 'trabalhador_vaga', 'action' => 'historicoCandidaturas'), array('pass' => array('page')));
	Router::connect('/candidatar-a-vaga/', array('controller' => 'trabalhadores', 'action' => 'candidatarVaga'));
	Router::connect('/candidatar-a-vaga/:id', array('controller' => 'trabalhadores', 'action' => 'candidatarVaga'), array('pass' => array('id')));
	Router::connect('/cancelar-candidatura-a-vaga/', array('controller' => 'trabalhadores', 'action' => 'cancelarCandidadidaturaVaga'));
	Router::connect('/cancelar-candidatura-a-vaga/:id', array('controller' => 'trabalhadores', 'action' => 'cancelarCandidadidaturaVaga'), array('pass' => array('id')));	

	/*Recursos para as empresas*/
	Router::connect('/profissionais', array('controller' => 'empresas', 'action' => 'buscarProfissionais'));
	Router::connect('/perfil-empresa', array('controller' => 'empresas', 'action' => 'perfilEmpresa'));
	Router::connect('/adicionar-vaga', array('controller' => 'empresas', 'action' => 'adicionarVaga'));
	Router::connect('/excluir-vaga/:id', array('controller' => 'empresas', 'action' => 'excluirVaga'), array('pass' => array('id')));
	Router::connect('/ativar-vaga/:id', array('controller' => 'empresas', 'action' => 'ativarVaga'), array('pass' => array('id')));
	Router::connect('/editar-vaga/:id', array('controller' => 'empresas', 'action' => 'editarVaga'), array('pass' => array('id')));
	Router::connect('/editar-perfil-empresa', array('controller' => 'empresas', 'action' => 'editarPerfilEmpresa'));
	Router::connect('/nossas-vagas', array('controller' => 'empresas', 'action' => 'listarVagas'));
	Router::connect('/nossas-vagas/:page', array('controller' => 'empresas', 'action' => 'listarVagas'), array('pass' => array('page')));
	//Router::connect('/detalhes-vaga', array('controller' => 'empresas', 'action' => 'detalhesVaga'));
	Router::connect('/detalhes-vaga/:id/:titulo', array('controller' => 'empresas', 'action' => 'detalhesVaga'), array('pass' => array('id', 'titulo')));
	Router::connect('/candidatos-a-vaga', array('controller' => 'empresas', 'action' => 'candidadosAVaga'));
	Router::connect('/candidatos-a-vaga/vaga/:id', array('controller' => 'empresas', 'action' => 'candidadosAVaga'), array('pass' => array('id')));
	Router::connect('/candidatos-a-vaga/vaga/:id/pagina/:page', array('controller' => 'empresas', 'action' => 'candidadosAVaga'), array('pass' => array('id', 'page')));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
