<?php
/**
 * Class VagasController | Controller/VagasController
 * 
 * Controller responsavel por manipular as vagas
 * 
 * @author Filipe Morelli <morellitecinfo@gmail.com>
 * @version 1.0.0
 */
App::uses('AuthComponent', 'Controller/Component');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

/**
 * Class VagasController
 */
class VagasController extends AppController
{
    /**
     * Ativa os componentes
     * 
     * @var array
     */
    public $components = array('Paginator');

    /**
     * Ativa o prototipo do framework
     * 
     * @var
     */
    public $scaffold;

}

?>