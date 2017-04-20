<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Encontre suas vagas de empregos no Freejobs, são milhares de empregos nas maiores empresas do país. Ofertas de emprego exclusivas nas melhores agencia de empregos.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Freejobs - Vagas de Emprego">
    <meta itemprop="description" content="Encontre suas vagas de empregos no Freejobs, são milhares de empregos nas maiores empresas do país. Ofertas de emprego exclusivas nas melhores agencia de empregos.">
    <meta itemprop="image" content="<?php echo $this->Html->url("/template/img/logo-alt.png", true); ?>">

    <!-- Open Graph data -->
    <meta property="og:title" content="Freejobs - Vagas de Emprego">
    <meta property="og:type" content="site">
    <meta property="og:url" content="<?php echo Router::url( $this->here, true ); ?>">
    <meta property="og:image" content="<?php echo $this->Html->url("/template/img/logo-alt.png", true); ?>">
    <meta property="og:description" content="Encontre suas vagas de empregos no Freejobs, são milhares de empregos nas maiores empresas do país. Ofertas de emprego exclusivas nas melhores agencia de empregos.">
    <meta property="og:site_name" content="Freejobs - Vagas de Emprego">

    <title><?php echo $title_for_layout?></title>

    <!-- Styles -->
    <?php
        echo $this->Html->meta(
            'favicon.png',
            '/template/img/favicon.png',
            array('type' => 'icon')
        );
        echo $this->Html->css(array(
            "/template/css/app.min.css",
            "/template/css/custom.css",
            "http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700"
        ));
    ?>
  </head>

  <body class="login-page">
    
    <main>
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?> 
    </main>

    <!-- Scripts -->
    <?php
        echo $this->Html->script(array(
        "/template/js/app.min.js",
        "/template/js/custom.js",
        ));
    ?>

  </body>
</html>