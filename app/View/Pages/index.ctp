    <!-- Site header -->
    <header class="site-header size-lg text-center" style="background-image: url(<?php echo $this->Html->url('/template/img/bg-banner1.jpg');?>)">
      <div class="container">
        <div class="col-xs-12">
          <br><br>
          <h2>Nós oferecemos <mark><?php echo count($vagas);?></mark> vagas de emprego agora!</h2>
          <h5 class="font-alt">Encontre sua vaga em poucos minutos.</h5>
          <br><br><br>
          <?php
              echo $this->Form->create('Users', array('method' => 'get', 'class' => 'header-job-search', 'url' => array('controller' => 'users', 'action' => 'vagas')));
          ?>
            <div class="input-keyword">
              <?php
                  echo $this->Form->input('titulo', array(
                    'class' => 'form-control titulo-vagas-rapido',
                    'placeholder' => 'Cargo, Habilidades ou Empresa',
                    'required' => true,
                    'label' => false,
                    'div' => false
                  ));
              ?>
            </div>

            <div class="input-location">
              <?php
                  echo $this->Form->input('endereco', array(
                    'class' => 'form-control endereco-rapido',
                    'placeholder' => 'Cidade, estado ou CEP',
                    'required' => true,
                    'label' => false,
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

            <div class="btn-search">
              <button class="btn btn-primary" type="submit">Encontrar Vagas</button>
              <?php echo $this->Html->link('Pesquisa avançada', array('controller' => 'users', 'action' => 'vagas'), array('title' => 'Pesquisa avançada')); ?>
            </div>
          </form>
        </div>

      </div>
    </header>
    <!-- END Site header -->


    <!-- Main container -->
    <main>



      <!-- Recent jobs -->
      <section>
        <div class="container">
          <header class="section-header">
            <span>Vagas</span>
            <h2>Ultimas Vagas</h2>
          </header>

          <div class="row">

                <?php
                    foreach($vagas as $vaga){
                ?>

                  <div class="col-xs-12">
                    <a class="item-block" href="#">
                      <header>
                        <?php
                          if($vaga['Vaga']['url_imagem'] != ""){
                            echo $this->Html->image('/upload/img/vaga/'.$vaga['Vaga']['url_imagem'], array('alt' => $vaga['Vaga']['nome']." - ". $vaga['Empresa']['nome'], 'title' => $vaga['Vaga']['nome']." - ". $vaga['Empresa']['nome']));
                          } else{
                            echo $this->Html->image('/template/img/sem-imagem.png', array('alt' => $vaga['Vaga']['nome']." - ". $vaga['Empresa']['nome'], 'title' => $vaga['Vaga']['nome']." - ". $vaga['Empresa']['nome']));
                          }
                        ?>
                        <div class="hgroup">
                          <h4><?php echo $vaga['Vaga']['nome']; ?></h4>
                          <h5><?php echo $vaga['Empresa']['nome']; ?></h5>
                        </div>
                        <div class="header-meta">
                          <span class="location"><?php echo $vaga['Endereco']['cidade'] . ', '. $vaga['Endereco']['estado']; ?></span>
                          <time datetime="<?php echo $vaga['Vaga']['periodo_trabalho'] ?>"><?php echo $this->Tradutortempo->tempoPtBr($this->Time->timeAgoInWords($vaga['Vaga']['modified'])); ?></time>
                        </div>
                      </header>
                      <footer>
                        <div class="text-left">
                          <p class="status"><strong>Periodo de trabalho:</strong> <?php echo $vaga['Vaga']['periodo_trabalho']; ?></p>
                        </div>
                        <div class="text-right">
                          <?php
                            $classCss = '';
                            $status = '';
                            switch ($vaga['Vaga']['status']) {
                              case '0':
                                $classCss = 'info';
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
                          <span class="label label-<?php echo $classCss;?>"><?php echo $status; ?></span>
                        </div>
                      </footer>
                    </a>
                  </div>
                <?php
                    }
                ?>
          </div>

          <br><br>
          <p class="text-center">
            <?php echo $this->Html->link('Veja todas as vagas',array('controller' => 'users', 'action' => 'vagas'), array('title' => 'Veja todas as vagas', 'class' => 'btn btn-info'));?>
            <a class="" href="job-list.html"></a>
          </p>
        </div>
      </section>
      <!-- END Recent jobs -->

      <?php /*
      <section>
        <div class="container">

          <div class="col-sm-12 col-md-6 hidden-xs hidden-sm">
            <br>
            <?php echo $this->Html->image('/template/img/how-it-works.png', array('alt' => 'how it works', 'class' => 'center-block'));?>
          </div>

          <div class="col-sm-12 col-md-6">
            <header class="section-header text-left">
              <span>Workflow</span>
              <h2>How it works</h2>
            </header>

            <p class="lead">Pellentesque et pulvinar orci. Suspendisse sed euismod purus. Pellentesque nunc ex, ultrices eu enim non, consectetur interdum nisl. Nam congue interdum mauris, sed ultrices augue lacinia in. Praesent turpis purus, faucibus in tempor vel, dictum ac eros.</p>
            <p>Nulla quis felis et orci luctus semper sit amet id dui. Aenean ultricies lectus nunc, vel rhoncus odio sagittis eu. Sed at felis eu tortor mattis imperdiet et sed tortor. Nullam ac porttitor arcu. Vivamus tristique elit id tempor lacinia. Donec auctor at nibh eget tincidunt. Nulla facilisi. Nunc condimentum dictum mattis.</p>
            
            
            <br><br>
            <a class="btn btn-primary" href="page-typography.htm">Learn more</a>
          </div>

        </div>
      </section>
      */ ?>
      <!-- Newsletter -->
      <section class="bg-img text-center" style="background-image: url(<?php echo $this->Html->url('/template/img/bg-facts.jpg');?>)">
        <div class="container">
          <h2><strong>Subscribe</strong></h2>
          <h6 class="font-alt">Get weekly top new jobs delivered to your inbox</h6>
          <br><br>
          <form class="form-subscribe" action="#">
            <div class="input-group">
              <input type="text" class="form-control input-lg" placeholder="Your eamil address">
              <span class="input-group-btn">
                <button class="btn btn-success btn-lg" type="submit">Subscribe</button>
              </span>
            </div>
          </form>
        </div>
      </section>
      <!-- END Newsletter -->


    </main>
    <!-- END Main container -->