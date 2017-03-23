<header class="page-header bg-img size-lg" style="background-image: url(<?php echo $this->html->url('/template/img/bg-banner2.jpg');?>)">
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
                    
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a>
                    </li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a>
                    </li>
                </ul>
                <div class="action-buttons"> <a class="btn btn-gray" href="#">Favorite</a> <a class="btn btn-success" href="#">Contact</a> </div>
            </div>
        </div>
    </div>
</header>
<main>
    <section>
        <div class="container">
            <header class="section-header"> <span>About</span>
                <h2>Company detail</h2> </header>
            <p>Google was founded by Larry Page and Sergey Brin while they were Ph.D. students at Stanford University. Together they own about 14 percent of its shares but control 56 percent of the stockholder voting power through supervoting stock. They incorporated Google as a privately held company on September 4, 1998. An initial public offering followed on August 19, 2004. Its mission statement from the outset was "to organize the world's information and make it universally accessible and useful," and its unofficial slogan was "Don't be evil". In 2004, Google moved to its new headquarters in Mountain View, California, nicknamed the Googleplex. In August 2015, Google announced plans to reorganize its interests as a holding company called Alphabet Inc. When this restructuring took place on October 2, 2015, Google became Alphabet's leading subsidiary, as well as the parent for Google's Internet interests.</p>
            <p>Rapid growth since incorporation has triggered a chain of products, acquisitions and partnerships beyond Google's core search engine (Google Search). It offers online productivity software (Google Docs) including email (Gmail), a cloud storage service (Google Drive) and a social networking service (Google+). Desktop products include applications for web browsing (Google Chrome), organizing and editing photos (Google Photos), and instant messaging (Hangouts). The company leads the development of the Android mobile operating system and the browser-only Chrome OS for a class of netbooks known as Chromebooks. Google has moved increasingly into communications hardware: it partners with major electronics manufacturers in the production of its "high-quality low-cost" Nexus devices. In 2012, a fiber-optic infrastructure was installed in Kansas City to facilitate a Google Fiber broadband service.</p>
        </div>
    </section>
    <section id="open-positions" class="bg-alt">
        <div class="container">
            <header class="section-header"> <span>vacancies</span>
                <h2>Open positions</h2> </header>
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