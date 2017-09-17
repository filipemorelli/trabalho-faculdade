<?php
App::uses('AuthComponent', 'Controller/Component');

/**
 * Class TrabalhadorExperiencia Model resoponsavel por integridade dos dados da experiencia do trabalhador
 */
class TrabalhadorExperiencia extends AppModel
{

    /**
     * @var array
     */
    public $belongsTo = array(
        'Trabalhadores' => array(
            'className'  => 'Trabalhadores',
            'conditions' => array("Trabalhadores.ativo" => '1'),
            'order'      => '',
            'foreignKey' => 'trabalhador_id'
        ),
    );

    /**
     * @var string
     */
    public $useTable = "experiencia";

    /**
     * @var array
     */
    public $validate = array(
        'cargo'       => array(
            'required' => array(
                'rule'    => array('notBlank'),
                'message' => 'Digite a instituição.'
            )
        ),
        'instituicao' => array(
            'required' => array(
                'rule'    => array('notBlank'),
                'message' => 'Digite a instituição.'
            )
        ),
        'data_inicio' => array(
            'regra1' => array(
                'rule'    => array('date'),
                'message' => 'Digite a data de início.',
            )
        ),
        'data_fim'    => array(
            'regra1' => array(
                'rule'       => array('date'),
                'message'    => 'Digite a data de fim.',
                'allowEmpty' => true,
                'required'   => false
            )
        ),
        'descricao'   => array(
            'regra1' => array(
                'rule'    => array('notBlank'),
                'message' => 'Digite a descrição de seu perfil!'
            ),
            'regra2' => array(
                'rule'    => array(
                    'minLength',
                    10
                ),
                'message' => 'Digite uma descrição com mais de 10 caracteres!'
            ),
            'regra3' => array(
                'rule'    => array(
                    'maxLength',
                    255
                ),
                'message' => 'Digite uma descrição com menos de 256 caracteres!'
            )
        ),
    );

    /**
     * @var string
     */
    public $errorMessage = '';

}

?>