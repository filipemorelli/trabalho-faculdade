<?php
App::uses('AuthComponent', 'Controller/Component');

class TrabalhadorEscolaridade extends AppModel {

    public $belongsTo = array(
        'Trabalhadores' => array(
            'className'    => 'Trabalhadores',
            'conditions'   => array("Trabalhadores.ativo" => '1'),
            'order'        => '',
            'foreignKey'   => 'trabalhador_id'
        ),
    );

    public $useTable = "escolaridade";

    public $validate = array(
        'instituicao' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite a instituição.'
            )
        ),
        'nivel' => array(
            'valid' => array(
                'rule' => array('inList', array(
                    '1',
                    '2',
                    '3',
                    '4',
                    '5',
                    '6',
                    '7',
                    '8',
                    '9',
                    '10',
                    '11',
                    '12',
                    '13',
                    '14',
                    '15',
                )),
                'message' => 'Selecione a escolaridade',
            )
        ),
        'curso' => array(
            'regra1' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite o nome do curso.',
                'allowEmpty' => true,
            )
        ),
        'data_inicio' => array(
            'regra1' => array(
                'rule' => array('date'),
                'message' => 'Digite a data de início.',
            )
        ),
        'data_fim' => array(
            'regra1' => array(
                'rule' => array('date'),
                'message' => 'Digite a data de fim.',
                'allowEmpty' => true,
            )
        ),
        'descricao_rapida' => array(
            'regra1' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite a descrição de seu perfil!'
            ),
            'regra2' => array(
                'rule' => array('minLength', 10),
                'message' => 'Digite uma descrição com mais de 10 caracteres!'
            ),
            'regra3' => array(
                'rule' => array('maxLength', 255),
                'message' => 'Digite uma descrição com menos de 256 caracteres!'
            )
        ),
    );
    
    public $errorMessage = '';
    
}
?>