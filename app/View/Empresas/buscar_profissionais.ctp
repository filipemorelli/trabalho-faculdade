<header class="page-header bg-img"
        style="background-image: url(<?php echo $this->Html->url('/template/img/bg-banner1.jpg');

        ?>)">
    <div class="container page-name">
        <h1 class="text-center">Browse jobs</h1>
        <p class="lead text-center">Use following search box to find jobs that fits you better</p>
    </div>
</header>
<main>
    <section class="no-padding-top bg-alt">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <br>
                    <h5>We found <strong>357</strong> matches, you're watching <i>10</i> to <i>20</i></h5>
                </div>
                <div class="col-md-4">
                    <form style="margin-top: 30px" action="#">
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <input type="text" class="form-control"
                                       placeholder="Keyword: job title, skills, or company"></div>
                            <div class="form-group col-xs-12">
                                <input type="text" class="form-control" placeholder="Location: city, state or zip">
                            </div>
                            <div class="form-group col-xs-12">
                                <select class="form-control selectpicker" multiple="">
                                    <option selected="">All categories</option>
                                    <option>Developer</option>
                                    <option>Designer</option>
                                    <option>Customer service</option>
                                    <option>Finance</option>
                                    <option>Healthcare</option>
                                    <option>Sale</option>
                                    <option>Marketing</option>
                                    <option>Information technology</option>
                                    <option>Others</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-12">
                                <h6>Contract</h6>
                                <div class="checkall-group">
                                    <div class="checkbox">
                                        <input type="checkbox" id="contract1" name="contract" checked="">
                                        <label for="contract1">All types</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="contract2" name="contract">
                                        <label for="contract2">Full-time
                                            <small>(354)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="contract3" name="contract">
                                        <label for="contract3">Part-time
                                            <small>(284)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="contract4" name="contract">
                                        <label for="contract4">Internship
                                            <small>(169)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="contract5" name="contract">
                                        <label for="contract5">Freelance
                                            <small>(480)</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <h6>Hourly rate</h6>
                                <div class="checkall-group">
                                    <div class="checkbox">
                                        <input type="checkbox" id="rate1" name="rate" checked="">
                                        <label for="rate1">All rates</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="rate2" name="rate">
                                        <label for="rate2">$0 - $50
                                            <small>(364)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="rate3" name="rate">
                                        <label for="rate3">$50 - $100
                                            <small>(684)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="rate4" name="rate">
                                        <label for="rate4">$100 - $200
                                            <small>(195)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="rate5" name="rate">
                                        <label for="rate5">$200+
                                            <small>(39)</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <h6>Academic degree</h6>
                                <div class="checkall-group">
                                    <div class="checkbox">
                                        <input type="checkbox" id="degree1" name="degree" checked="">
                                        <label for="degree1">All degrees</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="degree2" name="degree">
                                        <label for="degree2">Associate degree
                                            <small>(216)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="degree3" name="degree">
                                        <label for="degree3">Bachelor's degree
                                            <small>(569)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="degree4" name="degree">
                                        <label for="degree4">Master's degree
                                            <small>(439)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="degree5" name="degree">
                                        <label for="degree5">Doctoral degree
                                            <small>(84)</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="button-group">
                            <div class="action-buttons">
                                <button class="btn btn-primary">Apply filter</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="item-block" href="resume-detail.htm">
                                <header>
                                    <?php echo $this->Html->image('/template/img/avatar-1.jpg', array(
                                        'class' => 'resume-avatar',
                                        'alt'   => '',
                                        'title' => ''
                                    )); ?>
                                    <div class="hgroup">
                                        <h4>Bikesh Soltanian</h4>
                                        <h5>Java developer</h5>
                                    </div>
                                </header>
                                <div class="item-body">
                                    <p>I develop well-designed, accessible, and standards-based web sites and
                                        applications. Highly effective communicator and team leader with a proven track
                                        record of delivering quality work on time and within budget working as a remote
                                        employee.</p>
                                    <div class="tag-list"><span>J2EE</span> <span>J2SE</span> <span>Android</span></div>
                                </div>
                                <footer>
                                    <ul class="details cols-2">
                                        <li><i class="fa fa-map-marker"></i> <span>Fairfield, IA</span></li>
                                        <li><i class="fa fa-money"></i> <span>$60 / hour</span></li>
                                    </ul>
                                </footer>
                            </a>
                        </div>
                        <div class="col-md-12">
                            <a class="item-block" href="resume-detail.htm">
                                <header>
                                    <?php echo $this->Html->image('/template/img/avatar-2.jpg', array(
                                        'class' => 'resume-avatar',
                                        'alt'   => '',
                                        'title' => ''
                                    )); ?>
                                    <div class="hgroup">
                                        <h4>Chris Hernandeziyan</h4>
                                        <h5>.Net developer</h5></div>
                                </header>
                                <div class="item-body">
                                    <p>I develop well-designed, accessible, and standards-based web sites and
                                        applications. Highly effective communicator and team leader with a proven track
                                        record of delivering quality work on time and within budget working as a remote
                                        employee.</p>
                                    <div class="tag-list"><span>VB.Net</span> <span>C#</span> <span>WPF</span> <span>ASP.Net</span>
                                        <span>MVC.Net</span></div>
                                </div>
                                <footer>
                                    <ul class="details cols-2">
                                        <li><i class="fa fa-map-marker"></i> <span>Seattle, WA</span></li>
                                        <li><i class="fa fa-money"></i> <span>$50 / hour</span></li>
                                    </ul>
                                </footer>
                            </a>
                        </div>
                        <div class="col-md-12">
                            <a class="item-block" href="resume-detail.htm">
                                <header>
                                    <?php echo $this->Html->image('/template/img/avatar-3.jpg', array(
                                        'class' => 'resume-avatar',
                                        'alt'   => '',
                                        'title' => ''
                                    )); ?>
                                    <div class="hgroup">
                                        <h4>Mary Amiri</h4>
                                        <h5>Quality assurance</h5></div>
                                </header>
                                <div class="item-body">
                                    <p>I develop well-designed, accessible, and standards-based web sites and
                                        applications. Highly effective communicator and team leader with a proven track
                                        record of delivering quality work on time and within budget working as a remote
                                        employee.</p>
                                    <div class="tag-list"><span>Testcase</span> <span>Unit test</span>
                                        <span>jUnit</span> <span>Git</span></div>
                                </div>
                                <footer>
                                    <ul class="details cols-2">
                                        <li><i class="fa fa-map-marker"></i> <span>Fremont, CA</span></li>
                                        <li><i class="fa fa-money"></i> <span>$70 / hour</span></li>
                                    </ul>
                                </footer>
                            </a>
                        </div>
                        <div class="col-md-12">
                            <a class="item-block" href="resume-detail.htm">
                                <header>
                                    <?php echo $this->Html->image('/template/img/avatar-4.jpg', array(
                                        'class' => 'resume-avatar',
                                        'alt'   => '',
                                        'title' => ''
                                    )); ?>
                                    <div class="hgroup">
                                        <h4>Sarah Luizgarden</h4>
                                        <h5>UI/UX developer</h5></div>
                                </header>
                                <div class="item-body">
                                    <p>I develop well-designed, accessible, and standards-based web sites and
                                        applications. Highly effective communicator and team leader with a proven track
                                        record of delivering quality work on time and within budget working as a remote
                                        employee.</p>
                                    <div class="tag-list"><span>HTML5</span> <span>CSS3</span> <span>Bootstrap</span>
                                        <span>Photoshop</span></div>
                                </div>
                                <footer>
                                    <ul class="details cols-2">
                                        <li><i class="fa fa-map-marker"></i> <span>Columbus, OH</span></li>
                                        <li><i class="fa fa-money"></i> <span>$45 / hour</span></li>
                                    </ul>
                                </footer>
                            </a>
                        </div>
                        <div class="col-xs-12">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>