<?php

App::uses('AuthComponent', 'Controller/Component');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class TrabalhadorEscolaridadeController extends AppController
{
    public $components = array('Paginator');

    public $scaffold;

}

?>