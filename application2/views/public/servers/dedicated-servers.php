<?php require_once(APPPATH.'views/public/includes/header.inc.php'); ?>
<?php require_once(APPPATH.'views/public/includes/navbar.inc.php'); ?>


    <!-- Home Start -->
    <section class="bg-half-170 d-table w-100 bg-primary" style="background: url('assets/public/images/bg/dedicated.png') top center;" id="home">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <h4 class="heading text-white title-dark mb-3">Dedicated Servers</h4>
                        <p class="text-white-50 para-desc mx-auto mb-0">Power your business with reliable, high-performance dedicated servers designed for speed, security, and full customization to meet your unique needs.</p>
                    
                        <div class="mt-4">
                            <a href="<?= site_url('contact-us') ?>" class="btn btn-primary">Request Call</a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Home End -->

    <!-- Start features -->
    <section class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12">
                    <div class="section-title text-center text-lg-start mb-4 mb-lg-0 pb-2 pb-lg-0">
                        <h4 class="title mb-3">Why Choose a Dedicated Server?</h4>
                        <p class="text-muted para-desc mx-auto mb-0">Our dedicated servers provide the security, speed, and flexibility you need to bring your ideas to life seamlessly.</p>
                        <div class="mt-4">
                            <a href="<?= site_url('contact-us') ?>" class="btn btn-primary">Learn More <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-7 col-md-12">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="row">    
                                <div class="col-lg-12 col-md-12">
                                    <div class="card services serv-primary rounded p-4 bg-light position-relative overflow-hidden border-0">
                                        <span class="h1 icon2 text-primary">
                                            <i class="uil uil-monitor-heart-rate"></i>
                                        </span>
                                        <div class="card-body p-0 content">
                                            <h5>High-Performance Servers</h5>
                                            <p class="para text-muted mb-0">Built for speed and reliability, our servers ensure peak performance even during high demand.</p>
                                        </div>
                                        <div class="big-icon icon-right">
                                            <i class="uil uil-monitor-heart-rate"></i>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div><!--end col-->

                        <div class="col-lg-6 col-md-6 mt-4 mt-lg-0 pt-2 pt-lg-0">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card services serv-primary rounded p-4 bg-light position-relative overflow-hidden border-0">
                                        <span class="h1 icon2 text-primary">
                                            <i class="uil uil-cog"></i>
                                        </span>
                                        <div class="card-body p-0 content">
                                            <h5>Maximum Control</h5>
                                            <p class="para text-muted mb-0">Enjoy full control and customization with our advanced management options and root access.</p>
                                        </div>
                                        <div class="big-icon icon-right">
                                            <i class="uil uil-cog"></i>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-12 col-md-12 mt-4 pt-2">
                                    <div class="card services serv-primary rounded p-4 bg-light position-relative overflow-hidden border-0">
                                        <span class="h1 icon2 text-primary">
                                            <i class="uil uil-users-alt"></i>
                                        </span>
                                        <div class="card-body p-0 content">
                                            <h5>Instant Provisioning</h5>
                                            <p class="para text-muted mb-0">Get your server up and running immediately with our streamlined, hassle-free provisioning.</p>
                                        </div>
                                        <div class="big-icon icon-right">
                                            <i class="uil uil-users-alt"></i>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End features -->


    <!-- Start Pricing -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title mb-3">Dedicated Servers Pricing Plans</h4>
                        <p class="text-muted para-desc mx-auto mb-0">Explore our pricing plans and choose the best option for your needs. We help you bring your ideas to life with our comprehensive solutions.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-5 mt-4 pt-2 text-center">
                    <ul class="nav nav-pills nav-justified flex-sm-row rounded px-0" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link rounded" id="pills-one-tab" data-bs-toggle="pill" href="#pills-one" role="tab" aria-controls="pills-one" aria-selected="false">
                                <div class="text-center py-2">
                                    <img src="<?= base_url('assets/public/images/icons/india.svg') ?>" class="avatar avatar-md-sm" alt="">
                                    <h4 class="title fw-normal mt-3 mb-0">India</h4>
                                </div>
                            </a><!--end nav link-->
                        </li><!--end nav item-->
                    </ul>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-12 mt-4 pt-2">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-one" role="tabpanel" aria-labelledby="pills-one-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive bg-white shadow rounded">
                                        <table class="table table-center table-padding mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom py-3" style="min-width: 200px;">PLANS</th>
                                                    <th class="border-bottom text-center py-3" style="min-width: 160px;">PROCESSOR</th>
                                                    <th class="border-bottom text-center py-3" style="min-width: 160px;">RAM</th>
                                                    <th class="border-bottom text-center py-3" style="min-width: 160px;">DISK</th>
                                                    <th class="border-bottom text-center py-3" style="min-width: 160px;">BANDWIDTH </th>
                                                    <th class="border-bottom text-center py-3" style="min-width: 180px;">PRICE</th>
                                                    <th class="border-bottom text-center py-3" style="min-width: 50px;">BUY NOW</th>
                                                </tr>
                                            </thead>
            
                                            <tbody>
                                                <?php if(!empty($get_plans)): ?>
                                                    <?php foreach($get_plans as $vle): ?>      
                                                <tr>
                                                    <td class="h6"><?= ucwords($vle->plan_name) ?></td>
                                                    <?php $decodeFeatures = json_decode($vle->key_features); ?>
                                                    <?php foreach($decodeFeatures as $key => $vls): ?>
                                                    <td class="text-center"><?= $vls ?></td>
                                                    <?php endforeach; ?>
                                                    <td class="text-center">Rs.<?= ucwords($vle->plan_price) ?>/<?= ucwords($vle->type) ?></td>
                                                    <td class="text-center"><a href="<?= site_url('billing-details/'.$vle->id) ?>" class="btn btn-icon btn-soft-warning"><i data-feather="shopping-cart" class="icons"></i></a></td>
                                                </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                        <div class="text-center border-top py-4">
                                            <p class="text-muted mb-0">Couldn’t find what you’re looking for ? <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#additional-requirement" class="h6 text-primary">Let us know <i class="mdi mdi-arrow-right"></i></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div><!--end teb pane-->
                    </div><!--end col-->
                </div>
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->

    <!-- Modal Start -->
    <div class="modal fade" id="additional-requirement" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded shadow border-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle2">What additional requirements do you have ? </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="login-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                    <input name="name" id="name" type="text" class="form-control" placeholder="Please type here...">
                                </div>
                            </div><!--end col-->
                            <div class="col-md-12">
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                    <input name="email" id="email" type="email" class="form-control" placeholder="Please type here...">
                                </div> 
                            </div><!--end col-->
                            <div class="col-md-12">
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Please share the details </label>
                                    <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Please type here..."></textarea>
                                </div>
                            </div><!--end col-->
                            <div class="col-12 mb-0">
                                <button class="btn btn-primary w-100">Send</button>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form><!--end form-->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <!-- End Pricing -->

    <!-- Specification Start -->
    <section class="section">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title mb-3">Technical Specifications</h4>
                        <p class="text-muted para-desc mx-auto mb-0">Explore the robust features that make our platform the ideal choice for your hosting needs.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-md-4 col-12 mt-4 pt-2">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="h1 text-primary">
                                <i class="uil uil-server"></i>
                            </div>
                            <div class="content">
                                <h5>Dedicated Server Features</h5>
                                <p class="text-muted mb-0">Enjoy high-performance dedicated servers with top-tier security and custom configurations.</p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-4 col-12 mt-4 pt-2">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="h1 text-primary">
                                <i class="uil uil-laptop-cloud"></i>
                            </div>
                            <div class="content">
                                <h5>WHM Control Panel</h5>
                                <p class="text-muted mb-0">Manage your server with ease using the intuitive, industry-standard WHM control panel.</p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-4 col-12 mt-4 pt-2">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="h1 text-primary">
                                <i class="uil uil-envelope-check"></i>
                            </div>
                            <div class="content">
                                <h5>Email Features</h5>
                                <p class="text-muted mb-0">Comprehensive email solutions, including secure protocols and spam filtering, keep your communication seamless.</p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-4 col-12 mt-4 pt-2">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="h1 text-primary">
                                <i class="uil uil-setting"></i>
                            </div>
                            <div class="content">
                                <h5>cPanel Control Panel</h5>
                                <p class="text-muted mb-0">Take full control over your hosting environment with cPanel’s intuitive, powerful features.</p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-4 col-12 mt-4 pt-2">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="h1 text-primary">
                                <i class="uil uil-database"></i>
                            </div>
                            <div class="content">
                                <h5>Programming and Databases</h5>
                                <p class="text-muted mb-0">Support for popular programming languages and databases ensures compatibility and flexibility.</p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-4 col-12 mt-4 pt-2">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="h1 text-primary">
                                <i class="uil uil-globe"></i>
                            </div>
                            <div class="content">
                                <h5>Top-Tier Network</h5>
                                <p class="text-muted mb-0">Experience fast, reliable connectivity with our optimized network infrastructure.</p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title mb-3">Questions About Dedicated Servers?</h4>
                        <p class="text-muted para-desc mx-auto mb-0">Get expert support and resources to build your projects on a powerful, dedicated platform.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row align-items-center d-flex justify-content-center">
                <div class="col-lg-8 col-12 mt-4 pt-2">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item rounded shadow bg-white">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button border-0 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    What are the benefits of using a dedicated server?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse border-0 collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dedicated servers offer high performance, enhanced security, complete control, and reliability, making them ideal for large websites or applications.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item rounded shadow bg-white mt-2">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How do I set up a dedicated server?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse border-0 collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                To set up a dedicated server, choose a hosting provider, select your server specifications, and follow their setup instructions. Most providers offer support to help you.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item rounded shadow bg-white mt-2">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Is a dedicated server secure?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse border-0 collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                Yes, dedicated servers are generally very secure. You can implement advanced security measures, like firewalls and custom configurations, to protect your data.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item rounded shadow bg-white mt-2">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Can I upgrade my dedicated server?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse border-0 collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                Yes, you can upgrade your dedicated server by adding more resources, like RAM or storage, through your hosting provider, but this may require some downtime.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item rounded shadow bg-white mt-2">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    What types of applications can I run on a dedicated server?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse border-0 collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                You can run various applications, including large websites, databases, and high-traffic applications, as well as host multiple smaller sites.

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item rounded shadow bg-white mt-2">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    How is billing structured for dedicated servers?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse border-0 collapse" aria-labelledby="headingSix"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                Billing is typically fixed monthly or annual pricing based on your chosen server specifications, with options for additional services.

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item rounded shadow bg-white mt-2">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    What kind of support do I get with a dedicated server?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse border-0 collapse" aria-labelledby="headingSeven"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                Most hosting providers offer 24/7 support through chat, email, or phone, along with resources to help you manage and optimize your server.
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Specification End -->

<?php require_once(APPPATH.'views/public/includes/footer.inc.php'); ?>