<?php require_once(APPPATH.'views/public/includes/header.inc.php'); ?>
<?php require_once(APPPATH.'views/public/includes/navbar.inc.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Bootstrap CSS -->

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('<?= base_url('assets/public/banner/dlock_banner_16.svg') ?>'); background-size: contain; background-position: center;">
            </div>
            <div class="carousel-item" style="background-image: url('<?= base_url('assets/public/banner/dlock_banner_2.svg') ?>'); background-size: contain; background-position: center;">
            </div>
            <div class="carousel-item" style="background-image: url('<?= base_url('assets/public/banner/dlock_banner_3.jpg') ?>'); background-size: contain; background-position: center;">
            </div>
            <div class="carousel-item" style="background-image: url('<?= base_url('assets/public/banner/dlock_banner_4.jpg') ?>'); background-size: contain; background-position: center;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <br>
    <br>
    <div class="d-flex justify-content-center my-6">
        <a href="#plans" class="btn btn-primary mx-1 btn-roundb">Get Started</a>
        <a href="<?= site_url('contact-us') ?>" class="btn btn-light mx-1 btn-roundb btn-roundb-2">Contact Us</a>
    </div>

        
 

        <!-- Home Start -->
        <section class="bg-half-260 d-table w-100 bg-primary d-none" style="background: url('assets/public/images/bg/bg1.png') top center;" id="home">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-12">
                        <div class="title-heading text-center">
                            <h4 class="heading text-white title-dark mb-3">All-in-One Server Services (VPS, Cloud, Dedicated)</h4>
                            <p class="text-white-50 para-desc mx-auto mb-0">Build, share, and bring your ideas to life with a complete solution for web server.</p>

                            <div class="mt-4">
                                <a href="#plans" class="btn btn-primary mx-1">Get Started</a>
                                <a href="<?= site_url('contact-us') ?>" class="btn btn-light mx-1">Contact Us</a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Home End -->

     
        <!-- Services Start -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center mb-4 pb-2">
                            <h4 class="title mb-3">Server Services</h4>
                            <p class="text-muted para-desc mx-auto mb-0">We help you build, share, and bring your ideas to life using our reliable server services.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="card services p-4 rounded-pill border-0">
                            <div class="icon text-center mb-4">
                                <img src="assets/public/images/icons/vps.svg" alt="">
                            </div>
                            <div class="card-body p-0 content">
                                <h5 class="mb-3"><a href="<?= site_url('vps-servers') ?>" class="title text-dark">VPS Server</a></h5>
                                <p class="text-muted mb-3">Our VPS servers offer flexible and powerful hosting solutions for your business.</p>
                                <a href="<?= site_url('vps-servers') ?>" class="text-primary">Read More <i data-feather="chevron-right" class="fea icon-sm"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="card services p-4 rounded-pill border-0">
                            <div class="icon text-center mb-4">
                                <img src="assets/public/images/icons/dedicated.svg" alt="">
                            </div>
                            <div class="card-body p-0 content">
                                <h5 class="mb-3"><a href="<?= site_url('dedicated-server') ?>" class="title text-dark">Dedicated Server</a></h5>
                                <p class="text-muted mb-3">Our dedicated servers provide full control and high performance for your applications.</p>
                                <a href="<?= site_url('dedicated-server') ?>" class="text-primary">Read More <i data-feather="chevron-right" class="fea icon-sm"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="card services p-4 rounded-pill border-0">
                            <div class="icon text-center mb-4">
                                <img src="assets/public/images/icons/cloud.svg" alt="">
                            </div>
                            <div class="card-body p-0 content">
                                <h5 class="mb-3"><a href="<?= site_url('cloud-servers') ?>" class="title text-dark">Cloud Server</a></h5>
                                <p class="text-muted mb-3">Our cloud servers are designed for easy scaling and reliable performance.</p>
                                <a href="<?= site_url('cloud-servers') ?>" class="text-primary">Read More <i data-feather="chevron-right" class="fea icon-sm"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container-fluid mt-100 mt-60">
                <div class="rounded-pill bg-primary py-5 px-4">
                    <div class="row py-md-5 py-4">
                        <div class="container">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="section-title">
                                        <h6 class="text-white title-dark mb-3">Powered by SSD</h6>
                                        <h2 class="text-white title-dark mb-0">100% Faster Solid State Drive Server</h2>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-6 col-md-6 col-12 mt-4 pt-2 mt-sm-0 pt-sm-0">
                                    <ul class="list-unstyled mb-0 ms-lg-5">
                                        <li class="text-white my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md me-1"></i> Fast Data Read/Write Speeds</li>
                                        <li class="text-white my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md me-1"></i> High-Quality Hardware</li>
                                        <li class="text-white my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md me-1"></i> Reliable Data Protection</li>
                                    </ul>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end container-->
                    </div><!--end row-->
                </div><!--end div-->
            </div><!--end container-->

            <div class="container mt-100 mt-60">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="me-lg-5">
                            <img src="assets/public/images/svg/server-performance.svg" class="img-fluid" alt="">
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-6 col-md-6 col-12 mt-4 pt-2 mt-sm-0 pt-sm-0">
                        <div class="ms-lg-5">
                            <div class="d-flex services serv-primary rounded align-items-center p-4 bg-light position-relative overflow-hidden">
                                <span class="h1 icon2 text-primary">
                                    <i class="uil uil-swatchbook"></i>
                                </span>
                                <div class="flex-1 content ms-3">
                                    <h5>Enhance Security</h5>
                                    <p class="para text-muted mb-0">We focus on keeping your data safe with strong security measures.</p>
                                </div>
                                <div class="big-icon">
                                    <i class="uil uil-swatchbook"></i>
                                </div>
                            </div>

                            <div class="d-flex services serv-primary rounded align-items-center p-4 bg-light mt-4 position-relative overflow-hidden">
                                <span class="h1 icon2 text-primary">
                                    <i class="uil uil-tachometer-fast-alt"></i>
                                </span>
                                <div class="flex-1 content ms-3">
                                    <h5>High Performance</h5>
                                    <p class="para text-muted mb-0">Our servers ensure your applications run quickly and smoothly.</p>
                                </div>
                                <div class="big-icon">
                                    <i class="uil uil-tachometer-fast-alt"></i>
                                </div>
                            </div>

                            <div class="d-flex services serv-primary rounded align-items-center p-4 bg-light mt-4 position-relative overflow-hidden">
                                <span class="h1 icon2 text-primary">
                                    <i class="uil uil-user-check"></i>
                                </span>
                                <div class="flex-1 content ms-3">
                                    <h5>Unbeatable Support</h5>
                                    <p class="para text-muted mb-0">Our support team is always ready to help you with any issues.</p>
                                </div>
                                <div class="big-icon">
                                    <i class="uil uil-user-check"></i>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mt-100 mt-60">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12 order-1 order-md-2">
                        <div class="ms-lg-5">
                            <img src="assets/public/images/svg/quick-response.svg" class="img-fluid" alt="">
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-6 col-md-6 col-12 mt-4 pt-2 mt-sm-0 pt-sm-0 order-2 order-md-1">
                        <div class="section-title me-lg-5">
                            <h4 class="title mb-3">Quick Response <br> and Secure Server</h4>
                            <p class="text-muted para-desc mx-auto mb-0">We provide a platform where your ideas can flourish.</p>

                            <ul class="list-unstyled text-muted mt-3">
                                <li class="my-2"><i data-feather="check-circle" class="fea icon-ex-md text-primary me-2"></i>Digital Marketing Solutions for Tomorrow</li>
                                <li class="my-2"><i data-feather="check-circle" class="fea icon-ex-md text-primary me-2"></i>Experienced Marketing Team</li>
                                <li class="my-2"><i data-feather="check-circle" class="fea icon-ex-md text-primary me-2"></i>Customize to Fit Your Brand</li>
                            </ul>
                            <a href="javascript:void(0)" class="mt-4 text-primary">Find Out More <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                    </div><!--end col-->
                </div>
            </div>
        </section>



        <!-- Price Start -->
        <section class="section bg-light" id="plans">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center mb-4 pb-2">
                            <h4 class="title mb-3">Popular Pricing Plans</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Explore our pricing plans and choose the best option for your needs. We help you bring your ideas to life with our comprehensive solutions.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->


                <div class="row">   
                    <?php if(!empty($get_plans)): ?>
                    <?php foreach($get_plans as $vle): ?>              
                        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                            <div class="card pricing hosting-rate border-0 rounded overflow-hidden">
                                <div class="plan-name p-4 border-bottom">
                                    <h4 class="title mb-3"><?= ucwords($vle->plan_name) ?></h4>
                                    <!-- <p class="para text-muted mb-0">We offers a <strong>free month</strong> of service for new customers.</p> -->
                                </div>
                                <div class="card-body p-4">
                                    <div class="d-flex mb-3">
                                        <span class="h6 text-muted mb-0 mt-2">Rs.</span>
                                        <span class="price text-primary h1 mb-0"><?= ucwords($vle->plan_price) ?></span>
                                        <span class="h6 text-muted align-self-end mb-1">/<?= ucwords($vle->type) ?></span>
                                    </div>                                                    
                                    <ul class="feature-list list-unstyled mb-0">
                                        <?php $decodeFeatures = json_decode($vle->key_features); ?>
                                        <?php foreach($decodeFeatures as $key => $vls): ?>
                                            <li class="text-muted"><i class="mdi mdi-arrow-right text-primary me-2"></i><span class="fw-bold"><?= $key ?></span> <?= $vls ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <a href="<?= site_url('billing-details/'.$vle->id) ?>" class="btn btn-primary mt-4">Buy Now</a>
                                </div>
                            </div>
                        </div><!--end col-->
                    <?php endforeach; ?>
                    <?php endif; ?>
                    
                    <div class="col-12 mt-4 pt-2 text-center">
                        <div class="alert alert-light alert-pills mb-0 shadow" role="alert">
                            <span class="badge rounded-pill bg-primary me-1">Pricing</span>
                            <span class="content"> <a href="javascript:void(0)" class="text-primary">See plan details</a> And Pricing for more Details</span>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Price End -->
        
        <!-- CLient and faq Start -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center mb-4 pb-2">
                            <h4 class="title mb-3">Customer Reviews</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Discover what our valued customers have to say about their experiences with us and how we helped bring their visions to life.</p>

                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row justify-content-center">
                    <div class="col-lg-7 mt-4">
                        <div class="tiny-single-item">
                            <?php if(!empty($get_reviews)): ?>
                                <?php foreach($get_reviews as $reviewl): ?>
                                    <div class="tiny-slide">
                                        <div class="card border-0 text-center client-bar m-2">
                                            <div class="card-body content rounded-pill  px-4 py-5 shadow position-relative">
                                                <i class="mdi mdi-format-quote-open icons text-primary"></i>
                                                <p class="text-muted mb-0"><?= decode($reviewl->review_text) ?></p>
                                            </div>
                                            <?php if(!empty($reviewl->image)): ?>
                                                <img src="<?= base_url('assets/reviews/'.$reviewl->image) ?>" class="avatar avatar-md-md mt-4 testi-img rounded-circle shadow mx-auto" alt="">
                                            <?php else: ?>
                                                <img src="<?= base_url('assets/icons/user_placeholder.png') ?>" class="avatar avatar-md-md mt-4 testi-img rounded-circle shadow mx-auto" alt="">
                                            <?php endif; ?>
                                            <h6 class="text-primary mt-2 mb-0"><?= $reviewl->reviewer_name ?></h6>
                                            <!-- <small class="text-muted">C.E.O</small> -->
                                             <center>
                                                 <p class="">
                                                     <?php for ($i = 1; $i <= 5; $i++): ?>
                                                         <?php if ($i <= $reviewl->rating): ?>
                                                             <i class="fas fa-star text-warning"></i> <!-- Filled star -->
                                                         <?php else: ?>
                                                             <i class="far fa-star text-warning"></i> <!-- Empty star -->
                                                         <?php endif; ?>
                                                     <?php endfor; ?>
                                                 </p>
                                             </center>
                                        </div>  
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mt-100 mt-60">

                <div class="accordion mt-4 pt-2" id="accordionExamplethree">
                    <div class="accordion-item rounded shadow bg-white">
                        <h2 class="accordion-header" id="headingOneo">
                            <button class="accordion-button border-0 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneo"
                                aria-expanded="true" aria-controls="collapseOneo">
                                Features
                            </button>
                        </h2>
                        <div id="collapseOneo" class="accordion-collapse border-0 collapse show" aria-labelledby="headingOneo"
                            data-bs-parent="#accordionExamplethree">
                            <div class="accordion-body">
                                <ul class="list-unstyled mb-0">
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>CentOS 6/CentOS 7/Ubuntu 16.04/Fedora 23/Debian 8</li>
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>Multiple locations</li>
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>Private Network</li>
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>Quick VNC access</li>
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>rDNS support</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded shadow bg-white mt-2">
                        <h2 class="accordion-header" id="headingTwoo">
                            <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwoo" aria-expanded="false" aria-controls="collapseTwoo">
                                Performance
                            </button>
                        </h2>
                        <div id="collapseTwoo" class="accordion-collapse border-0 collapse" aria-labelledby="headingTwoo"
                            data-bs-parent="#accordionExamplethree">
                            <div class="accordion-body">
                                <ul class="list-unstyled mb-0">
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>Top notch network built with Tier 1 ISPs</li>
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>SSD Storage</li>
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>Tier IV Data Center</li>
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>Neustar’s DDoS protection</li>
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>Backed by Juniper Networks</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded shadow bg-white mt-2">
                        <h2 class="accordion-header" id="headingThreeo">
                            <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThreeo" aria-expanded="false" aria-controls="collapseThreeo">
                                Boosters
                            </button>
                        </h2>
                        <div id="collapseThreeo" class="accordion-collapse border-0 collapse" aria-labelledby="headingThreeo"
                            data-bs-parent="#accordionExamplethree">
                            <div class="accordion-body">
                                <ul class="list-unstyled mb-0">
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>cPanel (only with CentOS 7)</li>
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>Plesk Onyx</li>
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>WHMCS</li>
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>SAN Storage</li>
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>CDN</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded shadow bg-white mt-2">
                        <h2 class="accordion-header" id="headingFouro">
                            <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFouro" aria-expanded="false" aria-controls="collapseFouro">
                                Semi-Managed Support
                            </button>
                        </h2>
                        <div id="collapseFouro" class="accordion-collapse border-0 collapse" aria-labelledby="headingFouro"
                            data-bs-parent="#accordionExamplethree">
                            <div class="accordion-body">
                                <ul class="list-unstyled mb-0">
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>Free cPanel Migrations</li>
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>Plesk Migrations</li>
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>Boot, Login, Network, Hardware, Rebuild</li>
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>Basic server optimisation, patching & hardening</li>
                                    <li class="text-muted my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md text-primary me-2"></i>Basic setup of Applications & Firewall</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-title mt-5" id="general">
                    <h4>General Questions</h4>
                </div>

                <div class="accordion mt-4 pt-2" id="accordionExample">

                    <div class="accordion-item rounded shadow bg-white">
                        <h2 class="accordion-header" id="headingOne0">
                            <button class="accordion-button border-0 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne0"
                                aria-expanded="true" aria-controls="collapseOne0">
                                How do I pick the right hosting plan?
                            </button>
                        </h2>
                        <div id="collapseOne0" class="accordion-collapse border-0 collapse show" aria-labelledby="headingOne0"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Think about what you need. For small websites or blogs, shared hosting works well. If your site gets more visitors or needs more power, go for VPS or cloud hosting. For big projects with high traffic, a dedicated server is the best option.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item rounded shadow bg-white">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button border-0 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                What is Dedicated Server?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse border-0 collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded shadow bg-white mt-2">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Do I need a Dedicated Server?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse border-0 collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded shadow bg-white mt-2">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                How can I get my website transferred for free?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse border-0 collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded shadow bg-white mt-2">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                What level of access do I get with my Dedicated Server?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse border-0 collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded shadow bg-white mt-2">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Which control panels are provided?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse border-0 collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded shadow bg-white mt-2">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Do you offer any billing panels?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse border-0 collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded shadow bg-white mt-2">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                How long will it take for my server to be ready for use?
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse border-0 collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded shadow bg-white mt-2">
                        <h2 class="accordion-header" id="headingEight">
                            <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                How do I access my Dedicated Server?
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse border-0 collapse" aria-labelledby="headingEight"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-title mt-5" id="payment">
                    <h4>Payments Questions</h4>
                </div>

                <div class="accordion mt-4 pt-2" id="accordionExampletwo">
                    <div class="accordion-item rounded shadow bg-white">
                        <h2 class="accordion-header" id="headingfiveo">
                            <button class="accordion-button border-0 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefiveo"
                                aria-expanded="true" aria-controls="collapsefiveo">
                                How our Dlockservices work ?
                            </button>
                        </h2>
                        <div id="collapsefiveo" class="accordion-collapse border-0 collapse show" aria-labelledby="headingfiveo"
                            data-bs-parent="#accordionExampletwo">
                            <div class="accordion-body">
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded shadow bg-white mt-2">
                        <h2 class="accordion-header" id="headingsix">
                            <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                What is the main process open account ?
                            </button>
                        </h2>
                        <div id="collapsesix" class="accordion-collapse border-0 collapse" aria-labelledby="headingsix"
                            data-bs-parent="#accordionExampletwo">
                            <div class="accordion-body">
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded shadow bg-white mt-2">
                        <h2 class="accordion-header" id="headingseven">
                            <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                                How to make unlimited data entry ?
                            </button>
                        </h2>
                        <div id="collapseseven" class="accordion-collapse border-0 collapse" aria-labelledby="headingseven"
                            data-bs-parent="#accordionExampletwo">
                            <div class="accordion-body">
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded shadow bg-white mt-2">
                        <h2 class="accordion-header" id="headingeight">
                            <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                                Is Dlockservices safer to use with my account ?
                            </button>
                        </h2>
                        <div id="collapseeight" class="accordion-collapse border-0 collapse" aria-labelledby="headingeight"
                            data-bs-parent="#accordionExampletwo">
                            <div class="accordion-body">
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded shadow bg-white mt-2">
                        <h2 class="accordion-header" id="headingnine">
                            <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                                How can i contact your technical team ?
                            </button>
                        </h2>
                        <div id="collapsenine" class="accordion-collapse border-0 collapse" aria-labelledby="headingnine"
                            data-bs-parent="#accordionExampletwo">
                            <div class="accordion-body">
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                </div>

            </div><!--end container-->
        </section><!--end section-->
        <!-- CLient and faq End -->

<?php require_once(APPPATH.'views/public/includes/footer.inc.php'); ?>