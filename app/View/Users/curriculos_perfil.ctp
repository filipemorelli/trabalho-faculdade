<header class="page-header bg-img size-lg" style="background-image: url(<?php echo $this->Html->url('/template/img/bg-banner2.jpg');?>)">
    <div class="container no-shadow">
        <h1 class="text-center">Manage your resumes</h1>
        <p class="lead text-center">Here's the list of your created resumes. You can edit or delete them, or even add a new one.</p>
    </div>
</header>
<main>
    <section class="no-padding-top bg-alt">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-right">
                    <br><a class="btn btn-primary btn-sm" href="resume-add.htm">Add new resume</a> </div>
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <a href="resume-detail.htm">
                                <?php echo $this->Html->image('/template/img/avatar.jpg', array('class' => 'resume-avatar', 'alt' => ''));?>
                            </a>
                            <div class="hgroup">
                                <h4><a href="resume-detail.htm">John Doe</a></h4>
                                <h5>Front-end developer</h5> </div>
                            <div class="header-meta"> <span class="location">Menlo park, CA</span> <span class="rate">$55 per hour</span> </div>
                        </header>
                        <footer>
                            <p class="status"><strong>Updated on:</strong> March 10, 2016</p>
                            <div class="action-btn"> <a class="btn btn-xs btn-gray" href="#">Hide</a> <a class="btn btn-xs btn-gray" href="#">Edit</a> <a class="btn btn-xs btn-danger" href="#">Delete</a> </div>
                        </footer>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <a href="resume-detail.htm">
                                <?php echo $this->Html->image('/template/img/avatar.jpg', array('class' => 'resume-avatar', 'alt' => ''));?>
                            </a>
                            <div class="hgroup">
                                <h4><a href="resume-detail.htm">John Doe</a></h4>
                                <h5>Full stack developer</h5> </div>
                            <div class="header-meta"> <span class="location">Menlo park, CA</span> <span class="rate">$85 per hour</span> </div>
                        </header>
                        <footer>
                            <p class="status"><strong>Updated on:</strong> March 03, 2016</p>
                            <div class="action-btn"> <a class="btn btn-xs btn-gray" href="#">Hide</a> <a class="btn btn-xs btn-gray" href="#">Edit</a> <a class="btn btn-xs btn-danger" href="#">Delete</a> </div>
                        </footer>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <a href="resume-detail.htm">
                                <?php echo $this->Html->image('/template/img/avatar.jpg', array('class' => 'resume-avatar', 'alt' => ''));?>
                            </a>
                            <div class="hgroup">
                                <h4><a href="resume-detail.htm">John Doe</a></h4>
                                <h5>PHP developer <span class="label label-info">Hidden</span></h5> </div>
                            <div class="header-meta"> <span class="location">Menlo park, CA</span> <span class="rate">$60 per hour</span> </div>
                        </header>
                        <footer>
                            <p class="status"><strong>Updated on:</strong> Feb 27, 2016</p>
                            <div class="action-btn"> <a class="btn btn-xs btn-gray" href="#">Show</a> <a class="btn btn-xs btn-gray" href="#">Edit</a> <a class="btn btn-xs btn-danger" href="#">Delete</a> </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>