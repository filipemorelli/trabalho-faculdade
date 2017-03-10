<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    public $displayField = 'nome';

    public $validate = array(
        'nome' => array(
            'required' => array(
                'rule' => 'isUnique',
                'message' => 'Digite um nome para o usuário'
            )
        ),
        'senha' => array(
            'notEmpty' => array(
                'rule' => array('notBlank'),
                'message' => 'A senha do usuário não pode estar vazia!'
            ),
        ),
        'email' => array(
            'notEmpty' => array(
                'rule' => array('email'),
                'message' => 'Digite um email valido para o usuário!'
            ),
        ),
        'tipo' => array(
            'valid' => array(
                'rule' => array('inList', array('empregador', 'usuario')),
                'message' => 'Selecione o tipo',
                'allowEmpty' => false
            )
        )
    );
    
    public $errorMessage = '';

    public function beforeSave($options = array()) {
         
         $passWrd = $this->findById($this->data[$this->alias]['id']);
         
        if (isset($this->data[$this->alias]['senha']) && ($passWrd['User']['senha'] != $this->data[$this->alias]['senha'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['senha'] = $passwordHasher->hash(
                $this->data[$this->alias]['senha']
            );
        } else {
            $this->data[$this->alias]['senha'] = $passWrd['User']['senha'];
        }
        
        return true;
    }
    
    public function getAutor($user_id)
    {
        if (isset($user_id)) {
            $autor = $this->findById($user_id);
            return $autor['User']['nome'];
        }
        
        return false;
        
    }
    
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