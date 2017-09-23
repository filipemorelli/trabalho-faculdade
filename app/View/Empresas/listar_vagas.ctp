<header class="page-header bg-img size-lg page-vaga">
    <div class="container no-shadow">
        <h1 class="text-center">Nossas Vagas</h1>
        <p class="lead text-center">Aqui está a lista de suas vagas de trabalho. Você pode editá-los ou excluí-los.</p>
    </div>
</header>
<main>
    <section class="bg-alt">
        <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <br />
                    <h5>
                        <?php
                        echo $this->Paginator->counter('Encontramos <strong>{:count}</strong> de vagas, você está vendo página - <i>{:page}</i> de <i>{:pages}</i>');
                        ?>
                    </h5>
                </div>
            </div>


            <div class="row">

                <div class="col-md-4">

                    <?php
                    echo $this->Form->create('Users', array(
                        'method' => 'get',
                        "style" => "margin-top: 30px"
                    ));
                    ?>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <?php
                            echo $this->Form->input("cargo", array(
                                'label' => array(
                                    'text' => 'Cargo, Habilidades, etc.',
                                    'class' => 'vaga-cargo'
                                ),
                                'div' => false,
                                'class' => 'form-control',
                                'placeholder' => 'Cargo, Habilidades, etc.',
                                'error' => array(
                                    'attributes' => array(
                                        'wrap' => 'span',
                                        'class' => 'text-danger'
                                    )
                                ),
                            ));
                            ?>
                        </div>

                        <div class="form-group col-xs-12">
                            <?php
                            echo $this->Form->input('endereco', array(
                                'class' => 'form-control endereco-rapido',
                                'placeholder' => 'Cidade, estado ou CEP',
                                // 'required' => true,
                                'label' => array(
                                    'text' => 'Endereço',
                                    'class' => 'vaga-estado'
                                ),
                                'div' => false
                            ));
                            echo $this->Form->input('cidade', array(
                                'class' => 'cidade',
                                // 'required' => true,
                                'type' => 'hidden',
                            ));
                            echo $this->Form->input('estado', array(
                                'class' => 'estado',
                                // 'required' => true,
                                'type' => 'hidden',
                            ));
                            ?>
                        </div>

                        <div class="form-group col-xs-12">
                            <?php
                            echo $this->Form->input('salario', array(
                                'class' => 'form-control',
                                'placeholder' => 'Salário',
                                // 'required' => true,
                                'label' => array(
                                    'text' => 'Salário',
                                    'class' => 'vaga-estado'
                                ),
                                'type' => 'number',
                                'default' => '0.00',
                                'step' => '0.01',
                                'min' => '0.00',
                                'div' => false,
                                'before' => '<div class="input-group input-group-sm"><span class="input-group-addon">R$</span>',
                                'after' => $this->Form->input('salario-operador', array(
                                    "class" => "btn btn-info",
                                    'type' => 'select',
                                    'label' => false,
                                    'div' => false,
                                    'before' => '<span class="input-group-btn">',
                                    'after' => '</span>',
                                    'options' => array(
                                        '>=' => 'Maior ou Igual',
                                        '=' => 'Igual',
                                        '<=' => 'Menor ou Igual',
                                    )
                                )) . '</div>',
                                'error' => array(
                                    'attributes' => array(
                                        'wrap' => 'span',
                                        'class' => 'text-danger'
                                    )
                                ),
                                'format' => array(
                                    'label',
                                    'before',
                                    'input',
                                    'between',
                                    'after',
                                    'error'
                                )
                            ));
                            ?>
                        </div>

                        <div class="form-group col-xs-12">
                            <?php
                            echo $this->Form->input('escolaridade', array(
                                'label' => array(
                                    'text' => 'Escolaridade',
                                    'class' => 'vaga-escolaridade'
                                ),
                                // 'required' => true,
                                'class' => 'form-control selectpicker',
                                'title' => 'selecione a escolaridade',
                                'default' => '0',
                                'options' => array(
                                    '0' => 'Indiferente',
                                    '1' => 'Ensino Fundamental incompleto',
                                    '2' => 'Ensino Fundamental cursando',
                                    '3' => 'Ensino Fundamental completo',
                                    '4' => 'Ensino Médio incompleto',
                                    '5' => 'Ensino Médio cursando',
                                    '6' => 'Ensino Médio completo',
                                    '7' => 'Ensino Médio completo Profissionalizante cursando',
                                    '8' => 'Ensino Médio completo Profissionalizante completo',
                                    '9' => 'Ensino Superior incompleto',
                                    '10' => 'Ensino Superior cursando',
                                    '11' => 'Ensino Superior completo',
                                    '12' => 'Pos-graduação',
                                    '13' => 'Mestrado',
                                    '14' => 'Doutorado',
                                    '15' => 'Ph.D.',
                                ),
                                'error' => array(
                                    'attributes' => array(
                                        'wrap' => 'span',
                                        'class' => 'text-danger'
                                    )
                                ),
                            ));
                            ?>
                        </div>

                        <div class="form-group col-xs-12">
                            <?php
                            echo $this->Form->input('periodo_trabalho', array(
                                'label' => array(
                                    'text' => 'Jornada de Trabalho',
                                    'class' => 'vaga-tipo'
                                ),
                                // 'required' => true,
                                'class' => 'form-control selectpicker',
                                'options' => array(
                                    'integral' => 'Tempo Integral',
                                    'meio-horário' => 'Meio Horario',
                                    'diaria' => 'Diaria',
                                    'estagio' => 'Estágio',
                                    'frelancer' => 'Freelancer',
                                    'remoto' => 'Remoto',
                                    'outro' => 'Outro'
                                ),
                                'empty' => 'Jornada de Trabalho',
                                'error' => array(
                                    'attributes' => array(
                                        'wrap' => 'span',
                                        'class' => 'text-danger'
                                    )
                                ),
                            ));
                            ?>
                        </div>

                        <div class="form-group col-xs-12">
                            <?php
                            echo $this->Form->input('tempo_vaga', array(
                                'label' => array(
                                    'text' => 'Tempo da vaga',
                                    'class' => 'vaga-horas'
                                ),
                                // 'required' => true,
                                'class' => 'form-control selectpicker',
                                'type' => 'select',
                                'options' => array(
                                    'hoje' => 'Hoje',
                                    '3 dias' => 'até 3 dias',
                                    '1 semana' => 'até 1 semana',
                                    '2 semanas' => 'até 2 semana',
                                    '3 semanas' => 'até 3 semana',
                                    '1 mes' => 'até 1 mês',
                                    '2 meses' => 'até 2 mês',
                                    '3 meses' => 'até 3 mês',
                                    '6 meses' => 'até 6 mês',
                                    'todas' => 'Todo o tempo'
                                ),
                                'title' => 'Tempo da vaga',
                                'error' => array(
                                    'attributes' => array(
                                        'wrap' => 'span',
                                        'class' => 'text-danger'
                                    )
                                ),
                            ));
                            ?>
                        </div>

                        <div class="form-group col-xs-12">
                            <?php
                            echo $this->Form->input('horas', array(
                                'label' => array(
                                    'text' => 'Horas Semanais',
                                    'class' => 'vaga-horas'
                                ),
                                // 'required' => true,
                                'multiple' => 'checkbox',
                                'type' => 'select',
                                'options' => $horasSemanais,
                                'title' => 'Horas Semanais',
                                'error' => array(
                                    'attributes' => array(
                                        'wrap' => 'span',
                                        'class' => 'text-danger'
                                    )
                                ),
                            ));
                            ?>
                        </div>

                        <div class="form-group col-xs-12">
                            <?php
                            echo $this->Form->input('status', array(
                                'label' => array(
                                    'text' => 'Andamento da vaga',
                                    'class' => 'vaga-horas'
                                ),
                                // 'required' => true,
                                'multiple' => 'checkbox',
                                'type' => 'select',
                                'options' => array(
                                    0 => 'Em Andamento',
                                    1 => 'Analise de curriculo',
                                    2 => 'Encerrado'
                                ),
                                'title' => 'Horas Semanais',
                                'error' => array(
                                    'attributes' => array(
                                        'wrap' => 'span',
                                        'class' => 'text-danger'
                                    )
                                ),
                            ));
                            ?>
                        </div>

                    </div>

                    <div class="button-group">
                        <div class="action-buttons">
                            <button class="btn btn-primary btn-block">Aplicar Filtros</button>
                        </div>
                    </div>

                    </form>
                </div>

                <div class="col-md-8">
                    <div class="row">

                        <?php
                        foreach ($vagas as $vaga) {
                            ?>
                            <div class="col-xs-12">
                                <div class="item-block<?php echo $vaga['Vaga']['ativo'] == 0 ? ' item-removed' : ''; ?>">
                                    <header>
                                        <a href="<?php
                                        echo $this->Html->url(array(
                                            'controller' => 'empresas',
                                            'action' => 'detalhesVaga',
                                            'titulo' => $this->UrlControl->parseSlug($vaga['Vaga']['nome']),
                                            'id' => $vaga['Vaga']['id']
                                        ));
                                        ?>">
                                               <?php
                                               if ($vaga['Vaga']['url_imagem'] != "") {
                                                   echo $this->Html->image('/upload/img/vaga/' . $vaga['Vaga']['url_imagem'], array(
                                                       'alt' => $vaga['Vaga']['nome'] . " - " . $vaga['Empresa']['nome'],
                                                       'title' => $vaga['Vaga']['nome'] . " - " . $vaga['Empresa']['nome']
                                                   ));
                                               } else {
                                                   echo $this->Html->image('/template/img/logo.png', array(
                                                       'alt' => $vaga['Vaga']['nome'] . " - " . $vaga['Empresa']['nome'],
                                                       'title' => $vaga['Vaga']['nome'] . " - " . $vaga['Empresa']['nome']
                                                   ));
                                               }
                                               ?>
                                        </a>
                                        <div class="hgroup">
                                            <h4><a href="<?php
                                                echo $this->Html->url(array(
                                                    'controller' => 'empresas',
                                                    'action' => 'detalhesVaga',
                                                    'id' => $vaga['Vaga']['id'],
                                                    'titulo' => $this->UrlControl->parseSlug($vaga['Vaga']['nome']),
                                                ));
                                                ?>"><?php echo $vaga['Vaga']['nome']; ?></a></h4>
                                            <h5><a href="<?php
                                                echo $this->Html->url(array(
                                                    'controller' => 'empresas',
                                                    'action' => 'detalhesVaga',
                                                    'id' => $vaga['Vaga']['id'],
                                                    'titulo' => $this->UrlControl->parseSlug($vaga['Vaga']['nome']),
                                                ));
                                                ?>"><?php echo $vaga['Empresa']['nome']; ?></a></h5></div>
                                        <div class="header-meta">
                                            <span class="location"><?php echo $vaga['Endereco']['cidade'] . ', ' . $vaga['Endereco']['estado']; ?></span>
                                            <time datetime="<?php echo $vaga['Vaga']['modified']; ?>"><?php echo ucfirst($this->Tradutortempo->tempoPtBr($this->Time->timeAgoInWords($vaga['Vaga']['modified']))); ?></time>
                                        </div>
                                    </header>    
                                    
                                    <div class="item-body">
                                        <p><?php echo $vaga['Vaga']['descricao_rapida']; ?></p>
                                    </div>

                                    <footer>
                                        <?php
                                        $infoStatus = $this->Utility->getStatusVaga($vaga['Vaga']['status']);
                                        ?>
                                        <span class="label label-<?php echo $infoStatus['class']; ?>"><?php echo $infoStatus['status']; ?></span>
                                        <div class="action-btn">
                                            <?php
                                            echo $this->Html->link('Editar', array(
                                                'controller' => 'empresas',
                                                'action' => 'editarVaga',
                                                'id' => $vaga['Vaga']['id']
                                                    ), array(
                                                'class' => 'btn btn-xs btn-gray',
                                                'title' => 'Editar vaga ' . $vaga['Vaga']['nome'],
                                                'target' => '_blank'
                                            ))
                                            ?>
                                            &nbsp;
                                            <?php
                                            echo $this->Html->link('Candidatos', array(
                                                'controller' => 'empresas',
                                                'action' => 'candidadosAVaga',
                                                'id' => $vaga['Vaga']['id']
                                                    ), array(
                                                'class' => 'btn btn-xs btn-info',
                                                'title' => 'Candidatos vaga ' . $vaga['Vaga']['nome'],
                                                'target' => '_blank'
                                            ));
                                            ?>
                                            &nbsp;
                                            <?php
                                            if ($vaga['Vaga']['ativo'] == 1) {
                                                echo $this->Html->link('Excluir', array(
                                                    'controller' => 'empresas',
                                                    'action' => 'excluirVaga',
                                                    'id' => $vaga['Vaga']['id']
                                                        ), array(
                                                    'class' => 'btn btn-xs btn-danger',
                                                    'title' => 'Excluir vaga ' . $vaga['Vaga']['nome']
                                                ));
                                            } else {
                                                echo $this->Html->link('Ativar', array(
                                                    'controller' => 'empresas',
                                                    'action' => 'ativarVaga',
                                                    'id' => $vaga['Vaga']['id']
                                                        ), array(
                                                    'class' => 'btn btn-xs btn-success',
                                                    'title' => 'Ativar vaga ' . $vaga['Vaga']['nome']
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
                                    'controller' => 'empresas',
                                    'action' => 'listarVagas'
                                );
                                echo $this->Paginator->prev(__('« Anterior'), array(
                                    'tag' => 'li'
                                        ), null, array(
                                    'tag' => 'li',
                                    'class' => 'disabled',
                                    'disabledTag' => 'a'
                                ));
                                echo $this->Paginator->numbers(array(
                                    'separator' => '',
                                    'currentTag' => 'a',
                                    'currentClass' => 'active',
                                    'tag' => 'li',
                                    'first' => 1
                                ));
                                echo $this->Paginator->next(__('Próximo »'), array(
                                    'tag' => 'li'
                                        ), null, array(
                                    'tag' => 'li',
                                    'class' => 'disabled',
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