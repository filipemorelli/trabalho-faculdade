    <!-- Page header -->
    <header class="page-header bg-img" style="background-image: url(<?php echo $this->Html->url('/template/img/bg-banner1.jpg'); ?>)">
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

                <form style="margin-top: 30px" action="#">
                  <div class="row">
                    <div class="form-group col-xs-12">
                      <input type="text" class="form-control" placeholder="Keyword: job title, skills, or company">
                    </div>

                    <div class="form-group col-xs-12">
                      <input type="text" class="form-control" placeholder="Location: city, state or zip">
                    </div>

                    <div class="form-group col-xs-12">
                      <select class="form-control selectpicker" multiple="">
                        <option selected="">All categories</option>
                        <option>Developer</option>
                        <option>Designer</option>
                        <option>Customer service</option>
                        <option>Finance</option>
                        <option>Healthcare</option>
                        <option>Sale</option>
                        <option>Marketing</option>
                        <option>Information technology</option>
                        <option>Others</option>
                      </select>
                    </div>


                    <div class="form-group col-xs-12">
                      <h6>Contract</h6>
                      <div class="checkall-group">
                        <div class="checkbox">
                          <input type="checkbox" id="contract1" name="contract" checked="">
                          <label for="contract1">All types</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="contract2" name="contract">
                          <label for="contract2">Full-time <small>(354)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="contract3" name="contract">
                          <label for="contract3">Part-time <small>(284)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="contract4" name="contract">
                          <label for="contract4">Internship <small>(169)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="contract5" name="contract">
                          <label for="contract5">Freelance <small>(480)</small></label>
                        </div>
                      </div>
                    </div>


                    <div class="form-group col-xs-12">
                      <h6>Hourly rate</h6>
                      <div class="checkall-group">
                        <div class="checkbox">
                          <input type="checkbox" id="rate1" name="rate" checked="">
                          <label for="rate1">All rates</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="rate2" name="rate">
                          <label for="rate2">$0 - $50 <small>(364)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="rate3" name="rate">
                          <label for="rate3">$50 - $100 <small>(684)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="rate4" name="rate">
                          <label for="rate4">$100 - $200 <small>(195)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="rate5" name="rate">
                          <label for="rate5">$200+ <small>(39)</small></label>
                        </div>
                      </div>
                    </div>


                    <div class="form-group col-xs-12">
                      <h6>Academic degree</h6>
                      <div class="checkall-group">
                        <div class="checkbox">
                          <input type="checkbox" id="degree1" name="degree" checked="">
                          <label for="degree1">All degrees</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="degree2" name="degree">
                          <label for="degree2">Associate degree <small>(216)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="degree3" name="degree">
                          <label for="degree3">Bachelor's degree <small>(569)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="degree4" name="degree">
                          <label for="degree4">Master's degree <small>(439)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="degree5" name="degree">
                          <label for="degree5">Doctoral degree <small>(84)</small></label>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="button-group">
                    <div class="action-buttons">
                      <button class="btn btn-primary">Apply filter</button>
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
                            <span><?php echo $vaga['Vaga']['experiencia']; ?></span>
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