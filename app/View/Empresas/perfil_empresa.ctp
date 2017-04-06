<header class="page-header bg-img size-lg">
    <div class="container">
        <div class="header-detail"> <img class="logo" src="<?php echo $empresa['Empresa']['url_imagem'] != "" ? $this->Html->url('/upload/img/empresa/'.$empresa['Empresa']['url_imagem']) : '' ?>" alt="">
            <div class="hgroup">
                <h1><?php echo $empresa['Empresa']['nome']; ?></h1>
                <h3><?php echo $empresa['Empresa']['ramo']; ?></h3>
            </div>
            <hr>
            <p class="lead">
                <?php echo $empresa['Empresa']['descricao_rapida']; ?>
            </p>
            <ul class="details cols-3">
                <li> <i class="fa fa-globe"></i> <a href="#"><?php echo $empresa['Empresa']['site'] != "" ? $empresa['Empresa']['site'] : 'Sem Site'; ?></a> </li>
                <li> <i class="fa fa-users"></i> <span><?php echo $empresa['Empresa']['qtde_empregados']; ?> funcionários</span> </li>
                <li> <i class="fa fa-birthday-cake"></i> <span><?php echo $empresa['Empresa']['aniversario_empresa'] != "" ? "Desde " . explode("-", $empresa['Empresa']['aniversario_empresa'])[0] : "Não informado"; ?></span> </li>
                <li> <i class="fa fa-phone"></i> <span><?php echo $empresa['Empresa']['telefone'] != "" ? $empresa['Empresa']['telefone']: "Telefone não informado"?></span> </li>
                <li> <i class="fa fa-envelope"></i> <a href="#"><?php echo $empresa['Empresa']['email'] != "" ? $empresa['Empresa']['email']: "E-mail não informado"?></a> </li>
            </ul>
            <div class="button-group">
                <ul class="social-icons">
                    <?php echo $empresa['Empresa']['url_facebook'] != "" ? '<li><a class="facebook" href="'.$empresa['Empresa']['url_facebook'].'" target="_blank"><i class="fa fa-facebook"></i></a></li>' : ""; ?>
                    <?php echo $empresa['Empresa']['url_google_plus'] != "" ? '<li><a class="google-plus" href="'.$empresa['Empresa']['url_google_plus'].'" target="_blank"><i class="fa fa-google-plus"></i></a></li>' : ""; ?>
                    <?php echo $empresa['Empresa']['url_twitter'] != "" ? '<li><a class="twitter" href="'.$empresa['Empresa']['url_twitter'].'" target="_blank"><i class="fa fa-twitter"></i></a></li>' : ""; ?>
                    <?php echo $empresa['Empresa']['url_instagram'] != "" ? '<li><a class="instagram" href="'.$empresa['Empresa']['url_instagram'].'" target="_blank"><i class="fa fa-instagram"></i></a></li>' : ""; ?>
                    <?php echo $empresa['Empresa']['url_youtube'] != "" ? '<li><a class="youtube" href="'.$empresa['Empresa']['url_youtube'].'" target="_blank"><i class="fa fa-youtube"></i></a></li>' : ""; ?>
                    <?php echo $empresa['Empresa']['url_pinterest'] != "" ? '<li><a class="pinterest" href="'.$empresa['Empresa']['url_pinterest'].'" target="_blank"><i class="fa fa-pinterest"></i></a></li>' : ""; ?>
                </ul>
                <?php
                /*
                <div class="action-buttons"> <a class="btn btn-gray" href="#">Favorite</a> <a class="btn btn-success" href="#">Contact</a> </div>
                */
                ?>
            </div>
        </div>
    </div>
</header>
<main>
    <section>
        <div class="container">
            <header class="section-header">
                <h2>Sobre <?php echo $empresa['Empresa']['nome']; ?></h2>
            </header>
            <?php echo $empresa['Empresa']['descricao_completa']; ?>
        </div>
    </section>
    <section id="open-positions" class="bg-alt">
        <div class="container">
            <header class="section-header">
                <span>Vagas</span>
                <h2>Ultimas Vagas Abertas</h2>
            </header>
            <div class="row">
                <?php
                    foreach($vagas as $vaga){
                ?>
                    <div class="col-xs-12">
                        <div class="item-block<?php echo $vaga['Vaga']['ativo'] == 0 ? ' item-removed': '' ;?>">
                            <header>
                                
                                <a href="<?php echo $this->Html->url(array('controller' => 'empresas', 'action' => 'detalhesVaga', 'id' => $vaga['Vaga']['id'])); ?>">
                                    <?php echo $this->Html->image('/upload/img/vaga/'.$vaga['Vaga']['url_imagem'], array('alt' => $vaga['Vaga']['nome']." - ". $vaga['Empresa']['nome'], 'title' => $vaga['Vaga']['nome']." - ". $vaga['Empresa']['nome']));?>
                                </a>
                                <div class="hgroup">
                                    <h4><a href="<?php echo $this->Html->url(array('controller' => 'empresas', 'action' => 'detalhesVaga', 'id' => $vaga['Vaga']['id'])); ?>"><?php echo $vaga['Vaga']['nome']; ?></a></h4>
                                    <h5><a href="<?php echo $this->Html->url(array('controller' => 'empresas', 'action' => 'detalhesVaga', 'id' => $vaga['Vaga']['id'])); ?>"><?php echo $empresa['Empresa']['nome']; ?></a></h5> </div>
                                <div class="header-meta"> <span class="location"><?php echo $vaga['Endereco']['cidade'] . ', '. $vaga['Endereco']['estado']; ?></span>
                                    <time datetime="<?php echo $vaga['Vaga']['modified']; ?>"><?php echo $this->Tradutortempo->tempoPtBr($this->Time->timeAgoInWords($vaga['Vaga']['modified'])); ?> </time>
                                </div>
                            </header>
                            <div class="item-body">
                                <p><?php echo $vaga['Vaga']['descricao_rapida'] ?></p>
                            </div>
                            <footer>
                                <p class="status"><strong>Status:</strong> Pending approval</p>
                            </footer>
                        </div>
                    </div>
                <?php
                    }
                ?>
                <?php /*
                <div class="col-xs-12">
                    <a class="item-block" href="job-detail.html">
                        <header> <img src="<?php echo $this->Html->url('/template/img/logo-google.jpg');?>" alt="">
                            <div class="hgroup">
                                <h4>Senior front-end developer</h4>
                                <h5>Google <span class="label label-success">Full-time</span></h5> </div>
                            <time datetime="2016-03-10 20:00">34 min ago</time>
                        </header>
                        <div class="item-body">
                            <p>A rapidly growing, well established marketing firm is looking for an experienced web developer for a full-time position. In this role, you will develop websites, apps, emails and other forms of digital electronic media, all while maintaining brand standards across design projects and other marketing communication materials.</p>
                        </div>
                        <footer>
                            <ul class="details cols-3">
                                <li> <i class="fa fa-map-marker"></i> <span>Menlo Park, CA</span> </li>
                                <li> <i class="fa fa-money"></i> <span>$90,000 - $110,000 / year</span> </li>
                                <li> <i class="fa fa-certificate"></i> <span>Master or Bachelor</span> </li>
                            </ul>
                        </footer>
                    </a>
                </div>
                */?>
            </div>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <br />
                    <?php echo $this->Html->link(__('Todas as Vagas ...'), array('controller' => 'empresas', 'action' => 'listarVagas'), array('class' => 'btn btn-primary')); ?>
                </div>
            </div>
        </div>
    </section>
</main>