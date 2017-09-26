<?php
/**
 * Class TrabalhadorExperiencia | Model/TrabalhadorExperiencia
 * 
 * @author Filipe Morelli <morellitecinfo@gmail.com>
 */
App::uses('AuthComponent', 'Controller/Component');

/**
 * Class TrabalhadorExperiencia
 * 
 * Model resoponsavel por integridade dos dados da experiencia do trabalhador
 */
class TrabalhadorExperiencia extends AppModel
{

    /**
     * Relation Table
     * 
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
     * Usar tabela experiencia
     * 
     * @var string
     */
    public $useTable = "experiencia";

    /**
     * Validacao dos dados
     * 
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
     * Mensagem de erro para o usuario
     * 
     * @var string
     */
    public $errorMessage = '';

}

?>