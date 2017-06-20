<?php
App::uses('AuthComponent', 'Controller/Component');

class TrabalhadorVaga extends AppModel {

    public $displayField = 'created';
    public $belongsTo = array(
        'Trabalhador' => array(
            'className'    => 'Trabalhador',
            'order'        => '',
            'foreignKey'   => 'trabalhador_id'
        ),
        'Vaga' => array(
            'className'    => 'Vaga',
            'order'        => '',
            'foreignKey'   => 'vaga_id'
        ),
    );

    public $useTable = "trabalhador_vaga";
    
    public $errorMessage = '';

    public function inativar($vaga)
    {
        if (!empty($vaga) && $vaga['Vaga']['ativo'] == 1) {
            $vaga['Vaga']['ativo'] = false;
            if ($this->save($vaga)) {
                return true;
            }
        }
        $this->errorMessage = 'Vaga não pode ser removida, tente mais tarde.';
        return false;
    }
    
    public function reativar($vaga)
    {
        if (!empty($vaga) && $vaga['Vaga']['ativo'] == 0) {
            $vaga['Vaga']['ativo'] = 1;
            if ($this->save($vaga)) {
                return true;
            }
        }
        
        return false;
    }
    
}
?>