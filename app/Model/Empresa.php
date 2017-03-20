<?php
App::uses('AuthComponent', 'Controller/Component');

class Empresa extends AppModel {

    public $displayField = 'nome';

    public $validate = array(
        'nome' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite um nome para o usuário'
            )
        ),
        'ramo' => array(
            'notEmpty' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite o ramo da empresa!'
            ),
        ),
        'descricao_rapida' => array(
            'regra1' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite a descrição de sua empresa!'
            ),
            'regra2' => array(
                'rule' => array('range', 10, 255),
                'message' => 'Digite uma descrição com mais de 10 caracteres e menos de 256 caracteres!'
            )
        ),
        'qtde_empregados' => array(
            'valid' => array(
                'rule' => array('inList', array(
                    'abaixo de 10',
                    'abaixo de 50',
                    'abaixo de 200',
                    'abaixo de 500',
                    'abaixo de 1000',
                    'acima de 1001'
                )),
                'message' => 'Selecione a quantidade de funcionários',
                'allowEmpty' => false
            )
        ),
        'site' => array(
            'notEmpty' => array(
                'rule' => array('url'),
                'message' => 'Digite o site da empresa!',
                'allowEmpty' => true,
            ),
        ),
        'aniversario_empresa' => array(
            'notEmpty' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
                'message' => 'Digite a data de anivesário da empresa!',
            ),
        ),
        'telefone' => array(
            'regra1' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite o telefone de contato!',
            ),
            'regra2' => array(
                'rule' => array('naturalNumber', true),
                'message' => 'Digite somente numeros no telefone!',
            )
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
    );
    
    public $errorMessage = '';
    
    public function inativar($user){
        
        // pr(AuthComponent::user('id'));die;
        if (AuthComponent::user('id') == $user['User']['id']) {
            $this->errorMessage = 'Usuário não pode excluir a si mesmo.';
            return false;
        }
        
        if (!empty($user) && $user['User']['ativo'] == 1) {
            $user['User']['ativo'] = 0;
            if ($this->save($user)) {
                return true;
            }
        }
        $this->errorMessage = 'Usuário não pode ser removido, tente mais tarde.';
        return false;
    }
    
    public function reativar($user){
        if (!empty($user) && $user['User']['ativo'] == 0) {
            $user['User']['ativo'] = 1;
            if ($this->save($user)) {
                return true;
            }
        }
        
        return false;
    }
    
}
?>