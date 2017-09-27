<?php
/**
 * Class TrabalhadorEscolaridadeController | Controller/TrabalhadorEscolaridadeController
 * 
 * Controller de teste do relacionamento de trabalhador e escolaridade
 * @author Filipe Morelli <morellitecinfo@gmail.com>
 * @version 1.0.0
 */

App::uses('AuthComponent', 'Controller/Component');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

/**
 * Class TrabalhadorEscolaridadeController
 */
class TrabalhadorEscolaridadeController extends AppController
{
    /**
     * Usa paginacao para mostrar dados
     * 
     * @var array 
     */
    public $components = array('Paginator');

    /**
     * Ativa prototipo completo
     * 
     * @var string
     */
    public $scaffold;

}

?>