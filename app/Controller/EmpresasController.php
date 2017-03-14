<?php

App::uses('AuthComponent', 'Controller/Component');

class EmpresasController extends AppController
{
    public $components = array('Paginator');

    public function beforeFilter()
    {
        $this->Auth->allow(array('buscarProfissionais', 'perfilEmpresa', 'editarPerfilEmpresa', 'adicionarVaga', 'listarVagas', 'detalhesVaga', 'candidatarVaga', 'candidadosAVaga'));
    }

    public function buscarProfissionais(){
        $this->layout = 'pagina';
        $this->set('title_for_layout', __('Procurar Profissionais'));
    }

    /**
    Perfil visualizados por empresas e outros usuarios
    */
    public function perfilEmpresa(){
        $this->layout = 'pagina';
        $this->set('title_for_layout', __('Vizualizar perfil da Empresa'));
    }
    /**
    Curriculo visualizado somente pelo usuario e pode ser editado
    */
    public function editarPerfilEmpresa(){
        $this->layout = 'pagina';
        $this->set('title_for_layout', __('Editar perfil'));
    }

    public function adicionarVaga(){
        $this->layout = 'pagina';
        $this->set('title_for_layout', __('Adicionar vaga'));
    }

    public function listarVagas(){
        $this->layout = 'pagina';
        $this->set('title_for_layout', __('Listar Vaga da empresa'));
    }

    public function detalhesVaga(){
        $this->layout = 'pagina';
        $this->set('title_for_layout', __('Sobre a vaga'));
    }

    public function candidatarVaga() {
        $this->layout = 'pagina';
        $this->set('title_for_layout', __('Candidatar a vaga'));
	}

    public function candidadosAVaga(){
        $this->layout = 'pagina';
        $this->set('title_for_layout', __('Candidatos à vaga'));
    }
}

?>