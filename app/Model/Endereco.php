<?php
App::uses('AppModel', 'Model');

/**
 * Class Endereco Model responsavel pela integridade da tabela endereco
 */
class Endereco extends AppModel {

    /**
     * @var string
     */
    public $displayField = 'nome';

    /**
     * Relacionamento de tabela
     *
     * @var array
     */
    public $hasOne = array(
        'Vaga' => array(
            'className'    => 'Vaga',
            'conditions'   => array("Vaga.ativo" => '1'),
            'order'        => '',
            'foreignKey'   => 'endereco_id'
        ),
    );

    /**
     * Responsavel pela validacao dos dados
     *
     * @var array
     */
    public $validate = array(
        'endereco' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite um nome para o usuário'
            )
        ),
        'cep' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite um nome para o usuário'
            )
        ),
        'bairro' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite um nome para o usuário'
            )
        ),
        'cidade' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite um nome para o usuário'
            )
        ),
        'estado' => array(
            'required' => array(
                'rule' => array('inList', array(
                    'AC',
                    'AL',
                    'AP',
                    'AM',
                    'BA',
                    'CE',
                    'DF',
                    'ES',
                    'GO',
                    'MA',
                    'MT',
                    'MS',
                    'MG',
                    'PA',
                    'PB',
                    'PR',
                    'PE',
                    'PI',
                    'RJ',
                    'RN',
                    'RS',
                    'RO',
                    'RR',
                    'SC',
                    'SP',
                    'SE',
                    'TO'
                )),
                'message' => 'Digite o estado em sigla'
            )
        ),
        'numero' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite um nome para o usuário'
            )
        ),
        'complemento' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite um nome para o usuário',
                'allowEmpty' => true
            )
        ),
    );

    /**
     * @var string
     */
    public $errorMessage = '';
    
}
?>