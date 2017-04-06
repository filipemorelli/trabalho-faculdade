<?php
App::uses('AppModel', 'Model');

class Endereco extends AppModel {

    public $displayField = 'nome';

    public $hasOne = array(
        'Vaga' => array(
            'className'    => 'Vaga',
            'conditions'   => array("Vaga.ativo" => '1'),
            'order'        => '',
            'foreignKey'   => 'endereco_id'
        ),
    );

    public $validate = array(
        'nome' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite um nome para o usuário'
            )
        ),
        'senha' => array(
            'notEmpty' => array(
                'rule' => array('notBlank'),
                'message' => 'A senha do usuário não pode estar vazia!'
            ),
            'password' => array(
                'rule' => array('minLength', '6'),
                'message' => 'Minimo de 6 caracteres'
            ),
        ),
        'email' => array(
            'notEmpty' => array(
                'rule' => array('email'),
                'message' => 'Digite um email valido para o usuário!'
            ),
            'required' => array(
                'rule' => array('isUnique'),
                'message' => 'E-mail já cadastrado!'
            ),
        ),
        'tipo' => array(
            'valid' => array(
                'rule' => array('inList', array('trabalhador', 'empregador')),
                'message' => 'Selecione o tipo',
                'allowEmpty' => false
            )
        )
    );
    
    public $errorMessage = '';
    
}
?>