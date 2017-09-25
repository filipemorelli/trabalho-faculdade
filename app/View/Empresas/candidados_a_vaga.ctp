<header class="page-header bg-img size-lg"
        style="background-image: url(<?php echo $this->Html->url('/template/img/bg-banner1.jpg'); ?>)">
    <div class="container page-name">
        <h1 class="text-center">Candidatos à Vaga</h1>
        <?php /*<p class="lead text-center">Use following search box to find best candidates for your openning position</p> */ ?>
    </div>
    <div class="container">
        <a class="item-block item-block-flat" href="job-detail.htm">
            <header>
                <?php echo $this->Html->image('/template/img/logo-google.jpg', array('alt' => '')); ?>
                <div class="hgroup">
                    <h4>Senior front-end developer</h4>
                    <h5>Google</h5>
                </div>
                <div class="header-meta"><span class="location">Menlo park, CA</span> <span class="label label-success">Full-time</span>
                </div>
            </header>
        </a>
        <?php
        /*
        <hr>
        <h5>Search</h5>
        <form action="#">
            <div class="row">
                <div class="form-group col-xs-12 col-sm-4">
                    <input type="text" class="form-control" placeholder="Keyword"> </div>
                <div class="form-group col-xs-12 col-sm-4">
                    <select class="form-control selectpicker" multiple="">
                        <option selected="">All statuses
                            <option>New</option>
                            <option>Contacted</option>
                            <option>Interviewed</option>
                            <option>Hired</option>
                            <option>Archived</option>
                    </select>
                </div>
                <div class="form-group col-xs-12 col-sm-4">
                    <select class="form-control selectpicker">
                        <option selected="">Newest first</option>
                        <option>Oldest first</option>
                        <option>Low salary first</option>
                        <option>High salary first</option>
                        <option>Sort by name</option>
                    </select>
                </div>
            </div>
            <div class="button-group">
                <div class="action-buttons">
                    <button class="btn btn-success">Download CSV</button>
                    <button class="btn btn-primary">Apply filter</button>
                </div>
            </div>
        </form>
        */
        ?>
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
                        echo $this->Paginator->counter('Encontramos <strong>{:count}</strong> candidatos, você está vendo página - <i>{:page}</i> de <i>{:pages}</i>');
                        ?>
                    </h5>
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($trabalhadores as $trabalhador) {
                    ?>
                    <div class="col-xs-12">
                        <div class="item-block">
                            <header>                            
                                <a href="<?php echo $this->Html->url(array('controller' => 'users','action' => 'visualizarPerfil', 'id' => $trabalhador['Trabalhador']['id'],'nome' => $this->UrlControl->parseSlug($trabalhador['Trabalhador']['nome']))); ?>">
                                    <?php
                                    if ($trabalhador['Trabalhador']['url_imagem'] != "") {
                                        echo $this->Html->image('/upload/img/vaga/' . $trabalhador['Trabalhador']['url_imagem'], array(
                                            'alt'   => $trabalhador['Trabalhador']['nome'],
                                            'title' => $trabalhador['Trabalhador']['nome']
                                        ));
                                    }
                                    else {
                                        echo $this->Html->image('/template/img/logo.png', array(
                                            'alt'   => $trabalhador['Trabalhador']['nome'],
                                            'title' => $trabalhador['Trabalhador']['nome']
                                        ));
                                    }
                                    ?>
                                </a>
                                <div class="hgroup">
                                    <h4>
                                        <?php
                                            echo $this->Html->link($trabalhador['Trabalhador']['nome'], array(
                                                    'controller' => 'users',
                                                    'action'     => 'visualizarPerfil',
                                                    'id'         => $trabalhador['Trabalhador']['id'],
                                                    'nome'       => $this->UrlControl->parseSlug($trabalhador['Trabalhador']['nome'])
                                            ));
                                        ?>
                                    </h4>
                                    <h5><?php echo $trabalhador['Trabalhador']['profissao']; ?></h5></div>
                                <div class="header-meta">
                                    <span class="location"><?php echo $trabalhador['Endereco']['bairro'] . ', ' . $trabalhador['Endereco']['cidade'] . ', ' . $trabalhador['Endereco']['estado']; ?></span>
                                    <i class="fa fa-envelop-o"></i> <?php echo $this->Text->autoLinkEmails($trabalhador['Trabalhador']['email'], array('target' => '_blank')); ?>
                                </div>
                            </header>
                            <footer>
                                <?php /*<div class="status"><strong>Candidatado em:</strong><?php echo ucfirst($this->Tradutortempo->tempoPtBr($this->Time->timeAgoInWords($trabalhador['TrabalhadorVaga']['modified']))); ?></div> */ ?>
                                <div class="action-btn">
                                    <?php echo $this->Html->link('Visualizar Perfil', array(
                                        'controller' => 'users',
                                        'action'     => 'visualizarPerfil',
                                        'id'         => $trabalhador['Trabalhador']['id'],
                                        'nome'       => $this->UrlControl->parseSlug($trabalhador['Trabalhador']['nome'])
                                    ), array(
                                        'class' => 'btn btn-xs btn-info',
                                        'title' => 'Visualizar Perfil ' . $trabalhador['Trabalhador']['nome']
                                    )) ?>
                                    &nbsp;
                                    <a class="btn btn-xs btn-danger" href="#">Delete</a>
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
                            'controller' => 'empresas',
                            'action'     => 'candidadosAVaga',
                            'id'         => $vaga_id
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