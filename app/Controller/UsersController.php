<?php

App::uses('AuthComponent', 'Controller/Component');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('CakeTime', 'Utility');


/**
 * Class UsersController Controlla ações de todos os usuarios cadastrados
 */
class UsersController extends AppController
{
    /**
     * @var array
     */
    public $components = array('Paginator');

    /**
     * Executa antes de executar os metodos
     */
    public function beforeFilter()
    {
        $this->Auth->allow(array(
            'logout',
            'forgot',
            'add',
            'vagas',
            'vaga',
            'login',
            'enderecoRapido',
            'tituloVagasRapido'
        ));
        if (!parent::isAuth()) {
            $this->redirect(array(
                "controller" => "pages",
                "action"     => "index"
            ));
        }
        $tipoUsuario = $this->Session->read('Auth.User.tipo');
        switch ($tipoUsuario) {
            case 'trabalhador':
                $this->layout = "trabalhador";
                break;
            case 'empregador':
                $this->layout = "empregador";
                break;
            default:
                $this->layout = "pagina";
                break;
        }
    }

    /**
     * Página Usúsuarios
     */
    public function index()
    {
        $this->set('title_for_layout', __('Usuários'));
    }

    /**
     * Busca dados Da vaga especifica
     *
     * @param int|null $id
     * @return \Cake\Network\Response|null
     */
    public function vaga($id = null)
    {
        if (is_null($id)) {
            $this->redirect(array(
                "controller" => "pages",
                "action"     => "index"
            ));
        }
        else {
            $this->set('title_for_layout', __('Sobre a vaga'));
            $this->loadModel('Vaga');

            $this->Vaga->id = $id;
            if (!$this->Vaga->exists()) {
                //throw new NotFoundException(__('Vaga Inválida'));
                return $this->redirect(array('action' => 'index'));
            }

            $vaga = $this->Vaga->find('first', array(
                'conditions' => array(
                    'Vaga.id' => $id
                ),
            ));

            if (count($vaga) == 0 || $vaga['Vaga']['status'] == 3) {
                $this->redirect(array(
                    "controller" => "pages",
                    "action"     => "index"
                ));
            }

            $cadidatouVaga = false;
            if (array_key_exists('Trabalhador', $vaga)) {
                foreach ($vaga['Trabalhador'] as $key => $value) {
                    if ($value['user_id'] == $this->Session->read('Auth.User.id')) {
                        $cadidatouVaga = true;
                        break;
                    }
                }
            }
            $this->set('vaga', $vaga);
            $this->set('cadidatouVaga', $cadidatouVaga);
        }

    }

    /**
     * Pesquisa todas as vagas disponiveis no sistema
     *
     * @param int $page
     */
    public function vagas($page = 1)
    {
        //vagas está em empresa
        $this->loadModel('Vaga');
        $this->set('title_for_layout', __('Vagas de Trabalho'));

        if ($this->request->is('post')) {
            $this->Session->write('FormularioPesquisaVaga', $this->request->data);
            if ($page != 1) {
                $this->redirect(array(
                    "controller" => "users",
                    "action"     => "vagas"
                ));
            }
        }
        else {
            $this->request->data = $this->Session->read('FormularioPesquisaVaga');
        }

        $conditions = $this->paginationConditionQuery($this->request->data);
        $conditions['Vaga.status !='] = 2;

        $this->Paginator->settings = array(
            'fields'     => array(
                'Vaga.id',
                'Vaga.descricao_rapida',
                'Vaga.periodo_trabalho',
                'Vaga.experiencia',
                'Vaga.salario',
                'Vaga.nome',
                'Vaga.url_imagem',
                'Vaga.status',
                'Vaga.modified',
                'Empresa.nome',
                'Vaga.ativo',
                'Endereco.cidade',
                'Endereco.estado'
            ),
            'conditions' => $conditions,
            'order'      => array(
                'Vaga.modified' => 'DESC',
                'Vaga.id'       => 'DESC'
            ),
            'page'       => $page,
            'limit'      => 10
        );

        $horasSemanais = $this->Vaga->find('list', array(
            'fields' => array(
                'Vaga.horario_trabalho',
                'Vaga.horasSemanaisExtenso'
            ),
            'group'  => array('Vaga.horario_trabalho')
        ));

        $vagas = $this->Paginator->paginate('Vaga');
        $this->set(compact('vagas'));
        $this->set(compact('horasSemanais'));


    }

