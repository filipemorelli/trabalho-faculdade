<header class="page-header bg-img size-lg">
    <div class="container no-shadow">
        <h1 class="text-center">Histórico de Vagas</h1>
        <p class="lead text-center">Aqui está a lista de candidaturas das vagas de trabalho.</p>
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
                        echo $this->Paginator->counter('Encontramos <strong>{:count}</strong> de vagas, você está vendo página - <i>{:page}</i> de <i>{:pages}</i>');
                        ?>
                    </h5>
                </div>
                <div class="col-xs-12 col-sm-4 text-right">
                    <br>
                    <?php echo $this->Html->link('<i class="fa fa-search"></i> Procurar Vagas', array(
                        'controller' => 'users',
                        'action'     => 'vagas'
                    ), array(
                        'class'  => 'btn btn-success btn-sm',
                        'title'  => 'Mais Vagas',
                        'escape' => false
                    )); ?>
                </div>
            </div>

            <div class="row">
                <?php
                foreach ($vagas as $vaga) {
                    ?>
                    <div class="col-xs-12">
                        <div class="item-block<?php echo $vaga['Vaga']['ativo'] == 0 ? ' item-removed' : ''; ?>">
                            <header>
                                <a href="<?php echo $this->Html->url(array(
                                    'controller' => 'users',
                                    'action'     => 'vaga',
                                    'id'         => $vaga['Vaga']['id']
                                )); ?>">
                                    <?php
                                    if ($vaga['Vaga']['url_imagem'] != "") {
                                        echo $this->Html->image('/upload/img/vaga/' . $vaga['Vaga']['url_imagem'], array(
                                            'alt'   => $vaga['Vaga']['nome'] . " - " . $vaga['Empresa']['nome'],
                                            'title' => $vaga['Vaga']['nome'] . " - " . $vaga['Empresa']['nome']
                                        ));
                                    }
                                    else {
                                        echo $this->Html->image('/template/img/logo.png', array(
                                            'alt'   => $vaga['Vaga']['nome'] . " - " . $vaga['Empresa']['nome'],
                                            'title' => $vaga['Vaga']['nome'] . " - " . $vaga['Empresa']['nome']
                                        ));
                                    }
                                    ?>
                                </a>
                                <div class="hgroup">
                                    <h4><a href="<?php echo $this->Html->url(array(
                                            'controller' => 'users',
                                            'action'     => 'vaga',
                                            'id'         => $vaga['Vaga']['id']
                                        )); ?>"><?php echo $vaga['Vaga']['nome']; ?></a></h4>
                                    <h5><a href="<?php echo $this->Html->url(array(
                                            'controller' => 'users',
                                            'action'     => 'vaga',
                                            'id'         => $vaga['Vaga']['id']
                                        )); ?>"><?php echo $vaga['Empresa']['nome']; ?></a></h5></div>
                                <div class="header-meta"><span
                                            class="location"><?php echo $vaga['Endereco']['cidade'] . ', ' . $vaga['Endereco']['estado']; ?></span>
                                    <time datetime="<?php echo $vaga['Vaga']['modified']; ?>"><?php echo ucfirst($this->Tradutortempo->tempoPtBr($this->Time->timeAgoInWords($vaga['Vaga']['modified']))); ?></time>
                                </div>
                            </header>
                            <footer>
                                <?php
                                $classCss = '';
                                $status = '';
                                switch ($vaga['Vaga']['status']) {
                                    case '0':
                                        $classCss = 'success';
                                        $status = "Andamento";
                                        break;
                                    case '1':
                                        $classCss = 'warning';
                                        $status = "Análise de Currículos";
                                        break;
                                    case '2':
                                        $classCss = 'danger';
                                        $status = "Encerrado";
                                        break;
                                }
                                ?>
                                <div class="label-mobile">
                                    <span class="label label-<?php echo $classCss; ?>"><?php echo $status; ?></span>
                                </div>
                                <div class="action-btn">
                                    <?php echo $this->Html->link('Visualizar Vaga', array(
                                        'controller' => 'users',
                                        'action'     => 'vaga',
                                        'id'         => $vaga['Vaga']['id']
                                    ), array(
                                        'class' => 'btn btn-xs btn-info',
                                        'title' => 'Editar vaga ' . $vaga['Vaga']['nome']
                                    )) ?>
                                    &nbsp;
                                    <?php
                                    if ($vaga['Vaga']['ativo'] == 1 && $vaga['Vaga']['status'] != 3) {
                                        echo $this->Html->link('Cancelar candidatura', array(
                                            'controller' => 'empresas',
                                            'action'     => 'excluirVaga',
                                            'id'         => $vaga['Vaga']['id']
                                        ), array(
                                            'class' => 'btn btn-xs btn-danger',
                                            'title' => 'Excluir vaga ' . $vaga['Vaga']['nome']
                                        ));
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
                        $this->Paginator->options['url'] = array(
                            'controller' => 'trabalhador_vaga',
                            'action'     => 'historicoCandidaturas'
                        );
                        echo $this->Paginator->prev(__('« Anterior'), array('tag' => 'li'), null, array(
                            'tag'         => 'li',
                            'class'       => 'disabled',
                            'disabledTag' => 'a'
                        ));
                        echo $this->Paginator->numbers(array(
                            'separator'    => '',
                            'currentTag'   => 'a',
                            'currentClass' => 'active',
                            'tag'          => 'li',
                            'first'        => 1
                        ));
                        echo $this->Paginator->next(__('Próximo »'), array('tag' => 'li'), null, array(
                            'tag'         => 'li',
                            'class'       => 'disabled',
                            'disabledTag' => 'a'
                        ));
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>