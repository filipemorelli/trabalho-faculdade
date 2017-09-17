<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

/**
 * Class User
 */
class User extends AppModel
{

    /**
     * @var string
     */
    public $displayField = 'nome';

    /**
     * @var array
     */
    public $validate = array(
        'nome'  => array(
            'required' => array(
                'rule'    => array('notBlank'),
                'message' => 'Digite um nome para o usuário'
            )
        ),
        'senha' => array(
            'notEmpty' => array(
                'rule'    => array('notBlank'),
                'message' => 'A senha do usuário não pode estar vazia!'
            ),
            'password' => array(
                'rule'    => array(
                    'minLength',
                    '6'
                ),
                'message' => 'Minimo de 6 caracteres'
            ),
        ),
        'email' => array(
            'notEmpty' => array(
                'rule'    => array('email'),
                'message' => 'Digite um email valido para o usuário!'
            ),
            'required' => array(
                'rule'    => array('isUnique'),
                'message' => 'E-mail já cadastrado!'
            ),
        ),
        'tipo'  => array(
            'valid' => array(
                'rule'       => array(
                    'inList',
                    array(
                        'trabalhador',
                        'empregador'
                    )
                ),
                'message'    => 'Selecione o tipo',
                'allowEmpty' => false
            )
        )
    );

    /**
     * @var string
     */
    public $errorMessage = '';

    /**
     * @param array $options
     * @return bool
     */
    public function beforeSave($options = array())
    {

        //se tiver id pega dados usuario
        if (isset($this->data['User']['id'])) {
            $passWrd = $this->findById($this->data['User']['id']);
        }
        //se requisicao tiver senha e a senha for diferente da antiga
        if (isset($this->data['User']['senha']) && ($passWrd['User']['senha'] != $this->data['User']['senha'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data['User']['senha'] = $passwordHasher->hash($this->data['User']['senha']);
        }
        else {
            //se nao vai receber a senha antiga
            $this->data['User']['senha'] = $passWrd['User']['senha'];
        }

        return true;
    }

    /**
     * @param $user_id
     * @return bool
     */
    public function getAutor($user_id)
    {
        if (isset($user_id)) {
            $autor = $this->findById($user_id);
            return $autor['User']['nome'];
        }

        return false;

    }

    /**
     * @param $user
     * @return bool
     */
    public function inativar($user)
    {

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

    /**
     * @param $user
     * @return bool
     */
    public function reativar($user)
    {
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