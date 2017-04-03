<?php

App::uses('AuthComponent', 'Controller/Component');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class VagasController extends AppController
{
    public $components = array('Paginator');

    public $scaffold;

}

?>