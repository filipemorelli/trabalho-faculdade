<?php
    $linkVaga = $this->Html->url(array(
        'controller' => 'users',
        'action'     => 'vaga',
        'id'         => $vaga['Vaga']['id'],
        'titulo'     => $vaga['Vaga']['nome']
    ), true);
?>
<header class="page-header bg-img size-lg">
    <div class="container">
        <div class="header-detail descricao-vaga">
            <?php
            if (isset($vaga['Vaga']['url_imagem']) || $vaga['Vaga']['url_imagem'] == '') {
                echo $this->Html->image('/template/img/logo.png', array(
                    'class' => 'img-vaga',
                    'alt'   => $vaga['Vaga']['nome'] . " - " . $vaga['Empresa']['nome'],
                    'title' => $vaga['Vaga']['nome'] . " - " . $vaga['Vaga']['nome']
                ));
            } else {
                echo $this->Html->image('/upload/img/vaga/' . $vaga['Vaga']['url_imagem'], array(
                    'class' => 'img-vaga',
                    'alt'   => $vaga['Vaga']['nome'] . " - " . $vaga['Empresa']['nome'],
                    'title' => $vaga['Vaga']['nome'] . " - " . $vaga['Vaga']['nome']
                ));
            }
            ?>
            <div class="hgroup">
                <h1><?php echo $vaga['Vaga']['nome'] ?></h1>
                <h3><a href="#"><?php echo $vaga['Empresa']['nome'] ?></a></h3></div>
            <time datetime="<?php echo $vaga['Vaga']['modified']; ?>"><?php echo ucfirst($this->Tradutortempo->tempoPtBr($this->Time->timeAgoInWords($vaga['Vaga']['modified']))); ?> </time>
            <hr>
            <p class="lead">
                <?php echo $vaga['Vaga']['descricao_rapida'] ?>
            </p>
            <ul class="details cols-3">
                <li><i class="fa fa-map-marker"></i> <span><?php echo $vaga['Endereco']['bairro'] . " - " . $vaga['Endereco']['cidade'] . ", ". $vaga['Endereco']['estado'] ?></span></li>
                <li><i class="fa fa-briefcase"></i> <span><?php echo $vaga['Vaga']['periodo_trabalho'] ?></span></li>
                <li><i class="fa fa-money"></i> <span><?php echo $this->Utility->parseMoneyPtBr($vaga['Vaga']['salario']); ?></span></li>
                <li><i class="fa fa-clock-o"></i> <span><?php echo $vaga['Vaga']['horario_trabalho'] ?>h / semanais</span></li>
                <li><i class="fa fa-flask"></i> <span><?php echo $vaga['Vaga']['experiencia'] ?> de experiência</span></li>
                <li><i class="fa fa-certificate"></i><?php echo $this->Escolaridade->escolaridadeTexto($vaga['Vaga']['escolaridade']) ?></li>
            </ul>
            <div class="button-group">
                <ul class="social-icons">
                    <li class="title">Compartilhe:</li>
                    <li><a class="facebook" target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a class="google-plus" target="_blank"
                        href="https://plus.google.com/share?url=<?php echo $linkVaga ?> "><i
                                    class="fa fa-google-plus"></i></a>
                    </li>
                    <li><a class="twitter" target="_blank"
                        href="https://twitter.com/home?status=<?php echo "Vaga de " . $vaga['Vaga']['nome'] . " - Freejobs link: " . $linkVaga ?>"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a class="linkedin" target="_blank"
                        href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $linkVaga ?> &title=<?php echo "Vaga de " . $vaga['Vaga']['nome'] . " - Freejobs"; ?>"><i
                                    class="fa fa-linkedin"></i></a>
                    </li>
                    <li><a class="whatsapp" target="_blank"
                        href="https://api.whatsapp.com/send?text=<?php echo "Vaga de " . $vaga['Vaga']['nome'] . " - Freejobs link: " . $linkVaga ?>"><i class="fa fa-whatsapp"></i></a>
                    </li>
                </ul>
                <div class="action-buttons">
                    <?php echo $this->Html->link('Editar Vaga', array(
                        'controller' => 'empresas',
                        'action'     => 'editarVaga',
                        'id'         => $vaga['Vaga']['id'],
                    ), array('class' => 'btn btn-primary')); ?>
                    &nbsp;
                    <?php echo $this->Html->link('Candidatos', array(
                        'controller' => 'empresas',
                        'action'     => 'candidatosAVaga',
                        'id'         => $vaga['Vaga']['id'],
                    ), array('class' => 'btn btn-success')); ?>
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