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

    /**
        Paginate esta customizado
        $conditions = userid
    */
    function paginate($conditions, $fields, $order, $limit = 10, $page, $recursive, $extra)
    {
        $page = $page - 1;
        $userid = $conditions['user_id'];
        $query = "SELECT * FROM vagas_empresa Vaga
                        INNER JOIN trabalhador_vaga TrabalhadorVaga ON TrabalhadorVaga.vaga_id = Vaga.id
                        INNER JOIN trabalhadores Trabalhador ON Trabalhador.id = TrabalhadorVaga.trabalhador_id
                        INNER JOIN empresas Empresa ON Empresa.id = Vaga.empresa_id
                        INNER JOIN enderecos Endereco ON Endereco.id = Vaga.endereco_id
                        WHERE Trabalhador.user_id = $userid
                        ORDER BY
                        TrabalhadorVaga.modified DESC
                        LIMIT $limit
                        OFFSET $page";
        $result = $this->query($query);
        return $result;
    }

    public function paginateCount($conditions = null, $recursive = 0, $extra = array())
    {
        $this->recursive = 0;
        $userid = $conditions['user_id'];
        $query = "SELECT COUNT(*) as qtde FROM vagas_empresa v
                        INNER JOIN trabalhador_vaga tv ON tv.vaga_id = v.id
                        INNER JOIN trabalhadores t ON t.id = tv.trabalhador_id
                        INNER JOIN empresas Empresa ON Empresa.id = v.empresa_id
                        INNER JOIN enderecos Endereco ON Endereco.id = v.endereco_id
                        WHERE t.user_id = $userid
                        ORDER BY
                        tv.modified DESC";
        $result = $this->query($query);
        return $result[0][0]['qtde'];
    }
    
}
?>