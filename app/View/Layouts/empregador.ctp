<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema de controle para gerencia de negócios de Delivery.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Sistema Delivery">
    <meta itemprop="description" content="Sistema de controle para gerencia de negócios de Delivery.">
    <meta itemprop="image" content="<?php echo $this->Html->url("/marmitex/assets/img/imagem-descricao.png", true); ?>">

    <!-- Open Graph data -->
    <meta property="og:title" content="Sistema Delivery">
    <meta property="og:type" content="site">
    <meta property="og:url" content="<?php echo Router::url( $this->here, true ); ?>">
    <meta property="og:image" content="<?php echo $this->Html->url("/marmitex/assets/img/imagem-descricao.png", true); ?>">
    <meta property="og:description" content="Sistema de controle para gerencia de negócios de Delivery.">
    <meta property="og:site_name" content="Sistema Delivery">

    <title><?php echo $title_for_layout?></title>

    <!-- Styles -->
    <?php
        echo $this->Html->meta(
            'favicon.png',
            '/marmitex/assets/img/favicon.png',
            array('type' => 'icon')
        );
        echo $this->Html->css(array(
            "/template/css/app.min.css",
            "/template/css/custom.css",
            "/template/vendors/summernote/summernote.css",
            "http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700"
        ));
    ?>
  </head>

  <body class="nav-on-header smart-nav">

    <!-- Navigation bar -->
    <nav class="navbar">
      <div class="container">

        <!-- Logo -->
        <div class="pull-left">
          <a class="navbar-toggle" href="#" data-toggle="offcanvas"><i class="ti-menu"></i></a>

          <div class="logo-wrapper">
            <?php 
                echo $this->Html->link($this->Html->image('/template/img/logo.png', array('alt' => 'logo', 'class' => 'logo')), array('controller' => 'pages', 'action' => 'index'), array('title' => 'logo em texto', 'escape' => false));
                echo $this->Html->link($this->Html->image('/template/img/logo-alt.png', array('alt' => 'logo', 'class' => 'logo-alt')), array('controller' => 'pages', 'action' => 'index'), array('title' => 'logo em texto', 'escape' => false));
            ?>
          </div>

        </div>
        <!-- END Logo -->

        <!-- User account -->
        <div class="pull-right user-login">
            <ul class="nav-menu">
                <li>
                    <?php echo $this->Html->link('<i class="fa fa-user"></i> ' . $this->Session->read('Auth.User.nome'), "#", array('class' => '', 'title' => 'login', 'escape' => false)); ?>
                    <ul>
                        <li>
                            <?php echo $this->Html->link('Perfil Empresa', array('controller' => 'empresas', 'action' => 'perfilEmpresa'), array('title' => 'Perfil Empresa', 'escape' => false));?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Editar Pefil Empresa', array('controller' => 'empresas', 'action' => 'editarPerfilEmpresa'), array('title' => 'Pefil Empresa', 'escape' => false));?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Add Vaga', array('controller' => 'empresas', 'action' => 'adicionarVaga'), array('title' => 'Add Vaga', 'escape' => false));?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Listar Vagas da Empresa', array('controller' => 'empresas', 'action' => 'listarVagas'), array('title' => 'Listar Vagas da Empresa', 'escape' => false));?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Sobre a vaga', array('controller' => 'empresas', 'action' => 'detalhesVaga'), array('title' => 'Sobre a vaga', 'escape' => false));?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Candidatos à vaga', array('controller' => 'empresas', 'action' => 'candidadosAVaga'), array('title' => 'Candidatos à vaga', 'escape' => false));?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('<i class="fa fa-sign-out"></i> Sair', array('controller' => 'users', 'action' => 'logout'), array('title' => 'Sair', 'escape' => false));?>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END User account -->

        <!-- Navigation menu -->
        <ul class="nav-menu">
          <li>
            <?php echo $this->Html->link('Início', array('controller' => 'pages', 'action' => 'index'), array('title' => 'Início'));?>
          </li>
          <li>
            <?php echo $this->Html->link('Sobre', array('controller' => 'pages', 'action' => 'sobre'), array('title' => 'sobre'));?>
          </li>
          <li>
            <?php echo $this->Html->link('Contato', array('controller' => 'pages', 'action' => 'contato'), array('title' => 'contato'));?>
          </li>
          <li>
            <?php echo $this->Html->link('<i class="fa fa-search"></i> Vagas', array('controller' => 'users', 'action' => 'vagas'), array('title' => 'pesquisar vagar', 'escape' => false));?>
          </li>
          <li>
            <?php echo $this->Html->link('<i class="fa fa-search"></i> Profissionais', array('controller' => 'empresas', 'action' => 'buscarProfissionais'), array('title' => 'pesquisar vagar', 'escape' => false));?>
          </li>
        </ul>
        <!-- END Navigation menu -->

      </div>
    </nav>
    <!-- END Navigation bar -->

    <?php echo $this->fetch('content'); ?> 

        <!-- Site footer -->
    <footer class="site-footer">

      <!-- Top section -->
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">An employment website is a web site that deals specifically with employment or careers. Many employment websites are designed to allow employers to post job requirements for a position to be filled and are commonly known as job boards. Other employment sites offer employer reviews, career and job-search advice, and describe different job descriptions or employers. Through a job website a prospective employee can locate and fill out a job application.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Company</h6>
            <ul class="footer-links">
              <li><a href="page-about.htm">About us</a></li>
              <li><a href="page-typography.htm">How it works</a></li>
              <li><a href="page-faq.htm">Help center</a></li>
              <li><a href="page-typography.htm">Privacy policy</a></li>
              <li><a href="page-contact.htm">Contact us</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Trendeing jobs</h6>
            <ul class="footer-links">
              <li><a href="job-list.html">Front-end developer</a></li>
              <li><a href="job-list.html">Android developer</a></li>
              <li><a href="job-list.html">iOS developer</a></li>
              <li><a href="job-list.html">Full stack developer</a></li>
              <li><a href="job-list.html">Project administrator</a></li>
            </ul>
          </div>
        </div>

        <hr>
      </div>
      <!-- END Top section -->

      <!-- Bottom section -->
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyrights &copy; 2016 All Rights Reserved by <a href="http://themeforest.net/user/shamsoft">ShaMSofT</a>.</p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- END Bottom section -->

    </footer>
    <!-- END Site footer -->

    <!-- Back to top button -->
    <a id="scroll-up" href="#"><i class="ti-angle-up"></i></a>
    <!-- END Back to top button -->

    <!-- Scripts -->
    <?php
        echo $this->Html->script(array(
        "/template/js/app.min.js",
        "/template/vendors/summernote/summernote.min.js",
        "/template/js/custom.js",
        ));
    ?>

  </body>
</html>
