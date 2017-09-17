<?php

App::uses('AuthComponent', 'Controller/Component');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

/**
 * Class VagasController
 */
class VagasController extends AppController
{
    /**
     * @var array
     */
    public $components = array('Paginator');

    /**
     * @var
     */
    public $scaffold;

}

?>