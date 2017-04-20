    <!-- Page header -->
    <header class="page-header bg-img" style="background-image: url(<?php echo $this->Html->url('/template/img/bg-banner1.jpg'); ?>)">
      <div class="container page-name">
        <h1 class="text-center">Pesquisar Vagas</h1>
        <p class="lead text-center">Use o filtro de pesquisa para encontrar trabalhos que melhor se adaptem a você.</p>
      </div>
    </header>
    <!-- END Page header -->


    <!-- Main container -->
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
                      <input type="text" class="form-control" placeholder="Keyword: job title, skills, or company">
                    </div>

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
                          <label for="contract2">Full-time <small>(354)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="contract3" name="contract">
                          <label for="contract3">Part-time <small>(284)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="contract4" name="contract">
                          <label for="contract4">Internship <small>(169)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="contract5" name="contract">
                          <label for="contract5">Freelance <small>(480)</small></label>
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
                          <label for="rate2">$0 - $50 <small>(364)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="rate3" name="rate">
                          <label for="rate3">$50 - $100 <small>(684)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="rate4" name="rate">
                          <label for="rate4">$100 - $200 <small>(195)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="rate5" name="rate">
                          <label for="rate5">$200+ <small>(39)</small></label>
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
                          <label for="degree2">Associate degree <small>(216)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="degree3" name="degree">
                          <label for="degree3">Bachelor's degree <small>(569)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="degree4" name="degree">
                          <label for="degree4">Master's degree <small>(439)</small></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="degree5" name="degree">
                          <label for="degree5">Doctoral degree <small>(84)</small></label>
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
                <!-- Job item -->
                <div class="col-xs-12">
                  <a class="item-block" href="job-detail.htm">
                    <header>
                      <?php echo $this->Html->image('/template/img/logo-google.jpg', array('alt' => '', 'title' => ''));?>
                      <div class="hgroup">
                        <h4>Senior front-end developer</h4>
                        <h5>Google <span class="label label-success">Full-time</span></h5>
                      </div>
                      <time datetime="2016-03-10 20:00">34 min ago</time>
                    </header>

                    <div class="item-body">
                      <p>A rapidly growing, well established marketing firm is looking for an experienced web developer for a full-time position. In this role, you will develop websites, apps, emails and other forms of digital electronic media, all while maintaining brand standards across design projects and other marketing communication materials.</p>
                    </div>

                    <footer>
                      <ul class="details cols-3">
                        <li>
                          <i class="fa fa-map-marker"></i>
                          <span>Menlo Park, CA</span>
                        </li>

                        <li>
                          <i class="fa fa-money"></i>
                          <span>$90,000 - $110,000 / year</span>
                        </li>

                        <li>
                          <i class="fa fa-certificate"></i>
                          <span>Master or Bachelor</span>
                        </li>
                      </ul>
                    </footer>
                  </a>
                </div>
                <!-- END Job item -->


                <!-- Job item -->
                <div class="col-xs-12">
                  <a class="item-block" href="job-detail.htm">
                    <header>
                      <?php echo $this->Html->image('/template/img/logo-linkedin.png', array('alt' => '', 'title' => ''));?>
                      <div class="hgroup">
                        <h4>Software Engineer (Entry or Senior)</h4>
                        <h5>Linkedin <span class="label label-warning">Part-time</span></h5>
                      </div>
                      <time datetime="2016-03-10 20:00">8 hours ago</time>
                    </header>

                    <div class="item-body">
                      <p>The Special Programs Department II is seeking to hire a Computer Scientist to augment our software development team. Members of the software development team are expected to follow established software engineering principles to methodically deliver mission application software.</p>
                    </div>

                    <footer>
                      <ul class="details cols-3">
                        <li>
                          <i class="fa fa-map-marker"></i>
                          <span>Livermore, CA</span>
                        </li>

                        <li>
                          <i class="fa fa-money"></i>
                          <span>$60,000 - $75,000 / year</span>
                        </li>

                        <li>
                          <i class="fa fa-certificate"></i>
                          <span>Master or Bachelor</span>
                        </li>
                      </ul>
                    </footer>
                  </a>
                </div>
                <!-- END Job item -->


                <!-- Job item -->
                <div class="col-xs-12">
                  <a class="item-block" href="job-detail.htm">
                    <header>
                      <?php echo $this->Html->image('/template/img/logo-envato.png', array('alt' => '', 'title' => ''));?>
                      <div class="hgroup">
                        <h4>Full Stack Web Developer</h4>
                        <h5>Envato <span class="label label-info">Freelance</span></h5>
                      </div>
                      <time datetime="2016-03-10 20:00">2 days ago</time>
                    </header>

                    <div class="item-body">
                      <p>We're seeing a driven, curious, passionate full-stack web developer to help change how people learn creative skills and effortlessly create the images they imagine. You’ll be part of a new rapid prototyping and development team helping to apply lean startup development methodologies and modern web technologies to shape the future of Creative Cloud.</p>
                    </div>

                    <footer>
                      <ul class="details cols-3">
                        <li>
                          <i class="fa fa-map-marker"></i>
                          <span>San Francisco, CA</span>
                        </li>

                        <li>
                          <i class="fa fa-money"></i>
                          <span>$105,000 / year</span>
                        </li>

                        <li>
                          <i class="fa fa-certificate"></i>
                          <span>Master</span>
                        </li>
                      </ul>
                    </footer>
                  </a>
                </div>
                <!-- END Job item -->


                <!-- Job item -->
                <div class="col-xs-12">
                  <a class="item-block" href="job-detail.htm">
                    <header>
                      <?php echo $this->Html->image('/template/img/logo-facebook.png', array('alt' => '', 'title' => ''));?>
                      <div class="hgroup">
                        <h4>Web Applications Developer</h4>
                        <h5>Facebook <span class="label label-danger">Internship</span></h5>
                      </div>
                      <time datetime="2016-03-10 20:00">Feb 26, 2016</time>
                    </header>

                    <div class="item-body">
                      <p>Client needs a back-end Java developer who has worked mainly on Java, J2EE, Spring, Web Services, and other Java related technologies.</p>
                    </div>

                    <footer>
                      <ul class="details cols-3">
                        <li>
                          <i class="fa fa-map-marker"></i>
                          <span>Lexington, MA</span>
                        </li>

                        <li>
                          <i class="fa fa-money"></i>
                          <span>$130,000 - $150,000 / year</span>
                        </li>

                        <li>
                          <i class="fa fa-certificate"></i>
                          <span>Ph.D. or Master</span>
                        </li>
                      </ul>
                    </footer>
                  </a>
                </div>
                <!-- END Job item -->


                <!-- Job item -->
                <div class="col-xs-12">
                  <a class="item-block" href="job-detail.htm">
                    <header>
                      <?php echo $this->Html->image('/template/img/logo-microsoft.jpg', array('alt' => '', 'title' => ''));?>
                      <div class="hgroup">
                        <h4>Sr. SQL Server Developer</h4>
                        <h5>Microsoft <span class="label label-success">Remote</span></h5>
                      </div>
                      <time datetime="2016-03-10 20:00">Feb 16, 2016</time>
                    </header>

                    <div class="item-body">
                      <p>Understand and model complex business requirements into database schemas and work with existing databases in SQL and NOSQL data stores. Develop high performance stored procedures, triggers and other database level code to provide data services to other teams.</p>
                    </div>

                    <footer>
                      <ul class="details cols-3">
                        <li>
                          <i class="fa fa-map-marker"></i>
                          <span>Palo Alto, CA</span>
                        </li>

                        <li>
                          <i class="fa fa-money"></i>
                          <span>$125,000 - $140,000 / year</span>
                        </li>

                        <li>
                          <i class="fa fa-certificate"></i>
                          <span>Ph.D. or Master</span>
                        </li>
                      </ul>
                    </footer>
                  </a>
                </div>
                <!-- END Job item -->

                
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
    <!-- END Main container -->