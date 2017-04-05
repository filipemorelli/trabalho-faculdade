<header class="page-header bg-img size-lg">
    <div class="container no-shadow">
        <h1 class="text-center">Nossas Vagas</h1>
        <p class="lead text-center">Aqui está a lista de suas vagas de trabalho. Você pode editá-los ou excluí-los, ou até mesmo adicionar um novo.</p>
    </div>
</header>
<main>
    <section class="no-padding-top bg-alt">
        <div class="container">
            <?php echo $this->Session->flash(); ?>
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <h5>
                    <?php
                        echo $this->Paginator->counter(
                            'Encontramos <strong>{:count}</strong> de vagas, você está vendo <i>{:page}</i> de <i>{:pages}</i>'
                        );
                    ?>
                </div>
                <div class="col-xs-12 col-sm-4 text-right">
                    <br>
                    <?php echo $this->Html->link('Adicionar Nova Vaga', array('controller' => 'empresas', 'action' => 'adicionarVaga'), array('class' => 'btn btn-primary btn-sm', 'title' => 'Adicionar Nova Vaga')); ?>
                </div>
            </div>

            <div class="row">
                <?php
                    foreach($vagas as $vaga){
                ?>
                    <div class="col-xs-12">
                        <div class="item-block<?php echo $vaga['Vaga']['ativo'] == 0 ? ' item-removed': '' ;?>">
                            <header>
                                <a href="<?php echo $this->Html->url(array('controller' => 'empresas', 'action' => 'detalhesVaga', 'id' => $vaga['Vaga']['id'])); ?>">
                                    <?php echo $this->Html->image('/upload/img/vaga/'.$vaga['Vaga']['url_imagem'], array('alt' => $vaga['Vaga']['nome']." - ". $vaga['Empresa']['nome'], 'title' => $vaga['Vaga']['nome']." - ". $vaga['Empresa']['nome']));?>
                                </a>
                                <div class="hgroup">
                                    <h4><a href="<?php echo $this->Html->url(array('controller' => 'empresas', 'action' => 'detalhesVaga', 'id' => $vaga['Vaga']['id'])); ?>"><?php echo $vaga['Vaga']['nome']; ?></a></h4>
                                    <h5><a href="<?php echo $this->Html->url(array('controller' => 'empresas', 'action' => 'detalhesVaga', 'id' => $vaga['Vaga']['id'])); ?>"><?php echo $vaga['Empresa']['nome']; ?></a></h5> </div>
                                <div class="header-meta"> <span class="location">Menlo park, CA</span>
                                    <time datetime="<?php echo $vaga['Vaga']['modified']; ?>"><?php echo $this->Tradutortempo->tempoPtBr($this->Time->timeAgoInWords($vaga['Vaga']['modified'])); ?></time>
                                </div>
                            </header>
                            <footer>
                                <p class="status"><strong>Status:</strong> Pending approval</p>
                                <div class="action-btn"> 
                                    <?php echo $this->Html->link('Editar', array('controller' => 'empresas', 'action' => 'editarVaga', 'id' => $vaga['Vaga']['id']), array('class' => 'btn btn-xs btn-gray', 'title' => 'Editar vaga '. $vaga['Vaga']['nome'])) ?>
                                    &nbsp;
                                    <?php echo $this->Html->link('Candidatos', array('controller' => 'empresas', 'action' => 'candidadosAVaga', 'id' => $vaga['Vaga']['id']), array('class' => 'btn btn-xs btn-info', 'title' => 'Candidatos vaga '. $vaga['Vaga']['nome'])); ?>
                                    &nbsp;
                                    <?php
                                        if($vaga['Vaga']['ativo'] == 1){
                                            echo $this->Html->link('Excluir', array('controller' => 'empresas', 'action' => 'excluirVaga', 'id' => $vaga['Vaga']['id']), array('class' => 'btn btn-xs btn-danger', 'title' => 'Excluir vaga '. $vaga['Vaga']['nome']));
                                        } else {
                                            echo $this->Html->link('Ativar', array('controller' => 'empresas', 'action' => 'ativarVaga', 'id' => $vaga['Vaga']['id']), array('class' => 'btn btn-xs btn-success', 'title' => 'Ativar vaga '. $vaga['Vaga']['nome']));
                                        }
                                    ?>
                                </div>
                            </footer>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>

            <div class="row">
                <div class="col-xs-12 text-center">
                  <ul class="pagination">
                    <?php
                        $this->Paginator->options['url'] = array('controller' => 'empresas', 'action' => 'listarVagas');
                        echo $this->Paginator->prev(__('« Anterior'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                        echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                        echo $this->Paginator->next(__('Próximo »'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                    ?>
                  </ul>
                </div>
            </div>
        </div>
    </section>
</main>