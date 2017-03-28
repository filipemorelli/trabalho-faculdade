<header class="page-header bg-img size-lg">
    <div class="container">
        <div class="header-detail"> <img class="logo" src="<?php echo $empresa['Empresa']['url_imagem'] != "" ? $this->html->url('/upload/img/'.$empresa['Empresa']['user_id'].'/'.$empresa['Empresa']['url_imagem']) : '' ?>" alt="">
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
                <h2>Vagas abertas</h2>
            </header>
            <div class="row">
                <div class="col-xs-12">
                    <a class="item-block" href="job-detail.html">
                        <header> <img src="<?php echo $this->html->url('/template/img/logo-google.jpg');?>" alt="">
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
                <div class="col-xs-12">
                    <a class="item-block" href="job-detail.html">
                        <header> <img src="<?php echo $this->html->url('/template/img/logo-google.jpg');?>" alt="">
                            <div class="hgroup">
                                <h4>Software Engineer (Entry or Senior)</h4>
                                <h5>Gogle <span class="label label-warning">Part-time</span></h5> </div>
                            <time datetime="2016-03-10 20:00">8 hours ago</time>
                        </header>
                        <div class="item-body">
                            <p>The Special Programs Department II is seeking to hire a Computer Scientist to augment our software development team. Members of the software development team are expected to follow established software engineering principles to methodically deliver mission application software.</p>
                        </div>
                        <footer>
                            <ul class="details cols-3">
                                <li> <i class="fa fa-map-marker"></i> <span>Livermore, CA</span> </li>
                                <li> <i class="fa fa-money"></i> <span>$60,000 - $75,000 / year</span> </li>
                                <li> <i class="fa fa-certificate"></i> <span>Master or Bachelor</span> </li>
                            </ul>
                        </footer>
                    </a>
                </div>
                <div class="col-xs-12">
                    <a class="item-block" href="job-detail.html">
                        <header> <img src="<?php echo $this->html->url('/template/img/logo-google.jpg');?>" alt="">
                            <div class="hgroup">
                                <h4>Full Stack Web Developer</h4>
                                <h5>Google <span class="label label-info">Freelance</span></h5> </div>
                            <time datetime="2016-03-10 20:00">2 days ago</time>
                        </header>
                        <div class="item-body">
                            <p>We're seeing a driven, curious, passionate full-stack web developer to help change how people learn creative skills and effortlessly create the images they imagine. You’ll be part of a new rapid prototyping and development team helping to apply lean startup development methodologies and modern web technologies to shape the future of Creative Cloud.</p>
                        </div>
                        <footer>
                            <ul class="details cols-3">
                                <li> <i class="fa fa-map-marker"></i> <span>San Francisco, CA</span> </li>
                                <li> <i class="fa fa-money"></i> <span>$105,000 / year</span> </li>
                                <li> <i class="fa fa-certificate"></i> <span>Master</span> </li>
                            </ul>
                        </footer>
                    </a>
                </div>
                <div class="col-xs-12">
                    <a class="item-block" href="job-detail.html">
                        <header> <img src="<?php echo $this->html->url('/template/img/logo-google.jpg');?>" alt="">
                            <div class="hgroup">
                                <h4>Web Applications Developer</h4>
                                <h5>Google <span class="label label-danger">Internship</span></h5> </div>
                            <time datetime="2016-03-10 20:00">Feb 26, 2016</time>
                        </header>
                        <div class="item-body">
                            <p>Client needs a back-end Java developer who has worked mainly on Java, J2EE, Spring, Web Services, and other Java related technologies.</p>
                        </div>
                        <footer>
                            <ul class="details cols-3">
                                <li> <i class="fa fa-map-marker"></i> <span>Lexington, MA</span> </li>
                                <li> <i class="fa fa-money"></i> <span>$130,000 - $150,000 / year</span> </li>
                                <li> <i class="fa fa-certificate"></i> <span>Ph.D. or Master</span> </li>
                            </ul>
                        </footer>
                    </a>
                </div>
                <div class="col-xs-12">
                    <a class="item-block" href="job-detail.html">
                        <header> <img src="<?php echo $this->html->url('/template/img/logo-google.jpg');?>" alt="">
                            <div class="hgroup">
                                <h4>Sr. SQL Server Developer</h4>
                                <h5>Google <span class="label label-success">Remote</span></h5> </div>
                            <time datetime="2016-03-10 20:00">Feb 16, 2016</time>
                        </header>
                        <div class="item-body">
                            <p>Understand and model complex business requirements into database schemas and work with existing databases in SQL and NOSQL data stores. Develop high performance stored procedures, triggers and other database level code to provide data services to other teams.</p>
                        </div>
                        <footer>
                            <ul class="details cols-3">
                                <li> <i class="fa fa-map-marker"></i> <span>Palo Alto, CA</span> </li>
                                <li> <i class="fa fa-money"></i> <span>$125,000 - $140,000 / year</span> </li>
                                <li> <i class="fa fa-certificate"></i> <span>Ph.D. or Master</span> </li>
                            </ul>
                        </footer>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>