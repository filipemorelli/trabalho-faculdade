<?php

App::uses('AuthComponent', 'Controller/Component');

/**
 * Class EmpresasController controle da parte dos empregadores
 */
class EmpresasController extends AppController
{
    public $helpers = array('UrlControl');
    /**
     * @var array
     */
    public $components = array('Paginator');

    /**
     * Verifica se usuário tem perfil
     *
     * @return bool
     */
    private function TemPerfil()
    {
        $qtde = $this->Empresa->find('count', array(
            'conditions' => array(
                'user_id =' => $this->Session->read('Auth.User.id'),
            ),
        ));
        return $qtde == 1;
    }

    /**
     * Força com que o usuário crie seu perfil antes de fazer qualquer modificação de seus dados
     *
     * @return bool|\Cake\Network\Response|null
     */
    private function ForcaCriarPerfil()
    {
        if (!$this->TemPerfil() && $this->request->params['action'] !== "editarPerfilEmpresa") {
            if ($this->Session->read('Auth.User.tipo') === "empregador") {
                $this->Session->setFlash(__('Precisa criar perfil da empresa!'), 'info');
            }
            return $this->redirect(array('action' => 'editarPerfilEmpresa'));
        }
        return true;
    }

    /**
     * Executa antes de executar os metodos
     */
    public function beforeFilter()
    {
        $this->ForcaCriarPerfil();
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
        //$this->Auth->allow(array('buscarfissionais', 'perfilEmpresa', 'editarPerfilEmpresa', 'adicionarVaga', 'listarVagas', 'detalhesVaga', 'candidatarVaga', 'candidadosAVaga'));
    }

    /**
     * Pagina para buscar Profissionais
     */
    public function buscarfissionais()
    {
        $this->set('title_for_layout', __('curar fissionais'));
    }

    /**
     * Perfil visualizados pelo administrador do perfil
     */
    public function perfilEmpresa()
    {
        $this->set('title_for_layout', __('Vizualizar perfil da Empresa'));
        $empresa = $this->Empresa->find('first', array(
            'conditions' => array(
                'user_id =' => $this->Session->read('Auth.User.id'),
            )
        ));
        $vagas = $this->Empresa->Vaga->find('all', array(
            'conditions' => array(
                'user_id =' => $this->Session->read('Auth.User.id'),
            )
        ));
        $this->set('empresa', $empresa);
        $this->set('vagas', $vagas);
    }

    /**
     * Curriculo visualizado somente pelo usuario e pode ser editado
     */
    public function editarPerfilEmpresa()
    {
        $this->set('title_for_layout', __('Editar perfil'));

        if ($this->request->is(array(
            'post',
            'put'
        ))
        ) {
            // verifica se existe perfil criado

            $empresaId = $this->Empresa->find('first', array(
                'fields'     => array('id'),
                'conditions' => array(
                    'user_id =' => $this->Session->read('Auth.User.id'),
                ),
                'recursive'  => -1
            ));
            if (!isset($empresaId['Empresa']['id'])) {
                $this->Empresa->create(); //cria perfil
            }
            else {
                $this->request->data['Empresa']['id'] = $empresaId['Empresa']['id'];
            }
            //coloca o user_id para vincular a conta
            $this->request->data['Empresa']['user_id'] = $this->Session->read('Auth.User.id');
            //salva ou atualiza
            if ($this->Empresa->save($this->request->data)) {
                $this->Session->setFlash(__('Perfil salvo com sucesso'), 'success');
                return $this->redirect(array('action' => 'editarPerfilEmpresa'));
            }
            $this->Session->setFlash(__('Perfil não pode ser salvo.'), 'error');
        }
        else {
            $this->request->data = $this->Empresa->find('first', array(
                'conditions' => array(
                    'user_id =' => $this->Session->read('Auth.User.id')
                ),
                'recursive'  => -1
            ));
            unset($this->request->data['Empresa']['password']);
        }
    }

