<!-- Site footer -->
<footer class="site-footer">

    <!-- Top section -->
    <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-9">
        <h6>About</h6>
        <p class="text-justify">An employment website is a web site that deals specifically with employment or careers. Many employment websites are designed to allow employers to post job requirements for a position to be filled and are commonly known as job boards. Other employment sites offer employer reviews, career and job-search advice, and describe different job descriptions or employers. Through a job website a prospective employee can locate and fill out a job application.</p>
        </div>

        <div class="col-xs-6 col-md-3">
        <h6>Company</h6>
        <ul class="footer-links">
            <li><?php echo $this->Html->link('Sobre', array('controller' => 'pages', 'action' => 'sobre'), array('title' => 'Sobre'));?></li>
            <li><?php echo $this->Html->link('Contato', array('controller' => 'pages', 'action' => 'contato'), array('title' => 'Contato'));?></li>
            <li><?php echo $this->Html->link('Políticas de Privacidade', array('controller' => 'pages', 'action' => 'politicasDePrivacidade'), array('title' => 'Políticas de Privacidade'));?></li>
            <li><?php echo $this->Html->link('Termos de Uso', array('controller' => 'pages', 'action' => 'termosDeUso'), array('title' => 'Termos de Uso'));?></li>
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
        <p class="copyright-text">Copyrights &copy; 2016 All Rights Reserved by <a href="#freejobs">FreeJob</a>.</p>
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