<header class="page-header bg-img size-lg">
    <div class="container">
        <div class="header-detail descricao-vaga">
            <?php 
                if(isset($vaga['Vaga']['url_imagem']) || $vaga['Vaga']['url_imagem'] == ''){
                    echo $this->Html->image('/template/img/logo.png', array('class' => 'img-vaga', 'alt' => $vaga['Vaga']['nome']." - ". $vaga['Empresa']['nome'], 'title' => $vaga['Vaga']['nome']." - ". $vaga['Vaga']['nome']));
                } else {
                    echo $this->Html->image('/upload/img/vaga/'.$vaga['Vaga']['url_imagem'], array('class' => 'img-vaga', 'alt' => $vaga['Vaga']['nome']." - ". $vaga['Empresa']['nome'], 'title' => $vaga['Vaga']['nome']." - ". $vaga['Vaga']['nome']));
                }
            ?>
            <div class="hgroup">
                <h1><?php echo $vaga['Vaga']['nome'] ?></h1>
                <h3><a href="#"><?php echo $vaga['Empresa']['nome'] ?></a></h3> </div>
                <time datetime="<?php echo $vaga['Vaga']['modified']; ?>"><?php echo $this->Tradutortempo->tempoPtBr($this->Time->timeAgoInWords($vaga['Vaga']['modified'])); ?> </time>
            <hr>
            <p class="lead">
                <?php echo $vaga['Vaga']['descricao_rapida'] ?>
            </p>
            <ul class="details cols-3">
                <li> <i class="fa fa-map-marker"></i> <span>Menlo Park, CA</span> </li>
                <li> <i class="fa fa-briefcase"></i> <span>Full time</span> </li>
                <li> <i class="fa fa-money"></i> <span>$90,000 - $110,000 / year</span> </li>
                <li> <i class="fa fa-clock-o"></i> <span>40h / week</span> </li>
                <li> <i class="fa fa-flask"></i> <span>2+ years experience</span> </li>
                <li> <i class="fa fa-certificate"></i> <a href="#">Master or Bachelor</a> </li>
            </ul>
            <div class="button-group">
                <ul class="social-icons">
                    <li class="title">Share on</li>
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
                <div class="action-buttons">
                    <?php echo $this->Html->link('Candidatos', array('controller' => 'empresas', 'action' => 'candidadosAVaga'), array('class' => 'btn btn-info'));?>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <section>
        <div class="container">
            <?php echo $vaga['Vaga']['descricao_completa'] ?>
        </div>
    </section>
</main>