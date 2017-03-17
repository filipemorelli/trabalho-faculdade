<?php

App::uses('AuthComponent', 'Controller/Component');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class UsersController extends AppController
{
    public $components = array('Paginator');

    public function beforeFilter()
    {
        $this->Auth->allow(array('logout', 'forgot', 'add', 'vagas', 'perfil', 'editarPerfil', 'curriculosPerfil', 'historicoCandidaturas'));
    }

    public function index()
    {
        $this->layout = 'pagina';
        $this->set('title_for_layout', __('Usuários'));
    }

    public function vagas(){
        //vagas está em empresa
        $this->layout = 'pagina';
        $this->set('title_for_layout', __('Vagas de Trabalho'));
    }

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
            $this->Session->setFlash(
                __('Usuário não pode ser salvo.'), 'error'
            );
        }
    }

    /**
    Perfil visualizados por empresas e outros usuarios
    */
    public function perfil(){
        $this->layout = 'pagina';
        $this->set('title_for_layout', __('Vizualizar Perfil'));
    }
    /**
    Curriculo visualizado somente pelo usuario e pode ser editado
    */
    public function editarPerfil(){
        $this->layout = 'pagina';
        $this->set('title_for_layout', __('Editar currículo'));
    }

    /**
    São os curriculos que o perfil irá ter
    */
    public function curriculosPerfil(){
        $this->layout = 'pagina';
        $this->set('title_for_layout', __('Vizualizar currículos'));
    }

    /**
    Historico de candidaturas do usuario
    */
    public function historicoCandidaturas(){
        $this->layout = 'pagina';
        $this->set('title_for_layout', __('Histórico currículos'));
    }


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
            $this->Session->setFlash(
                __('Usuário não pode ser editado.'), 'error'
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

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

    public function login()
    {
        $this->layout = 'login';
        $this->set('title_for_layout', __('Login'));
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Usuário ou senha inválida'), 'error');
        }
    }

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
            } else {
                //mandar email
                $novaSenha = md5(uniqid(""));
                $this->User->read(null, $user['User']['id']);
                $this->User->set(array(
                    'password' => $novaSenha,
                ));
                if($this->User->save()){
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                    $headers .= 'From: Administracao <administracao@sysrest.esy.es>' . "\r\n";
                    $mensagem = '
                        <h1 style="text-align: center; font-family: Helvetica, Verdana, sans-serif;">Recuperação de Senha</h1>
                        <p style="text-align: center; font-family: Helvetica, Verdana, sans-serif;">Esse email foi enviado para recuperação de sua senha!</p>
                        <p style="text-align: center; font-family: Helvetica, Verdana, sans-serif;margin: 15px 0;">Usuario: '.$user['User']['username'].'</p>
                        <p style="text-align: center; font-family: Helvetica, Verdana, sans-serif;margin: 15px 0;">Senha: '.$novaSenha.'</p>
                        <p style="text-align: center; font-family: Helvetica, Verdana, sans-serif;margin: 15px 0;"><b>OBS:</b> Mude sua senha quando entrar.</p>
                        <p style="text-align: center; font-family: Helvetica, Verdana, sans-serif;font-size: 10px;">&copy; BH Tecnologia.</p>
                    ';

                    try {
                        if (mail($this->data['User']['email'], "Mudar Senha do sistema", $mensagem, $headers)) {
                            $this->Session->setFlash(__('Email para mudança de senha foi enviado para: '.$this->data['User']['email']), 'success');
                            $this->redirect(array("controller" => "users", "action" => "login"));
                        } else {
                            $this->Session->setFlash(__('Não foi possivel enviar o email'), 'error');
                        }
                    } catch (Exception $e) {
                        throw new NotFoundException(__('Email não foi enviado'));
                    }
                } else {
                    throw new NotFoundException(__('Não salvou a senha'));
                }
            }
        }
    }

    public function rescue($session_id = null)
    {
        if ($this->Session->id(session_id()) == $session_id) {
            //sua nova senha e x gerada por hash depois ele atualiza
        } else {
            $this->redirect(array("controller" => "users", "action" => "index"));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function bloqueado()
    {
        $this->layout = 'bloqueado';
    }

    public function inativos()
    {
        self::isAuthorized();
        $this->layout = 'admin';
        $this->set('title_for_layout', __('Usuários inativos'));
    }

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

    public function pesquisar($tipo)
    {
        self::isAuthorized();
        $this->layout = 'ajax';
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            if($tipo == 1){
                return $this->buscaDados(1);
            } else {
                return $this->buscaDados(0);
            }
        }
    }

    private function buscaDados($ativo){

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
            "recordsTotal" => $total,
            "recordsFiltered" => $filtrado,
            "data" => $data
        );

        return json_encode($resultDataTables);
    }

}

?>