    /**
     * Manipula as condições da paginação de pesquisa de vagas
     *
     * @param array $data
     * @return array
     */
    private function paginationConditionQuery($data)
    {

        $conditions = array();

        if (isset($data['Users']['cargo']) && strlen($data['Users']['cargo']) > 0) {
            $nomeVaga = $data['Users']['cargo'];
            $conditions['OR'] = array(
                'Vaga.nome LIKE'                  => "%$nomeVaga%",
                'Vaga.descricao_rapida LIKE'      => "%$nomeVaga%",
                'Vaga.descricao_completa LIKE'    => "%$nomeVaga%",
                'Empresa.nome LIKE'               => "%$nomeVaga%",
                'Empresa.descricao_rapida LIKE'   => "%$nomeVaga%",
                'Empresa.descricao_completa LIKE' => "%$nomeVaga%"
            );
        }

        if (isset($data['Users']['cidade']) && strlen($data['Users']['cidade']) > 0) {
            $conditions['Endereco.cidade'] = $data['Users']['cidade'];
        }

        if (isset($data['Users']['estado']) && strlen($data['Users']['estado']) > 0) {
            $conditions['Endereco.estado'] = $data['Users']['estado'];
        }

        if (isset($data['Users']['salario']) && $data['Users']['estado'] >= 0) {
            $salarioOperador = isset($data['Users']['salario-operador']) ? $data['Users']['salario-operador'] : '>=';
            $conditions["Vaga.salario $salarioOperador"] = $data['Users']['salario'];
        }

        if (isset($data['Users']['escolaridade']) && $data['Users']['escolaridade'] >= 0) {
            $conditions['Vaga.escolaridade >='] = $data['Users']['escolaridade'];
        }

        if (isset($data['Users']['periodo_trabalho']) && strlen($data['Users']['periodo_trabalho']) > 0) {
            $conditions['Vaga.periodo_trabalho'] = $data['Users']['periodo_trabalho'];
        }

        if (isset($data['Users']['horas']) && is_array($data['Users']['horas'])) {
            $conditions['Vaga.horario_trabalho'] = $data['Users']['horas'];
        }

        if (isset($data['Users']['tempo_vaga']) && strlen($data['Users']['tempo_vaga'])) {
            switch ($data['Users']['tempo_vaga']) {
                case 'hoje':
                    $conditions['Vaga.modified = '] = CakeTime::format(time(), '%Y-%m-%d');
                    break;
                case '3 dias':
                    $conditions['Vaga.modified BETWEEN ? and ?'] = array(
                        CakeTime::format('-3 days', '%Y-%m-%d'),
                        CakeTime::format(time(), '%Y-%m-%d')
                    );
                    //$conditions['Vaga.modi1fied'] = 'BETWEEN now() AND now() - INTERVAL 3 DAY';
                    break;
                case '1 semana':
                    $conditions['Vaga.modified BETWEEN ? and ?'] = array(
                        CakeTime::format('1 week ago', '%Y-%m-%d'),
                        CakeTime::format(time(), '%Y-%m-%d')
                    );
                    //$conditions['Vaga.modi1fied'] = 'BETWEEN now() AND now() - INTERVAL 3 DAY';
                    break;
                case '2 semanas':
                    $conditions['Vaga.modified BETWEEN ? and ?'] = array(
                        CakeTime::format('2 weeks ago', '%Y-%m-%d'),
                        CakeTime::format(time(), '%Y-%m-%d')
                    );
                    //$conditions['Vaga.modi1fied'] = 'BETWEEN now() AND now() - INTERVAL 3 DAY';
                    break;
                case '3 semanas':
                    $conditions['Vaga.modified BETWEEN ? and ?'] = array(
                        CakeTime::format('3 weeks ago', '%Y-%m-%d'),
                        CakeTime::format(time(), '%Y-%m-%d')
                    );
                    //$conditions['Vaga.modi1fied'] = 'BETWEEN now() AND now() - INTERVAL 3 DAY';
                    break;
                case '1 mes':
                    $conditions['Vaga.modified BETWEEN ? and ?'] = array(
                        CakeTime::format('1 month ago', '%Y-%m-%d'),
                        CakeTime::format(time(), '%Y-%m-%d')
                    );
                    //$conditions['Vaga.modi1fied'] = 'BETWEEN now() AND now() - INTERVAL 3 DAY';
                    break;
                case '2 meses':
                    $conditions['Vaga.modified BETWEEN ? and ?'] = array(
                        CakeTime::format('2 month ago', '%Y-%m-%d'),
                        CakeTime::format(time(), '%Y-%m-%d')
                    );
                    //$conditions['Vaga.modi1fied'] = 'BETWEEN now() AND now() - INTERVAL 3 DAY';
                    break;
                case '3 meses':
                    $conditions['Vaga.modified BETWEEN ? and ?'] = array(
                        CakeTime::format('3 month ago', '%Y-%m-%d'),
                        CakeTime::format(time(), '%Y-%m-%d')
                    );
                    //$conditions['Vaga.modi1fied'] = 'BETWEEN now() AND now() - INTERVAL 3 DAY';
                    break;
                case '6 meses':
                    $conditions['Vaga.modified BETWEEN ? and ?'] = array(
                        CakeTime::format('6 month ago', '%Y-%m-%d'),
                        CakeTime::format(time(), '%Y-%m-%d')
                    );
                    //$conditions['Vaga.modi1fied'] = 'BETWEEN now() AND now() - INTERVAL 3 DAY';
                    break;

                default:
                    # code...
                    break;
            }
            //$conditions['Vaga.horario_trabalho'] = '';
        }

        return $conditions;
    }

