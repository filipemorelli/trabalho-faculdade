    <!-- Page header -->
    <header class="page-header page-vaga bg-img" style="background-image: url(<?php echo $this->Html->url('/template/img/bg-banner1.jpg'); ?>)">
      <div class="container page-name">
        <h1 class="text-center">Pesquisar Vagas</h1>
        <p class="lead text-center">Use o filtro de pesquisa para encontrar trabalhos que melhor se adaptem a você.</p>
      </div>
    </header>
    <!-- END Page header -->


    <!-- Main container -->
    <main>
      <section class="no-padding-top bg-alt">
        <div class="container">
          <div class="row">

            <div class="col-xs-12">
              <br>
              <h5>
              <?php
                  echo $this->Paginator->counter(
                      'Encontramos <strong>{:count}</strong> de vagas, você está vendo página - <i>{:page}</i> de <i>{:pages}</i>'
                  );
              ?>
              </h5>
            </div>


            <div class="col-md-4">

                <?php
                    echo $this->Form->create('Users', array('method' => 'get', "style" => "margin-top: 30px"));
                ?>
                  <div class="row">
                    <div class="form-group col-xs-12">
                      <?php 
                        echo $this->Form->input("cargo", array(
                            'label' => array('text' => 'Cargo, Habilidades, etc.', 'class' => 'vaga-cargo'),
                            'div' => false,
                            'class' => 'form-control',
                            'placeholder' => 'Cargo, Habilidades, etc.',
                            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'text-danger')),
                        ));
                      ?>
                    </div>

                    <div class="form-group col-xs-12">
                        <?php
                            echo $this->Form->input('endereco', array(
                                'class' => 'form-control endereco-rapido',
                                'placeholder' => 'Cidade, estado ou CEP',
                                'required' => true,
                                'label' => array('text' => 'Endereço', 'class' => 'vaga-estado'),
                                'div' => false
                            ));
                            echo $this->Form->input('cidade', array(
                                'class' => 'cidade',
                                'required' => true,
                                'type' => 'hidden',
                            ));
                            echo $this->Form->input('estado', array(
                                'class' => 'estado',
                                'required' => true,
                                'type' => 'hidden',
                            ));
                        ?>
                    </div>

                    <div class="form-group col-xs-12">
                        <?php
                            echo $this->Form->input('salario', array(
                                'class' => 'form-control',
                                'placeholder' => 'Salário',
                                'required' => true,
                                'label' => array('text' => 'Salário', 'class' => 'vaga-estado'),
                                'type' => 'number',
                                'default' => '0.00',
                                'step' => '0.01',
                                'min' => '0.00',
                                'div' => false,
                                'before' => '<div class="input-group input-group-sm"><span class="input-group-addon">R$</span>',
                                'after' => '</div>',
                                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'text-danger')),
                                'format' => array('label', 'before', 'input', 'between', 'after', 'error')
                            ));
                        ?>
                    </div>

                    <div class="form-group col-xs-12">
                        <?php
                            echo $this->Form->input('escolaridade', array(
                                'label' => array('text' => 'Escolaridade', 'class' => 'vaga-escolaridade'),
                                'required' => true,
                                'class' => 'form-control selectpicker',
                                'title' => 'selecione a escolaridade',
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
                                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'text-danger')),
                            ));
                        ?>
                    </div>

                    <div class="form-group col-xs-12">
                        <?php
                            echo $this->Form->input('periodo_trabalho', array(
                                'label' => array('text' => 'Jornada de Trabalho', 'class' => 'vaga-tipo'),
                                'required' => true,
                                'class' => 'form-control selectpicker',
                                'options' => array(
                                    'integral' => 'Tempo Integral',
                                    'meio-horário' => 'Meio Horario',
                                    'diaria' => 'Diaria',
                                    'estagio' => 'Estágio',
                                    'frelancer' => 'Freelancer',
                                    'remoto' => 'Remote',
                                    'outro' => 'Outro'
                                ),
                                'empty' => 'Jornada de Trabalho',
                                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'text-danger')),
                            ));
                        ?>
                    </div>

                    <div class="form-group col-xs-12">
                        <?php
                            echo $this->Form->input('horas', array(
                                'label' => array('text' => 'Horas Semanais', 'class' => 'vaga-horas'),
                                'required' => true,
                                'multiple' => 'checkbox',
                                'type' => 'select',
                                'options' => $horasSemanais,
                                'title' => 'Horas Semanais',
                                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'text-danger')),
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
                  <!-- Job item -->
                  <div class="col-xs-12">
                    <a class="item-block" href="<?php echo $this->Html->url(array('controller' => 'empresas', 'action' => 'detalhesVaga', 'id' => $vaga['Vaga']['id'])); ?>">
                      <header>
                        <?php
                            if($vaga['Vaga']['url_imagem'] != ""){
                                echo $this->Html->image('/upload/img/vaga/'.$vaga['Vaga']['url_imagem'], array('alt' => $vaga['Vaga']['nome']." - ". $vaga['Empresa']['nome'], 'title' => $vaga['Vaga']['nome']." - ". $vaga['Empresa']['nome']));
                            } else{
                                echo $this->Html->image('/template/img/sem-imagem.png', array('alt' => $vaga['Vaga']['nome']." - ". $vaga['Empresa']['nome'], 'title' => $vaga['Vaga']['nome']." - ". $vaga['Empresa']['nome']));
                            }
                        ?>
                        <div class="hgroup">
                          <h4><?php echo ucfirst($vaga['Vaga']['nome']); ?></h4>
                          <h5><?php echo ucfirst($vaga['Empresa']['nome']); ?> <span class="label label-info"><?php echo $vaga['Vaga']['periodo_trabalho']?></span></h5>
                        </div>
                        <time datetime="<?php echo $vaga['Vaga']['modified']; ?>"><?php echo $this->Tradutortempo->tempoPtBr($this->Time->timeAgoInWords($vaga['Vaga']['modified'])); ?></time>
                      </header>

                      <div class="item-body">
                        <p><?php echo $vaga['Vaga']['descricao_rapida']; ?></p>
                      </div>

                      <footer>
                        <ul class="details cols-3">
                          <li>
                            <i class="fa fa-map-marker"></i>
                            <span><?php echo $vaga['Endereco']['cidade'] . ', '. $vaga['Endereco']['estado']; ?></span>
                          </li>

                          <li>
                            <i class="fa fa-money"></i>
                            <span>R$ <?php echo str_replace(".", ",", $vaga['Vaga']['salario']); ?></span>
                          </li>

                          <li>
                            <i class="fa fa-certificate"></i>
                            <span>Experiência: <?php echo $vaga['Vaga']['experiencia']; ?></span>
                          </li>
                        </ul>
                      </footer>
                    </a>
                  </div>
                  <!-- END Job item -->
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

          </div>

        </div>
      </section>
    </main>
    <!-- END Main container -->