    <!-- Site header -->
    <header class="site-header size-lg text-center" style="background-image: url(<?php echo $this->Html->url('/template/img/bg-banner1.jpg');?>)">
      <div class="container">
        <div class="col-xs-12">
          <br><br>
          <h2>Nós oferecemos <mark>1,259</mark> vagas de emprego agora!</h2>
          <h5 class="font-alt">Encontre sua vaga em poucos minutos.</h5>
          <br><br><br>
          <form class="header-job-search">
            <div class="input-keyword">
              <input type="text" class="form-control" placeholder="Cargo, Habilidades ou Empresa">
            </div>

            <div class="input-location">
              <input type="text" class="form-control" placeholder="Cidade, estado ou CEP">
            </div>

            <div class="btn-search">
              <button class="btn btn-primary" type="submit">Encontrar Vagas</button>
              <?php echo $this->html->link('Pesquisa avançada', array('controller' => 'users', 'action' => 'vagas'), array('title' => 'Pesquisa avançada')); ?>
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
            <span>Latest</span>
            <h2>Vagas Recentes</h2>
          </header>

          <div class="row">

            <!-- Job item -->
            <div class="col-xs-12">
              <a class="item-block" href="job-detail.htm">
                <header>
                  <?php echo $this->Html->image('/template/img/logo-google.jpg', array('alt' => 'Logo Google'));?>
                  <div class="hgroup">
                    <h4>Senior front-end developer</h4>
                    <h5>Google</h5>
                  </div>
                  <div class="header-meta">
                    <span class="location">Menlo park, CA</span>
                    <span class="label label-success">Full-time</span>
                  </div>
                </header>
              </a>
            </div>
            <!-- END Job item -->


            <!-- Job item -->
            <div class="col-xs-12">
              <a class="item-block" href="job-detail.htm">
                <header>
                    <?php echo $this->Html->image('/template/img/logo-linkedin.png', array('alt' => 'Logo Linkedin'));?>
                  <div class="hgroup">
                    <h4>Software Engineer (Entry or Senior)</h4>
                    <h5>Linkedin</h5>
                  </div>
                  <div class="header-meta">
                    <span class="location">Livermore, CA</span>
                    <span class="label label-warning">Part-time</span>
                  </div>
                </header>
              </a>
            </div>
            <!-- END Job item -->

            <!-- Job item -->
            <div class="col-xs-12">
              <a class="item-block" href="job-detail.htm">
                <header>
                    <?php echo $this->Html->image('/template/img/logo-envato.png', array('alt' => 'Logo envato'));?>
                  <div class="hgroup">
                    <h4>Full Stack Web Developer</h4>
                    <h5>Envato</h5>
                  </div>
                  <div class="header-meta">
                    <span class="location">San Francisco, CA</span>
                    <span class="label label-info">Freelance</span>
                  </div>
                </header>
              </a>
            </div>
            <!-- END Job item -->

            <!-- Job item -->
            <div class="col-xs-12">
              <a class="item-block" href="job-detail.htm">
                <header>
                  <?php echo $this->Html->image('/template/img/logo-facebook.png', array('alt' => 'Logo Facebook'));?>
                  <div class="hgroup">
                    <h4>Web Applications Developer</h4>
                    <h5>Facebook</h5>
                  </div>
                  <div class="header-meta">
                    <span class="location">Lexington, MA</span>
                    <span class="label label-danger">Internship</span>
                  </div>
                </header>
              </a>
            </div>
            <!-- END Job item -->

            <!-- Job item -->
            <div class="col-xs-12">
              <a class="item-block" href="job-detail.htm">
                <header>
                    <?php echo $this->Html->image('/template/img/logo-microsoft.jpg', array('alt' => 'Logo Microsoft'));?>
                  <div class="hgroup">
                    <h4>Sr. SQL Server Developer</h4>
                    <h5>Microsoft</h5>
                  </div>
                  <div class="header-meta">
                    <span class="location">Palo Alto, CA</span>
                    <span class="label label-success">Remote</span>
                  </div>
                </header>
              </a>
            </div>
            <!-- END Job item -->

          </div>

          <br><br>
          <p class="text-center">
            <?php echo $this->html->link('Veja todas as vagas',array('controller' => 'users', 'action' => 'vagas'), array('title' => 'Veja todas as vagas', 'class' => 'btn btn-info'));?>
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