    /*
        public function edit(){
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
    */
    /**
     * Adiciona Vaga de trabalho
     * @return \Cake\Network\Response|null
     */
    public function adicionarVaga()
    {
        $this->loadModel('Vaga');
        $this->set('title_for_layout', __('Adicionar vaga'));
        if ($this->request->is('post')) {
            //$this->
            $this->Vaga->create();
            $empresa_id = $this->Empresa->find('first', array(
                'fields'     => array('id'),
                'conditions' => array(
                    'Empresa.user_id' => $this->Session->read('Auth.User.id')
                ),
                'recursive'  => -1
            ));
            $this->request->data['Vaga']['empresa_id'] = $empresa_id['Empresa']['id'];
            if ($this->salvaRequisicaoVaga($this->request->data)) {
                $this->Session->setFlash(__('Vaga salvo com sucesso'), 'success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Vaga não pode ser salvo.'), 'error');
        }
    }

    /**
     * Edita a vaga de trabalho caso necessário
     *
     * @param null $id
     * @return \Cake\Network\Response|null
     */
    public function editarVaga($id = null)
    {
        $this->Empresa->Vaga->id = $id;
        if (!$this->Empresa->Vaga->exists()) {
            //throw new NotFoundException(__('Vaga Inválida'));
            return $this->redirect(array('action' => 'listarVagas'));
        }

        $vaga = $this->Empresa->Vaga->find('first', array(
            'conditions' => array(
                'Vaga.id'         => $id,
                'Empresa.user_id' => $this->Session->read('Auth.User.id')
            ),
        ));
        if (count($vaga) == 0) {
            return $this->redirect(array('action' => 'listarVagas'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Vaga']['empresa_id'] = $vaga['Empresa']['id'];
            if ($this->salvaRequisicaoVaga($this->request->data)) {
                $this->Session->setFlash(__('Vaga editado com sucesso'), 'success');
                return $this->redirect(array('action' => 'listarVagas'));
            }
            $this->Session->setFlash(__('Vaga não pode ser editado.'), 'error');
        }
        else {
            $this->request->data = $vaga;
        }
    }

    /**
     * Lista as vagas de trabalho que a empresa tem
     *
     * @param int $page
     */
    public function listarVagas($page = 1)
    {
        $this->loadModel('Vaga');
        $this->set('title_for_layout', __('Listar Vaga da empresa'));

        if ($this->request->is('post')) {
            $this->Session->write('EmpresaPesquisaVaga', $this->request->data);
            if ($page != 1) {
                $this->redirect(array(
                    "controller" => "users",
                    "action"     => "vagas"
                ));
            }
        }
        else {
            $this->request->data = $this->Session->read('EmpresaPesquisaVaga');
        }

        $conditions = $this->paginationConditionQuery($this->request->data);

        $conditions['Empresa.user_id'] = $this->Session->read('Auth.User.id');

        $this->Paginator->settings = array(
            'fields'     => array(
                'Vaga.id',
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
     * Exclui vaga de trabalho caso necessário
     *
     * @param null $id
     * @return \Cake\Network\Response|null
     */
    public function excluirVaga($id = null)
    {
        $this->loadModel('Vaga');
        $this->Vaga->id = $id;
        if (!$this->Vaga->exists()) {
            //throw new NotFoundException(__('Vaga Inválida'));
            return $this->redirect(array('action' => 'listarVagas'));
        }

        $vaga = $this->Vaga->find('first', array(
            'conditions' => array(
                'Vaga.id'         => $id,
                'Empresa.user_id' => $this->Session->read('Auth.User.id')
            ),
        ));
        if (count($vaga) == 0) {
            return $this->redirect(array('action' => 'listarVagas'));
        }

        if ($this->Vaga->inativar($vaga)) {
            $this->Session->setFlash(__('Vaga excluida com sucesso'), 'success');
            return $this->redirect(array('action' => 'listarVagas'));
        }
        $this->Session->setFlash(__($this->Vaga->errorMessage), 'error');
        return $this->redirect(array('action' => 'listarVagas'));
    }

    /**
     * Ativar vaga de trabalho
     *
     * @param null $id
     * @return \Cake\Network\Response|null
     */
    public function ativarVaga($id = null)
    {
        $this->loadModel('Vaga');
        $this->Vaga->id = $id;
        if (!$this->Vaga->exists()) {
            //throw new NotFoundException(__('Vaga Inválida'));
            return $this->redirect(array('action' => 'listarVagas'));
        }

        $vaga = $this->Vaga->find('first', array(
            'conditions' => array(
                'Vaga.id'         => $id,
                'Empresa.user_id' => $this->Session->read('Auth.User.id')
            ),
        ));
        if (count($vaga) == 0) {
            return $this->redirect(array('action' => 'listarVagas'));
        }

        if ($this->Vaga->reativar($vaga)) {
            $this->Session->setFlash(__('Vaga excluida com sucesso'), 'success');
            return $this->redirect(array('action' => 'listarVagas'));
        }
        $this->Session->setFlash(__($this->Vaga->errorMessage), 'error');
        return $this->redirect(array('action' => 'listarVagas'));
    }

    /**
     * Mostra detalhes da vaga de trabalho
     *
     * @param null $id
     * @return \Cake\Network\Response|null
     */
    public function detalhesVaga($id = null)
    {
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
        if (count($vaga) == 0) {
            return $this->redirect(array('action' => 'listarVagas'));
        }

        $this->set('vaga', $vaga);
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
     * Mostra candidatos à vaga
     *
     * @param null $id
     * @param int $page
     */
    public function candidadosAVaga($id = null, $page = 1)
    {
        $this->set('title_for_layout', __('Candidatos à vaga'));
        $this->loadModel('Trabalhador');
        $conditions = array(
            'Vaga.id'         => $id,
            'Vaga.empresa_id' => $this->Session->read('Auth.User.id')
        );
        $limit = 10;
        $this->Paginator->settings = array(
            'conditions' => $conditions,
            'page'       => $page,
            'limit'      => $limit
        );
        $this->paginate = array(
            'Trabalhador' => array(
                'conditions' => $conditions,
                'page'       => $page,
                'limit'      => $limit,
                'recursive'  => 1,
                'joins'      => array(
                    array(
                        'alias'      => 'TrabalhadorVaga',
                        'table'      => 'trabalhador_vaga',
                        'type'       => 'LEFT',
                        'conditions' => array(
                            'TrabalhadorVaga.trabalhador_id = Trabalhador.id',
                        )
                    ),
                    array(
                        'alias'      => 'Vaga',
                        'table'      => 'vagas_empresa',
                        'type'       => 'LEFT',
                        'conditions' => 'TrabalhadorVaga.vaga_id = Vaga.id'
                    )
                )
            )
        );
        $trabalhadores = $this->paginate('Trabalhador');
        $this->set(compact('trabalhadores'));
        $this->set('vaga_id', $id);
    }

    /**
     * Salva criação da vaga
     *
     * @param array $data informacoes da vaga de trabalho
     * @return boolean
     */
    private function salvaRequisicaoVaga($data)
    {
        $endereco = $data['Endereco'];
        $vaga = $data['Vaga'];

        $endereco_id = 0; //mudar para 0 depois dos testes

        //salvar/atualizar endereco
        $endereco_id = $this->salvaEndereco($endereco);

        //manipulacao de pedido
        $vaga['endereco_id'] = $endereco_id;
        return $this->Empresa->Vaga->save($vaga);
    }

    /**
     * @param array $endereco Dados do endereco da vaga
     * @return int
     */
    private function salvaEndereco($endereco)
    {

        $existeEndereco = $this->Empresa->Vaga->Endereco->find('first', array(
            'conditions' => array(
                'endereco'    => $endereco['endereco'],
                'complemento' => $endereco['complemento'],
                'bairro'      => $endereco['bairro'],
                'cidade'      => $endereco['cidade'],
                'estado'      => $endereco['estado'],
                'numero'      => $endereco['numero'],
                'cep'         => $endereco['cep'],
            )
        ));
        if (!$existeEndereco) {
            $this->Empresa->Vaga->Endereco->create();
            if ($this->Empresa->Vaga->Endereco->save($endereco)) {
                return $this->Empresa->Vaga->Endereco->id;
            }
            else {
                //nao chega aqui mas caso chegar
                throw new NotFoundException(__('Imposivel cadastro de endereco'));
            }
        }
        else {
            return $existeEndereco['Endereco']['id'];
        }
    }


}

?>