    /**
     * Cria um novo usuário
     *
     * @return \Cake\Network\Response|null
     */
    public function add()
    {
        $this->layout = 'login';
        $this->set('title_for_layout', __('Adicionar Usuário'));
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuário salvo com sucesso'), 'success');
                return $this->redirect(array('action' => 'login'));
            }
            $this->Session->setFlash(__('Usuário não pode ser salvo.'), 'error');
        }
    }

    /**
     * Perfil visualizados por empresas e outros usuarios
     *
     * @param int|null $id
     */
    public function perfil($id = null)
    {
        $this->set('title_for_layout', __('Vizualizar Perfil'));
    }

    /**
     * Curriculo visualizado somente pelo usuario e pode ser editado
     */
    public function editarPerfil()
    {
        $this->set('title_for_layout', __('Editar currículo'));
    }

    /**
     * São os curriculos que o perfil irá ter
     */
    public function curriculosPerfil()
    {
        $this->set('title_for_layout', __('Vizualizar currículos'));
    }

    /**
     * Historico de candidaturas do usuario
     */
    public function historicoCandidaturas()
    {
        $this->set('title_for_layout', __('Histórico currículos'));
    }

    /**
     * Edita as informações do usuário
     *
     * @param int|null $id
     * @return \Cake\Network\Response|null
     */
    public function edit($id = null)
    {
        self::isAuthorized();
        $this->layout = 'admin';
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário Inválido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuário editado com sucesso'), 'success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Usuário não pode ser editado.'), 'error');
        }
        else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    /**
     * Exclui o usuário do sistema
     *
     * @param int|null $id
     * @return \Cake\Network\Response|null
     */
    public function delete($id = null)
    {
        self::isAuthorized();
        //$this->request->onlyAllow('post');
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário Inválido'));
        }
        $user = $this->User->read(null, $id);
        if ($this->User->inativar($user)) {
            $this->Session->setFlash(__('Usuário removido com sucesso.'), 'success');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__($this->User->errorMessage), 'error');
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * Responsavel pela autenticação dos usuarios no sistema
     *
     * @return \Cake\Network\Response|null
     */
    public function login()
    {
        $this->layout = 'login';
        $this->set('title_for_layout', __('Login'));
        if ($this->request->is('post')) {
            if ($this->Auth->login() && $this->request->query['redirect'] != "") {
                return $this->redirect($this->request->query['redirect']);
            }
            else if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Usuário ou senha inválida'), 'error');
        }
    }

    /**
     * Recuperação de senha
     */
    public function forgot()
    {
        $this->layout = 'login';
        $this->set('title_for_layout', __('Forgot'));

        if ($this->request->is('post')) {
            $user = $this->User->find('first', array(
                'conditions' => array('User.email' => $this->data['User']['email'])
            ));
            //verifica se possui usuario
            if (count($user) == 0) {
                $this->Session->setFlash(__('Email não consta no sistema'), 'error');
            }
            else {
                //mandar email
                $novaSenha = md5(uniqid(""));
                $this->User->read(null, $user['User']['id']);
                $this->User->set(array(
                    'password' => $novaSenha,
                ));
                if ($this->User->save()) {
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                    $headers .= 'From: Administracao <administracao@sysrest.esy.es>' . "\r\n";
                    $mensagem = '
                        <h1 style="text-align: center; font-family: Helvetica, Verdana, sans-serif;">Recuperação de Senha</h1>
                        <p style="text-align: center; font-family: Helvetica, Verdana, sans-serif;">Esse email foi enviado para recuperação de sua senha!</p>
                        <p style="text-align: center; font-family: Helvetica, Verdana, sans-serif;margin: 15px 0;">Usuario: ' . $user['User']['username'] . '</p>
                        <p style="text-align: center; font-family: Helvetica, Verdana, sans-serif;margin: 15px 0;">Senha: ' . $novaSenha . '</p>
                        <p style="text-align: center; font-family: Helvetica, Verdana, sans-serif;margin: 15px 0;"><b>OBS:</b> Mude sua senha quando entrar.</p>
                        <p style="text-align: center; font-family: Helvetica, Verdana, sans-serif;font-size: 10px;">&copy; BH Tecnologia.</p>
                    ';

                    try {
                        if (mail($this->data['User']['email'], "Mudar Senha do sistema", $mensagem, $headers)) {
                            $this->Session->setFlash(__('Email para mudança de senha foi enviado para: ' . $this->data['User']['email']), 'success');
                            $this->redirect(array(
                                "controller" => "users",
                                "action"     => "login"
                            ));
                        }
                        else {
                            $this->Session->setFlash(__('Não foi possivel enviar o email'), 'error');
                        }
                    }
                    catch (Exception $e) {
                        throw new NotFoundException(__('Email não foi enviado'));
                    }
                }
                else {
                    throw new NotFoundException(__('Não salvou a senha'));
                }
            }
        }
    }

    /**
     * rescue
     *
     * @param null $session_id
     */
    public function rescue($session_id = null)
    {
        if ($this->Session->id(session_id()) == $session_id) {
            //sua nova senha e x gerada por hash depois ele atualiza
        }
        else {
            $this->redirect(array(
                "controller" => "users",
                "action"     => "index"
            ));
        }
    }

    /**
     * Desloga o usuario no sistema
     *
     * @return \Cake\Network\Response|null
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Usuários inativos no sistema
     */
    public function inativos()
    {
        self::isAuthorized();
        $this->layout = 'admin';
        $this->set('title_for_layout', __('Usuários inativos'));
    }

    /**
     * Reativa usuários no sistema
     *
     * @param int|null $id
     * @return \Cake\Network\Response|null
     */
    public function reativar($id = null)
    {
        self::isAuthorized();
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário Inválido'));
        }
        $user = $this->User->read(null, $id);
        if ($this->User->reativar($user)) {
            $this->Session->setFlash(__('Usuário reativado com sucesso.'), 'success');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Usuário não foi reativado.'), 'error');
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * Pesquisa usuários no sistema
     * @param $tipo
     * @return string
     */
    public function pesquisar($tipo)
    {
        self::isAuthorized();
        $this->layout = 'ajax';
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            if ($tipo == 1) {
                return $this->buscaDados(1);
            }
            else {
                return $this->buscaDados(0);
            }
        }
    }

    private function buscaDados($ativo)
    {

        $limit = is_null($this->request->data['length']) ? 10 : $this->request->data['length'];
        $start = is_null($this->request->data['start']) ? 0 : $this->request->data['start'];
        $colOrder = $this->request->data['columns'][$this->request->data['order'][0]['column']]['data'];
        $orderBY = $this->request->data['order'][0]['dir'];

        switch ($colOrder) {
            case '0.created':
                $colOrder = "u.created";
                break;
            case '0.modified':
                $colOrder = "u.modified";
                break;
            default:
                # code...
                break;
        }

        $queryBase = "SELECT u.id, u.username, u.email, u.telefone, u.role, DATE_FORMAT(u.created, '%d/%m/%Y %H:%i:%s') as created,  DATE_FORMAT(u.modified, '%d/%m/%Y %H:%i:%s') as modified from users u
                    WHERE u.ativo = $ativo AND (
                    u.id LIKE '%" . $this->request->data['search']['value'] . "%' OR
                    u.username LIKE '%" . $this->request->data['search']['value'] . "%' OR
                    u.email LIKE '%" . $this->request->data['search']['value'] . "%' OR
                    u.telefone LIKE '%" . $this->request->data['search']['value'] . "%' OR
                    u.role LIKE '%" . $this->request->data['search']['value'] . "%' OR
                    DATE_FORMAT(u.created, '%d/%m/%Y %H:%i:%s') LIKE '%" . $this->request->data['search']['value'] . "%' OR
                    DATE_FORMAT(u.modified, '%d/%m/%Y %H:%i:%s') LIKE '%" . $this->request->data['search']['value'] . "%')
                    ORDER BY $colOrder $orderBY";

        $query = $queryBase . " LIMIT $limit OFFSET $start";
        $users = $this->User->query($query);

        $total = $this->User->find('count', array(
            'conditions' => array("User.ativo =" => $ativo)
        )); //total de linhas

        $filtrado = count($this->User->query($queryBase)); //total filtrado


        $data = array(); //json com dados
        foreach ($users as $user) {
            array_push($data, $user);
        }

        $resultDataTables = array(
            "recordsTotal"    => $total,
            "recordsFiltered" => $filtrado,
            "data"            => $data
        );

        return json_encode($resultDataTables);
    }

    /**
     * Busca Endereco rápido
     *
     * @return json
     */
    public function enderecoRapido()
    {
        $this->layout = 'ajax';
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $this->loadModel('Vaga');
            $query = $this->params->query['q'];
            $result = $this->Vaga->find('all', array(
                "fields"     => array("Endereco.bairro, Endereco.estado, Endereco.cidade"),
                "conditions" => array(
                    'OR' => array(
                        'Endereco.bairro LIKE' => "%$query%",
                        'Endereco.estado LIKE' => "%$query%",
                        'Endereco.cidade LIKE' => "%$query%",
                        'Endereco.cep LIKE'    => "%$query%",
                    )
                ),
                "limit"      => 10,
                "group"      => array(
                    "Endereco.estado",
                    "Endereco.cidade",
                    "Endereco.bairro"
                )
            ));
            return json_encode(array(
                "options" => $result
            ));
        }
    }

    /**
     * Busca Endereco rapido
     *
     * @return json
     */
    public function tituloVagasRapido()
    {
        $this->layout = 'ajax';
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $this->loadModel('Vaga');
            $query = $this->params->query['q'];
            $result = $this->Vaga->find('all', array(
                "fields"     => array("Vaga.nome"),
                "conditions" => array(
                    'OR' => array(
                        'Vaga.nome LIKE' => "%$query%"
                    )
                ),
                "limit"      => 10,
                "group"      => array("Vaga.nome"),
                "recursive"  => -1
            ));
            return json_encode(array(
                "options" => $result
            ));
        }
    }

}

?>