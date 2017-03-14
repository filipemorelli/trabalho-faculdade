<header class="page-header bg-img size-lg" style="background-image: url(<?php echo $this->html->url('/template/img/bg-banner1.jpg'); ?>)">
    <div class="container page-name">
        <h1 class="text-center">Job Candidates</h1>
        <p class="lead text-center">Use following search box to find best candidates for your openning position</p>
    </div>
    <div class="container">
        <h5>Applicants for</h5>
        <a class="item-block item-block-flat" href="job-detail.htm">
            <header>
                <?php echo $this->html->image('/template/img/logo-google.jpg', array('alt' => '')); ?>
                <div class="hgroup">
                    <h4>Senior front-end developer</h4>
                    <h5>Google</h5>
                </div>
                <div class="header-meta"> <span class="location">Menlo park, CA</span> <span class="label label-success">Full-time</span> </div>
            </header>
        </a>
        <hr>
        <h5>Search</h5>
        <form action="#">
            <div class="row">
                <div class="form-group col-xs-12 col-sm-4">
                    <input type="text" class="form-control" placeholder="Keyword"> </div>
                <div class="form-group col-xs-12 col-sm-4">
                    <select class="form-control selectpicker" multiple="">
                        <option selected="">All statuses
                            <option>New</option>
                            <option>Contacted</option>
                            <option>Interviewed</option>
                            <option>Hired</option>
                            <option>Archived</option>
                    </select>
                </div>
                <div class="form-group col-xs-12 col-sm-4">
                    <select class="form-control selectpicker">
                        <option selected="">Newest first</option>
                        <option>Oldest first</option>
                        <option>Low salary first</option>
                        <option>High salary first</option>
                        <option>Sort by name</option>
                    </select>
                </div>
            </div>
            <div class="button-group">
                <div class="action-buttons">
                    <button class="btn btn-success">Download CSV</button>
                    <button class="btn btn-primary">Apply filter</button>
                </div>
            </div>
        </form>
    </div>
</header>
<main>
    <section class="no-padding-top bg-alt">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <a href="resume-detail.htm">
                                <?php echo $this->html->image('/template/img/avatar-1.jpg', array('alt' => '', 'class' => 'resume-avatar')); ?>
                            </a>
                            <div class="hgroup">
                                <h4> <a href="resume-detail.htm">John Doe</a> <select class="form-control selectpicker label-style"> <option data-content="<span class='label label-default'>New</span>" selected="">New <option data-content="<span class='label label-warning'>Contacted</span>">Contacted <option data-content="<span class='label label-info'>Interviewed</span>">Interviewed <option data-content="<span class='label label-success'>Hired</span>">Hired <option data-content="<span class='label label-danger'>Archived</span>">Archived </select> </h4>
                                <h5>Front-end developer</h5> </div>
                            <div class="header-meta"> <span class="location">Menlo park, CA</span> <span class="rate">$55 per hour</span> </div>
                        </header>
                        <footer>
                            <div class="status"><strong>Applied on:</strong> July 16, 2016</div>
                            <div class="action-btn"> <a class="btn btn-xs btn-gray" href="#">Download CV</a> <a class="btn btn-xs btn-gray" data-toggle="modal" data-target="#modal-contact" href="#">Contact</a> <a class="btn btn-xs btn-danger" href="#">Delete</a> </div>
                        </footer>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <a href="resume-detail.htm">
                                <?php echo $this->html->image('/template/img/avatar-2.jpg', array('alt' => '', 'class' => 'resume-avatar')); ?>
                            </a>
                            <div class="hgroup">
                                <h4> <a href="resume-detail.htm">Bikesh Soltanian</a> <select class="form-control selectpicker label-style"> <option data-content="<span class='label label-default'>New</span>">New <option data-content="<span class='label label-warning'>Contacted</span>" selected="">Contacted <option data-content="<span class='label label-info'>Interviewed</span>">Interviewed <option data-content="<span class='label label-success'>Hired</span>">Hired <option data-content="<span class='label label-danger'>Archived</span>">Archived </select> </h4>
                                <h5>Java developer</h5> </div>
                            <div class="header-meta"> <span class="location">Fairfield, IA</span> <span class="rate">$60 per hour</span> </div>
                        </header>
                        <footer>
                            <div class="status"><strong>Applied on:</strong> July 16, 2016</div>
                            <div class="action-btn"> <a class="btn btn-xs btn-gray" href="#">Download CV</a> <a class="btn btn-xs btn-gray" data-toggle="modal" data-target="#modal-contact" href="#">Contact</a> <a class="btn btn-xs btn-danger" href="#">Delete</a> </div>
                        </footer>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <a href="resume-detail.htm">
                                <?php echo $this->html->image('/template/img/avatar-4.jpg', array('alt' => '', 'class' => 'resume-avatar')); ?>
                            </a>
                            <div class="hgroup">
                                <h4> <a href="resume-detail.htm">Chris Hernandeziyan</a> <select class="form-control selectpicker label-style"> <option data-content="<span class='label label-default'>New</span>">New <option data-content="<span class='label label-warning'>Contacted</span>">Contacted <option data-content="<span class='label label-info'>Interviewed</span>" selected="">Interviewed <option data-content="<span class='label label-success'>Hired</span>">Hired <option data-content="<span class='label label-danger'>Archived</span>">Archived </select> </h4>
                                <h5>Front-end developer</h5> </div>
                            <div class="header-meta"> <span class="location">Seattle, WA</span> <span class="rate">$50 per hour</span> </div>
                        </header>
                        <footer>
                            <div class="status"><strong>Applied on:</strong> July 16, 2016</div>
                            <div class="action-btn"> <a class="btn btn-xs btn-gray" href="#">Download CV</a> <a class="btn btn-xs btn-gray" data-toggle="modal" data-target="#modal-contact" href="#">Contact</a> <a class="btn btn-xs btn-danger" href="#">Delete</a> </div>
                        </footer>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <a href="resume-detail.htm">
                                <?php echo $this->html->image('/template/img/avatar-3.jpg', array('alt' => '', 'class' => 'resume-avatar')); ?>
                            </a>
                            <div class="hgroup">
                                <h4> <a href="resume-detail.htm">Maryam Amiri</a> <select class="form-control selectpicker label-style"> <option data-content="<span class='label label-default'>New</span>">New <option data-content="<span class='label label-warning'>Contacted</span>">Contacted <option data-content="<span class='label label-info'>Interviewed</span>">Interviewed <option data-content="<span class='label label-success'>Hired</span>" selected="">Hired <option data-content="<span class='label label-danger'>Archived</span>">Archived </select> </h4>
                                <h5>Javascript developer</h5> </div>
                            <div class="header-meta"> <span class="location">Fremont, CA</span> <span class="rate">$70 per hour</span> </div>
                        </header>
                        <footer>
                            <div class="status"><strong>Applied on:</strong> July 16, 2016</div>
                            <div class="action-btn"> <a class="btn btn-xs btn-gray" href="#">Download CV</a> <a class="btn btn-xs btn-gray" data-toggle="modal" data-target="#modal-contact" href="#">Contact</a> <a class="btn btn-xs btn-danger" href="#">Delete</a> </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>