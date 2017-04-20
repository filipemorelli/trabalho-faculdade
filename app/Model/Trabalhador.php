<?php
App::uses('AuthComponent', 'Controller/Component');

class Trabalhador extends AppModel {
    public $name = 'Trabalhadore';

    public $displayField = 'profissao';
    public $belongsTo = array(
        'User' => array(
            'className'    => 'User',
            'conditions'   => array("User.ativo" => '1'),
            'order'        => '',
            'foreignKey'   => 'user_id'
        ),
        'Endereco' => array(
            'className'    => 'Endereco',
            'order'        => '',
            'foreignKey'   => 'endereco_id'
        ),
    );

    public $hasMany = array(
        'TrabalhadorEscolaridade' => array(
            'className'    => 'TrabalhadorEscolaridade',
            'order'        => '',
            'foreignKey'   => 'trabalhador_id',
        ),
        'TrabalhadorExperiencia' => array(
            'className'    => 'TrabalhadorExperiencia',
            'order'        => '',
            'foreignKey'   => 'trabalhador_id'
        ),
    );

    public $useTable = "trabalhadores";

    public $validate = array(
        'url_imagem' => array(
            'regra1_extensao' => array(
                'on' => 'create',
                'rule' => array('extension', array('jpg', 'jpeg', 'png', 'gif')),
                'message' => 'Somente arquivos JPG, PNG e GIF',
                'allowEmpty' => true
            )
        ),
        'nome' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite o seu nome'
            )
        ),
        'profissao' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite o nome da sua profissão'
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
        'site' => array(
            'notEmpty' => array(
                'rule' => array('url'),
                'message' => 'Digite o seu site se tiver!',
                'allowEmpty' => true,
            ),
        ),
        'telefone' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite o seu telefone.'
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite o seu email.'
            )
        ),
        'data_nascimento' => array(
            'notEmpty' => array(
                'rule' => array('date'),
                'allowEmpty' => true,
                'message' => 'Digite a data de seu nascimento!',
            ),
        ),
        'habilidades' => array(
            'notEmpty' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite ao menos 1 habilidade!',
            ),
        ),
        'url_linkedin' => array(
            'notEmpty' => array(
                'rule' => array('url'),
                'message' => 'Digite o site da empresa!',
                'allowEmpty' => true,
            ),
        ),
        'url_facebook' => array(
            'notEmpty' => array(
                'rule' => array('url'),
                'message' => 'Digite o site da empresa!',
                'allowEmpty' => true,
            ),
        ),
        'url_google_plus' => array(
            'notEmpty' => array(
                'rule' => array('url'),
                'message' => 'Digite o site da empresa!',
                'allowEmpty' => true,
            ),
        ),
        'descricao_completa' => array(
            'regra1' => array(
                'rule' => array('notBlank'),
                'message' => 'Digite a descrição completa da empresa!',
                'allowEmpty' => false
            ),
            'regra2' => array(
                'rule' => array('minLength', 10),
                'message' => 'Digite uma descrição com mais de 10 caracteres!',
            ),
            'regra3' => array(
                'rule' => array('maxLength', 65535),
                'message' => 'Digite uma descrição com menos de 65535 caracteres!'
            )
        ),
    );
    
    public $errorMessage = '';
    public function beforeValidate($options = array())
    {
        if($this->data['Trabalhador']['url_imagem']['size'] === 0){
            unset($this->data['Trabalhador']['url_imagem']);
        }
    }

    public function beforeSave($options = array())
    {
        $this->uploadAction();
    }

    private function salvaEmail(){
        if(isset($this->data['Trabalhador']['id'])){
            $email = $this->findById($this->data['Trabalhador']['id']);
        }
        //se requisicao tiver senha e a senha for diferente da antiga
        if (isset($this->data['Trabalhador']['email']) && ($email['Trabalhador']['email'] != $this->data['Trabalhador']['email'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data['Trabalhador']['senha'] = $passwordHasher->hash(
                $this->data['Trabalhador']['senha']
            );
        } else {
            //se nao vai receber a senha antiga
            $this->data['Trabalhador']['senha'] = $passWrd['Trabalhador']['senha'];
        }
    }

    private function uploadAction(){
        if(!empty($this->data['Trabalhador']['url_imagem']['name'])) {
            $this->data['Trabalhador']['url_imagem'] = $this->upload($this->data['Trabalhador']['url_imagem']);
        } else {
            unset($this->data['Trabalhador']['url_imagem']);
        }
    }

    private function upload($imagem = array(), $dir = 'img')
    {
        
        $dir = WWW_ROOT.'upload'.DS.$dir.DS.'trabalhador'.DS;

        if(($imagem['error']!=0) and ($imagem['size']==0)) {
            throw new NotImplementedException('Alguma coisa deu errado, o upload retornou erro '.$imagem['error'].' e tamanho '.$imagem['size']);
        }

        $this->checa_dir($dir);

        $imagem = $this->checa_nome($imagem, $dir);

        $this->move_arquivos($imagem, $dir);

        return $imagem['name'];
    }

    /**
    * Verifica se o diretório existe, se não ele cria.
    * @access public
    * @param Array $imagem
    * @param String $data
    */ 
    private function checa_dir($dir)
    {
        App::uses('Folder', 'Utility');
        $folder = new Folder();
        if (!is_dir($dir)){
            $folder->create($dir);
        }
    }

    /**
    * Verifica se o nome do arquivo já existe, se existir adiciona um numero ao nome e verifica novamente
    * @access public
    * @param Array $imagem
    * @param String $data
    * @return nome da imagem
    */ 
    public function checa_nome($imagem, $dir)
    {
        $imagem_info = pathinfo($dir.$imagem['name']);
        $imagem_nome = $this->trata_nome($imagem_info['filename']).'.'.$imagem_info['extension'];
        debug($imagem_nome);
        $conta = 2;
        while (file_exists($dir.$imagem_nome)) {
            $imagem_nome  = $this->trata_nome($imagem_info['filename']).'-'.$conta;
            $imagem_nome .= '.'.$imagem_info['extension'];
            $conta++;
            debug($imagem_nome);
        }
        $imagem['name'] = $imagem_nome;
        return $imagem;
    }
    
    /**
    * Trata o nome removendo espaços, acentos e caracteres em maiúsculo.
    * @access public
    * @param Array $imagem
    * @param String $data
    */ 
    public function trata_nome($imagem_nome)
    {
        $imagem_nome = strtolower(Inflector::slug($imagem_nome,'-'));
        return $imagem_nome;
    }

    /**
    * Move o arquivo para a pasta de destino.
    * @access public
    * @param Array $imagem
    * @param String $data
    */ 
    public function move_arquivos($imagem, $dir)
    {
        App::uses('File', 'Utility');
        $arquivo = new File($imagem['tmp_name']);
        $arquivo->copy($dir.$imagem['name']);
        $arquivo->close();
    }

    public function inativar($vaga){     
        if (!empty($vaga) && $vaga['Trabalhador']['ativo'] == 1) {
            $vaga['Trabalhador']['ativo'] = 0;
            if ($this->save($vaga)) {
                return true;
            }
        }
        $this->errorMessage = 'Vaga não pode ser removida, tente mais tarde.';
        return false;
    }
    
    public function reativar($vaga){
        if (!empty($vaga) && $vaga['Trabalhador']['ativo'] == 0) {
            $vaga['Trabalhador']['ativo'] = 1;
            if ($this->save($vaga)) {
                return true;
            }
        }
        
        return false;
    }
    
}
?>