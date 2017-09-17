<?php
App::uses('AuthComponent', 'Controller/Component');

/**
 * Class Empresa Model Empresa resoponsavel por integridade dos dados da tabela empresa
 */
class Empresa extends AppModel
{

    /**
     * @var string
     */
    public $displayField = 'nome';

    /**
     * Relacionamento de tabela
     *
     * @var array
     */
    public $hasMany = array(
        'Vaga' => array(
            'className'  => 'Vaga',
            'conditions' => array("Vaga.ativo" => 1),
            'order'      => '',
            'limit'      => 5,
            'order'      => array(
                'Vaga.modified' => 'desc',
                'Vaga.created'  => 'desc',
                'Vaga.id'       => 'desc'
            )
        )
    );

    /**
     * Relacionamento de tabela
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className'  => 'User',
            'conditions' => array("User.ativo" => '1'),
            'order'      => '',
            'foreignKey' => 'user_id'
        )
    );

    /**
     * Responsavel por manter as validações dos campos
     *
     * @var array
     */
    public $validate = array(
        'url_imagem'          => array(
            'regra1_extensao' => array(
                'on'         => 'create',
                'rule'       => array(
                    'extension',
                    array(
                        'jpg',
                        'jpeg',
                        'png',
                        'gif'
                    )
                ),
                'message'    => 'Somente arquivos JPG, PNG e GIF',
                'allowEmpty' => true
            )
        ),
        'nome'                => array(
            'required' => array(
                'rule'    => array('notBlank'),
                'message' => 'Digite um nome para o usuário'
            )
        ),
        'ramo'                => array(
            'notEmpty' => array(
                'rule'    => array('notBlank'),
                'message' => 'Digite o ramo da empresa!'
            ),
        ),
        'descricao_rapida'    => array(
            'regra1' => array(
                'rule'    => array('notBlank'),
                'message' => 'Digite a descrição de sua empresa!'
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
        'qtde_empregados'     => array(
            'valid' => array(
                'rule'       => array(
                    'inList',
                    array(
                        'abaixo de 10',
                        'abaixo de 50',
                        'abaixo de 200',
                        'abaixo de 500',
                        'abaixo de 1000',
                        'acima de 1001'
                    )
                ),
                'message'    => 'Selecione a quantidade de funcionários',
                'allowEmpty' => false
            )
        ),
        'site'                => array(
            'notEmpty' => array(
                'rule'       => array('url'),
                'message'    => 'Digite o site da empresa!',
                'allowEmpty' => true,
            ),
        ),
        'aniversario_empresa' => array(
            'notEmpty' => array(
                'rule'       => array('date'),
                'allowEmpty' => true,
                'message'    => 'Digite a data de anivesário da empresa!',
            ),
        ),
        'telefone'            => array(
            'regra1' => array(
                'rule'    => array('notBlank'),
                'message' => 'Digite o telefone de contato!',
            ),
            'regra2' => array(
                'rule'    => array(
                    'naturalNumber',
                    true
                ),
                'message' => 'Digite somente numeros no telefone!',
            )
        ),
        'email'               => array(
            'notEmpty' => array(
                'rule'    => array('email'),
                'message' => 'Digite um email valido para o usuário!'
            ),
            'required' => array(
                'rule'    => array('isUnique'),
                'message' => 'E-mail já cadastrado!',
                'on'      => 'create'
            ),
        ),
        'url_facebook'        => array(
            'regra' => array(
                'rule'       => array('url'),
                'message'    => 'Digite a url da página ou perfil da sua empresa no facebook!',
                'allowEmpty' => true,
            ),
        ),
        'url_google_plus'     => array(
            'regra' => array(
                'rule'       => array('url'),
                'message'    => 'Digite a url da página ou perfil da sua empresa no Google +!',
                'allowEmpty' => true,
            ),
        ),
        'url_twitter'         => array(
            'regra' => array(
                'rule'       => array('url'),
                'message'    => 'Digite a url da perfil da sua empresa no Twitter!',
                'allowEmpty' => true,
            ),
        ),
        'url_instagram'       => array(
            'regra' => array(
                'rule'       => array('url'),
                'message'    => 'Digite a url do perfil da sua empresa no Instagram!',
                'allowEmpty' => true,
            ),
        ),
        'url_pinterest'       => array(
            'regra' => array(
                'rule'       => array('url'),
                'message'    => 'Digite a url da página ou perfil da sua empresa no Pinterest!',
                'allowEmpty' => true,
            ),
        ),
        'url_youtube'         => array(
            'regra' => array(
                'rule'       => array('url'),
                'message'    => 'Digite a url da página da sua empresa no Youtube!',
                'allowEmpty' => true,
            ),
        ),
        'descricao_completa'  => array(
            'regra1' => array(
                'rule'       => array('notBlank'),
                'message'    => 'Digite a descrição completa da empresa!',
                'allowEmpty' => false
            ),
            'regra2' => array(
                'rule'    => array(
                    'minLength',
                    10
                ),
                'message' => 'Digite uma descrição com mais de 10 caracteres!',
            ),
            'regra3' => array(
                'rule'    => array(
                    'maxLength',
                    65535
                ),
                'message' => 'Digite uma descrição com menos de 65535 caracteres!'
            )
        ),
    );

    /**
     * @var string
     */
    public $errorMessage = '';

    /**
     * @param array $options
     * @return void
     */
    public function beforeValidate($options = array())
    {
        if ($this->data['Empresa']['url_imagem']['size'] === 0) {
            unset($this->data['Empresa']['url_imagem']);
        }
    }

    /**
     * @param array $options
     * @return void
     */
    public function beforeSave($options = array())
    {
        $this->uploadAction();
    }

    /**
     * Salva Email
     */
    private function salvaEmail()
    {
        if (isset($this->data['Empresa']['id'])) {
            $email = $this->findById($this->data['Empresa']['id']);
        }
        //se requisicao tiver senha e a senha for diferente da antiga
        if (isset($this->data['Empresa']['email']) && ($email['Empresa']['email'] != $this->data['Empresa']['email'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data['Empresa']['senha'] = $passwordHasher->hash($this->data['Empresa']['senha']);
        }
        else {
            //se nao vai receber a senha antiga
            $this->data['Empresa']['senha'] = $passWrd['Empresa']['senha'];
        }
    }

    /**
     * Upload File
     */
    private function uploadAction()
    {
        if (!empty($this->data['Empresa']['url_imagem']['name'])) {
            $this->data['Empresa']['url_imagem'] = $this->upload($this->data['Empresa']['url_imagem']);
        }
        else {
            unset($this->data['Empresa']['url_imagem']);
        }
    }

    /**
     * Faz o Upload do arquivo
     */
    private function upload($imagem = array(), $dir = 'img')
    {
        $dir = WWW_ROOT . 'upload' . DS . $dir . DS . 'empresa' . DS;

        if (($imagem['error'] != 0) and ($imagem['size'] == 0)) {
            throw new NotImplementedException('Alguma coisa deu errado, o upload retornou erro ' . $imagem['error'] . ' e tamanho ' . $imagem['size']);
        }

        $this->checa_dir($dir);

        $imagem = $this->checa_nome($imagem, $dir);

        $this->move_arquivos($imagem, $dir);

        return $imagem['name'];
    }

    /**
     * Verifica se o diretório existe, se não ele cria.
     *
     * @param string $dir
     */
    private function checa_dir($dir)
    {
        App::uses('Folder', 'Utility');
        $folder = new Folder();
        if (!is_dir($dir)) {
            $folder->create($dir);
        }
    }

    /**
     * Verifica se o nome do arquivo já existe, se existir adiciona um numero ao nome e verifica novamente
     *
     * @param string $imagem
     * @param string $dir
     * @return string caminho da imagem
     */
    public function checa_nome($imagem, $dir)
    {
        $imagem_info = pathinfo($dir . $imagem['name']);
        $imagem_nome = $this->trata_nome($imagem_info['filename']) . '.' . $imagem_info['extension'];
        debug($imagem_nome);
        $conta = 2;
        while (file_exists($dir . $imagem_nome)) {
            $imagem_nome = $this->trata_nome($imagem_info['filename']) . '-' . $conta;
            $imagem_nome .= '.' . $imagem_info['extension'];
            $conta++;
            debug($imagem_nome);
        }
        $imagem['name'] = $imagem_nome;
        return $imagem;
    }

    /**
     * Trata o nome removendo espaços, acentos e caracteres em maiúsculo
     *
     * @param string $imagem_nome
     * @return string
     */
    public function trata_nome($imagem_nome)
    {
        $imagem_nome = strtolower(Inflector::slug($imagem_nome, '-'));
        return $imagem_nome;
    }

    /**
     * Move o arquivo para a pasta de destino.
     *
     * @param array $imagem
     * @param string $dir
     */
    public function move_arquivos($imagem, $dir)
    {
        App::uses('File', 'Utility');
        $arquivo = new File($imagem['tmp_name']);
        $arquivo->copy($dir . $imagem['name']);
        $arquivo->close();
    }

    /**
     * Inativar empresa
     *
     * @param array $Empresa
     * @return bool
     */
    public function inativar($Empresa)
    {

        // pr(AuthComponent::Empresa('id'));die;
        if (AuthComponent::Empresa('id') == $Empresa['Empresa']['id']) {
            $this->errorMessage = 'Usuário não pode excluir a si mesmo.';
            return false;
        }

        if (!empty($Empresa) && $Empresa['Empresa']['ativo'] == 1) {
            $Empresa['Empresa']['ativo'] = 0;
            if ($this->save($Empresa)) {
                return true;
            }
        }
        $this->errorMessage = 'Usuário não pode ser removido, tente mais tarde.';
        return false;
    }

    /**
     * Reativar empresa
     *
     * @param array $Empresa
     * @return bool
     */
    public function reativar($Empresa)
    {
        if (!empty($Empresa) && $Empresa['Empresa']['ativo'] == 0) {
            $Empresa['Empresa']['ativo'] = 1;
            if ($this->save($Empresa)) {
                return true;
            }
        }

        return false;
    }

}

?>