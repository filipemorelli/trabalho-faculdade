<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Encontre suas vagas de empregos no Freejobs, são milhares de empregos nas maiores empresas do país. Ofertas de emprego exclusivas nas melhores agencia de empregos.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Freejobs - Vagas de Emprego">
    <meta itemprop="description"
          content="Encontre suas vagas de empregos no Freejobs, são milhares de empregos nas maiores empresas do país. Ofertas de emprego exclusivas nas melhores agencia de empregos.">
    <meta itemprop="image" content="<?php echo $this->Html->url("/template/img/logo-alt.png", true); ?>">

    <!-- Open Graph data -->
    <meta property="og:title" content="Freejobs - Vagas de Emprego">
    <meta property="og:type" content="site">
    <meta property="og:url" content="<?php echo Router::url($this->here, true); ?>">
    <meta property="og:image" content="<?php echo $this->Html->url("/template/img/logo-alt.png", true); ?>">
    <meta property="og:description"
          content="Encontre suas vagas de empregos no Freejobs, são milhares de empregos nas maiores empresas do país. Ofertas de emprego exclusivas nas melhores agencia de empregos.">
    <meta property="og:site_name" content="Freejobs - Vagas de Emprego">

    <title><?php echo $title_for_layout ?></title>

    <!-- Styles -->
    <?php
    echo $this->Html->meta('favicon.png', '/template/img/favicon.png', array('type' => 'icon'));
    echo $this->Html->css(array(
        "/template/css/app.min.css",
        "/template/vendors/jqueryui/jqueryui-1.12.1.min.css",
        "/template/vendors/summernote/summernote.css",
        "http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700",
        "/template/css/custom.css",
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
                echo $this->Html->link($this->Html->image('/template/img/logo.png', array(
                    'alt'   => 'logo',
                    'class' => 'logo'
                )), array(
                    'controller' => 'pages',
                    'action'     => 'index'
                ), array(
                    'title'  => 'logo em texto',
                    'escape' => false
                ));
                echo $this->Html->link($this->Html->image('/template/img/logo-alt.png', array(
                    'alt'   => 'logo',
                    'class' => 'logo-alt'
                )), array(
                    'controller' => 'pages',
                    'action'     => 'index'
                ), array(
                    'title'  => 'logo em texto',
                    'escape' => false
                ));
                ?>
            </div>

        </div>
        <!-- END Logo -->

        <!-- Navigation menu -->
        <ul class="nav-menu">
            <li>
                <?php echo $this->Html->link('Início', array(
                    'controller' => 'pages',
                    'action'     => 'index'
                ), array('title' => 'Início')); ?>
            </li>
            <li>
                <?php echo $this->Html->link('<i class=""></i> Editar Currículo', array(
                    'controller' => 'trabalhadores',
                    'action'     => 'editarPerfilTrabalhador'
                ), array(
                    'title'  => 'perfil',
                    'escape' => false
                )); ?>
            </li>
            <li>
                <?php echo $this->Html->link('<i class="ti-book"></i> Histórico de candidaturas', array(
                    'controller' => 'trabalhador_vaga',
                    'action'     => 'historicoCandidaturas'
                ), array(
                    'title'  => 'Histórico de candidaturas',
                    'escape' => false
                )); ?>
            </li>
            <li>
                <?php echo $this->Html->link('<i class="ti-search"></i> Vagas', array(
                    'controller' => 'users',
                    'action'     => 'vagas'
                ), array(
                    'title'  => 'pesquisar vagar',
                    'escape' => false
                )); ?>
            </li>
            <li>
                <?php echo $this->Html->link('<i class="ti-user"></i> ' . $this->Session->read('Auth.User.nome'), "#", array(
                    'class'  => '',
                    'title'  => 'login',
                    'escape' => false
                )); ?>
                <ul>
                    <li>
                        <?php echo $this->Html->link('<i class="ti-help-alt"></i> Ajuda', '#', array(
                            'title'  => 'Ajuda',
                            'escape' => false
                        )); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link('<i class="fa fa-sign-out"></i> Sair', array(
                            'controller' => 'users',
                            'action'     => 'logout'
                        ), array(
                            'title'  => 'Sair',
                            'escape' => false
                        )); ?>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END Navigation menu -->

    </div>
</nav>
<!-- END Navigation bar -->

<?php
echo $this->fetch('content');
echo $this->element('Geral/footer');
?>

<!-- Scripts -->
<?php
echo $this->Html->script(array(
    "/template/js/app.min.js",
    "/template/vendors/summernote/summernote.min.js",
    "/template/vendors/jqueryui/jqueryui-1.12.1.min.js",
    "/template/vendors/mask/jquery.mask.min.js",
    "/template/js/custom.js",
));
?>

</body>
</html>
