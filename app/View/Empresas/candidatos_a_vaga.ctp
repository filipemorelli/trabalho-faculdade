<header class ="page-header bg-img size-lg"
        style="background-image: url(<?php echo $this->Html->url('/template/img/bg-banner1.jpg'); ?>)">
    <div class="container page-name">
        <h1 class="text-center">Candidatos à Vaga</h1>
        <?php /* <p class="lead text-center">Use following search box to find best candidates for your openning position</p> */ ?>
    </div>
    <div class="container">
        <a class="item-block item-block-flat" href="<?php
        echo $this->Html->url(array(
            'controller' => 'empresas',
            'action'     => 'detalhesVaga',
            'titulo'     => $this->UrlControl->parseSlug($vaga['Vaga']['nome']),
            'id'         => $vaga['Vaga']['id']
        ));
        ?>">
            <header>
                <?php
                if ($vaga['Vaga']['url_imagem'] != "") {
                    echo $this->Html->image('/upload/img/vaga/' . $vaga['Vaga']['url_imagem'], array(
                        'alt'   => $vaga['Vaga']['nome'] . " - " . $vaga['Empresa']['nome'],
                        'title' => $vaga['Vaga']['nome'] . " - " . $vaga['Empresa']['nome']
                    ));
                } else {
                    echo $this->Html->image('/template/img/logo.png', array(
                        'alt'   => $vaga['Vaga']['nome'] . " - " . $vaga['Empresa']['nome'],
                        'title' => $vaga['Vaga']['nome'] . " - " . $vaga['Empresa']['nome']
                    ));
                }
                ?>
                <div class="hgroup">
                    <h4><?php echo $vaga['Vaga']['nome'] ?></h4>
                    <h5><?php echo $vaga['Empresa']['nome'] ?></h5>
                </div>
                <div class="header-meta"><span class="location"><?php echo $vaga['Endereco']['bairro'] . " - " . $vaga['Endereco']['cidade'] . ", " . $vaga['Endereco']['estado'] ?></span> <span class="label label-success"><?php echo $vaga['Vaga']['periodo_trabalho']; ?></span>
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
                <div class="col-xs-12">
                    <h5>
                        <?php
                        echo $this->Paginator->counter('Encontramos <strong>{:count}</strong> candidatos, você está vendo página - <i>{:page}</i> de <i>{:pages}</i>');
                        ?>
                    </h5>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">

                    <?php
                    echo $this->Form->create('Users', array(
                        'method' => 'get',
                        "style"  => "margin-top: 30px"
                    ));
                    ?>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <?php
                            echo $this->Form->input("geral", array(
                                'label'       => array(
                                    'text' => 'Busca Geral'
                                ),
                                'div'         => false,
                                'class'       => 'form-control',
                                'placeholder' => 'Cargo, Habilidades, etc.',
                                'error'       => array(
                                    'attributes' => array(
                                        'wrap'  => 'span',
                                        'class' => 'text-danger'
                                    )
                                ),
                            ));
                            ?>
                        </div>

                        <div class="form-group col-xs-12">
                            <?php
                            echo $this->Form->input('endereco', array(
                                'class'       => 'form-control endereco-rapido',
                                'placeholder' => 'Cidade, estado ou CEP',
                                // 'required' => true,
                                'label'       => array(
                                    'text'  => 'Endereço',
                                    'class' => 'vaga-estado'
                                ),
                                'div'         => false
                            ));
                            echo $this->Form->input('cidade', array(
                                'class' => 'cidade',
                                // 'required' => true,
                                'type'  => 'hidden',
                            ));
                            echo $this->Form->input('estado', array(
                                'class' => 'estado',
                                // 'required' => true,
                                'type'  => 'hidden',
                            ));
                            ?>
                        </div>

                        <div class="form-group col-xs-12">
                            <?php
                            echo $this->Form->input('escolaridade', array(
                                'label'   => array(
                                    'text'  => 'Escolaridade',
                                    'class' => 'vaga-escolaridade'
                                ),
                                // 'required' => true,
                                'class'   => 'form-control selectpicker',
                                'title'   => 'selecione a escolaridade',
                                'default' => '0',
                                'options' => array(
                                    '0'  => 'Indiferente',
                                    '1'  => 'Ensino Fundamental incompleto',
                                    '2'  => 'Ensino Fundamental cursando',
                                    '3'  => 'Ensino Fundamental completo',
                                    '4'  => 'Ensino Médio incompleto',
                                    '5'  => 'Ensino Médio cursando',
                                    '6'  => 'Ensino Médio completo',
                                    '7'  => 'Ensino Médio completo Profissionalizante cursando',
                                    '8'  => 'Ensino Médio completo Profissionalizante completo',
                                    '9'  => 'Ensino Superior incompleto',
                                    '10' => 'Ensino Superior cursando',
                                    '11' => 'Ensino Superior completo',
                                    '12' => 'Pos-graduação',
                                    '13' => 'Mestrado',
                                    '14' => 'Doutorado',
                                    '15' => 'Ph.D.',
                                ),
                                'error'   => array(
                                    'attributes' => array(
                                        'wrap'  => 'span',
                                        'class' => 'text-danger'
                                    )
                                ),
                            ));
                            ?>
                        </div>

                    </div>

                    <div class="button-group">
                        <div class="action-buttons">
                            <button class="btn btn-primary btn-block" type="submit">Aplicar Filtros</button>
                        </div>
                    </div>

                    </form>
                </div>

                <div class="col-md-8">

                    <div class="row">
                        <?php
                        foreach ($trabalhadores as $trabalhador) {
                            ?>
                            <div class="col-xs-12">
                                <div class="item-block">
                                    <header>                            
                                        <a href="<?php echo $this->Html->url(array('controller' => 'empresas', 'action' => 'candidatoPerfil', 'idTrabalhador' => $trabalhador['Trabalhador']['id'], 'nomeTrabalhador' => $this->UrlControl->parseSlug($trabalhador['Trabalhador']['nome']), 'idVaga' => $vaga['Vaga']['id'], 'nomeVaga' => $this->UrlControl->parseSlug($vaga['Vaga']['nome']))); ?>">
                                            <?php
                                            if ($trabalhador['Trabalhador']['url_imagem'] != "") {
                                                echo $this->Html->image('/upload/img/vaga/' . $trabalhador['Trabalhador']['url_imagem'], array(
                                                    'alt'   => $trabalhador['Trabalhador']['nome'],
                                                    'title' => $trabalhador['Trabalhador']['nome']
                                                ));
                                            } else {
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
                                                    'controller'      => 'empresas',
                                                    'action'          => 'candidatoPerfil',
                                                    'idTrabalhador'   => $trabalhador['Trabalhador']['id'],
                                                    'nomeTrabalhador' => $this->UrlControl->parseSlug($trabalhador['Trabalhador']['nome']),
                                                    'idVaga'          => $vaga['Vaga']['id'],
                                                    'nomeVaga'        => $this->UrlControl->parseSlug($vaga['Vaga']['nome'])
                                                ));
                                                ?>
                                            </h4>
                                            <h5><?php echo $trabalhador['Trabalhador']['profissao']; ?></h5></div>
                                        <div class="header-meta">
                                            <span class="location"><?php echo $this->Utility->enderecoToLinkGoogleMaps($trabalhador['Endereco']); ?></span>
                                            <div><i class="fa fa-envelope"></i> <?php echo $this->Text->autoLinkEmails($trabalhador['Trabalhador']['email'], array('target' => '_blank')); ?></div>
                                            <div><i class="fa fa-phone"></i> <?php echo $trabalhador['Trabalhador']['telefone']; ?></div>
                                        </div>
                                    </header>
                                    <footer>
                                        <?php /* <div class="status"><strong>Candidatado em:</strong><?php echo ucfirst($this->Tradutortempo->tempoPtBr($this->Time->timeAgoInWords($trabalhador['TrabalhadorVaga']['modified']))); ?></div> */ ?>
                                        <div class="action-btn">
                                            <?php
                                            echo $this->Html->link('Visualizar Perfil', array(
                                                'controller'      => 'empresas',
                                                'action'          => 'candidatoPerfil',
                                                'nomeTrabalhador' => $this->UrlControl->parseSlug($trabalhador['Trabalhador']['nome']),
                                                'idTrabalhador'   => $trabalhador['Trabalhador']['id'],
                                                'nomeVaga'        => $this->UrlControl->parseSlug($vaga['Vaga']['nome']),
                                                'idVaga'          => $vaga['Vaga']['id'],
                                                    ), array(
                                                'class' => 'btn btn-xs btn-info',
                                                'title' => 'Visualizar Perfil ' . $trabalhador['Trabalhador']['nome']
                                            ))
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
                                    'controller' => 'empresas',
                                    'action'     => 'candidatosAVaga',
                                    'id'         => $vaga['Vaga']['id']
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
            </div>
        </div>
    </section>
</main>