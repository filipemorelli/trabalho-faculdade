<header class="page-header bg-img size-lg" style="background-image: url(<?php echo $this->html->url('/template/img/bg-banner1.jpg');?>)">
    <div class="container no-shadow">
        <h1 class="text-center">Apply for the job</h1>
        <p class="lead text-center">Apply with your online resume, create new resume for the job, or make a custom application.</p>
        <hr>
        <a class="item-block item-block-flat" href="job-detail.htm">
            <header>
                <?php echo $this->html->image('/template/img/logo-google.jpg', array('alt' => ''));?>
                <div class="hgroup">
                    <h4>Senior front-end developer</h4>
                    <h5>Google</h5> </div>
                <div class="header-meta"> <span class="location">Menlo park, CA</span>
                    <time datetime="2016-03-10 20:00">34 min ago</time>
                </div>
            </header>
        </a>
        <div class="button-group">
            <div class="action-buttons"> <a class="btn btn-gray" href="#sec-custom">Custom application</a> <a class="btn btn-primary" href="#sec-resume">Apply with a resume</a> </div>
        </div>
    </div>
</header>
<main>
    <section id="sec-resume">
        <div class="container">
            <header class="section-header"> <span>Apply with a resume</span>
                <h2>Select a resume</h2>
                <p>Applied for this job with one of your online available resumes</p>
            </header>
            <div class="item-block">
                <header>
                    <a href="resume-detail.htm">
                        <?php echo $this->html->image('/template/img/avatar.jpg', array('alt' => '', 'class' => 'resume-avatar'));?>
                    </a>
                    <div class="hgroup">
                        <h4><a href="resume-detail.htm">John Doe</a></h4>
                        <h5>Front-end developer</h5> </div>
                    <div class="header-meta"> <span class="location">Menlo park, CA</span> <span class="rate">$55 per hour</span> </div>
                </header>
                <footer>
                    <p class="status"><strong>Updated on:</strong> March 10, 2016</p>
                    <div class="action-btn"> <a class="btn btn-xs btn-gray" href="#">Edit</a> <a class="btn btn-xs btn-success" href="#">Select</a> </div>
                </footer>
            </div>
            <div class="item-block">
                <header>
                    <a href="resume-detail.htm">
                        <?php echo $this->html->image('/template/img/avatar.jpg', array('alt' => '', 'class' => 'resume-avatar'));?>
                    </a>
                    <div class="hgroup">
                        <h4><a href="resume-detail.htm">John Doe</a></h4>
                        <h5>Full stack developer</h5> </div>
                    <div class="header-meta"> <span class="location">Menlo park, CA</span> <span class="rate">$85 per hour</span> </div>
                </header>
                <footer>
                    <p class="status"><strong>Updated on:</strong> March 03, 2016</p>
                    <div class="action-btn"> <a class="btn btn-xs btn-gray" href="#">Edit</a> <a class="btn btn-xs btn-success" href="#">Select</a> </div>
                </footer>
            </div>
            <div class="item-block">
                <header>
                    <a href="resume-detail.htm">
                        <?php echo $this->html->image('/template/img/avatar.jpg', array('alt' => '', 'class' => 'resume-avatar'));?>
                    </a>
                    <div class="hgroup">
                        <h4><a href="resume-detail.htm">John Doe</a></h4>
                        <h5>PHP developer <span class="label label-info">Hidden</span></h5> </div>
                    <div class="header-meta"> <span class="location">Menlo park, CA</span> <span class="rate">$60 per hour</span> </div>
                </header>
                <footer>
                    <p class="status"><strong>Updated on:</strong> Feb 27, 2016</p>
                    <div class="action-btn"> <a class="btn btn-xs btn-gray" href="#">Edit</a> <a class="btn btn-xs btn-success" href="#">Select</a> </div>
                </footer>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12 col-md-3"> <a class="btn btn-block btn-primary" href="resume-add.htm">Add new resume</a> </div>
            </div>
        </div>
    </section>
    <section id="sec-custom" class="bg-alt">
        <div class="container">
            <header class="section-header"> <span>Custom application</span>
                <h2>Apply now</h2>
                <p>Apply for this job with a custom application.</p>
            </header>
            <form>
                <div class="row">
                    <div class="form-group col-xs-12 col-md-6">
                        <input type="text" class="form-control input-lg" placeholder="Name"> </div>
                    <div class="form-group col-xs-12 col-md-6">
                        <input type="email" class="form-control input-lg" placeholder="Email"> </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                </div>
                <div class="form-group"> </div>
                <div class="row">
                    <div class="col-xs-6 col-md-3">
                        <div class="upload-button upload-button-block">
                            <button class="btn btn-block btn-success">Attach your CV</button>
                            <input name="cv" type="file"> </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <button type="submit" class="btn btn-block btn-primary">Submit application</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>