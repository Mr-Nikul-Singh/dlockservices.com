<?php require_once(APPPATH.'views/public/includes/header.inc.php'); ?>
<?php require_once(APPPATH.'views/public/includes/light-navbar.inc.php'); ?>

        <!-- Home Start -->
        <section class="bg-half-170 d-table w-100 bg-light" style="background: url('assets/public/images/bg/page.png') top center;" id="home">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="title-heading text-center text-md-start">
                            <h3>About Company</h3>
                            <p class="text-muted para-desc mt-3 mb-0">A quick overview of the Dlockservices hosting platform.</p> 
                            <nav aria-label="breadcrumb" class="d-inline-block mt-4">
                                <ul class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">Dlockservices</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Company</li>
                                </ul>
                            </nav>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 1000 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 0 0 c 0 0 200 50 500 50 s 500 -50 500 -50 v 101 h -1000 v -100 z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- Home End -->

        <!-- Start -->
        <section class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="me-lg-4">
                            <img src="assets/public/images/svg/about.svg" class="img-fluid" alt="">
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-6 col-md-6 col-12 mt-4 pt-2 mt-sm-0 pt-sm-0">
                        <div class="section-title">
                            <h6 class="text-primary">Company Story</h6>
                            <h4 class="title mb-4">Dlock Server Services</h4>
                            <p class="text-muted para-desc">At Dlock Servers Hosting, we believe in providing reliable and efficient server solutions to our clients. Our journey began with a simple goal: to make hosting services accessible and easy to use for everyone.</p>
                            <p class="text-muted para-desc mb-0">Over the years, we have evolved from a small startup into a trusted name in the industry. Our team is dedicated to ensuring that your experience with us is seamless and hassle-free. We understand the importance of having a strong online presence, and we strive to support your business with top-notch server hosting services. With Dlock, you can focus on growing your business while we take care of your hosting needs.</p>
                            <div class="mt-4">
                                <a href="<?= site_url('#plans') ?>" class="btn btn-soft-primary">Get Started <i class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mt-100 mt-60">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center mb-4 pb-2">
                            <h4 class="title mb-4">Why Choose Hosting?</h4>
                            <p class="text-muted mx-auto para-desc mb-0">Unlock your potential and build your online presence with our reliable hosting solutions tailored for every need.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-3 col-md-4 col-12 mt-4 pt-2">
                        <div class="card services serv-primary rounded p-4 bg-light position-relative overflow-hidden border-0">
                            <span class="h1 icon2 text-primary">
                                <i class="uil uil-server"></i>
                            </span>
                            <div class="card-body p-0 content">
                                <h5>Web Servers</h5>
                                <p class="para text-muted mb-0">Reliable web hosting solutions designed to keep your website running smoothly.</p>
                            </div>
                            <div class="big-icon icon-right">
                                <i class="uil uil-server"></i>
                            </div>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-lg-3 col-md-4 col-12 mt-4 pt-2">
                        <div class="card services serv-primary rounded p-4 bg-light position-relative overflow-hidden border-0">
                            <span class="h1 icon2 text-primary">
                                <i class="uil uil-users-alt"></i>
                            </span>
                            <div class="card-body p-0 content">
                                <h5>24/7 Support</h5>
                                <p class="para text-muted mb-0">Our dedicated support team is here to assist you at any time of the day.</p>
                            </div>
                            <div class="big-icon icon-right">
                                <i class="uil uil-users-alt"></i>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-4 col-12 mt-4 pt-2">
                        <div class="card services serv-primary rounded p-4 bg-light position-relative overflow-hidden border-0">
                            <span class="h1 icon2 text-primary">
                                <i class="uil uil-tachometer-fast-alt"></i>
                            </span>
                            <div class="card-body p-0 content">
                                <h5>Fast Performance</h5>
                                <p class="para text-muted mb-0">Experience lightning-fast load times and reliable uptime.</p>
                            </div>
                            <div class="big-icon icon-right">
                                <i class="uil uil-tachometer-fast-alt"></i>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-4 col-12 mt-4 pt-2">
                        <div class="card services serv-primary rounded p-4 bg-light position-relative overflow-hidden border-0">
                            <span class="h1 icon2 text-primary">
                                <i class="uil uil-compact-disc"></i>
                            </span>
                            <div class="card-body p-0 content">
                                <h5>Reliable Uptime</h5>
                                <p class="para text-muted mb-0">We guarantee a high uptime rate to ensure your website is always available.</p>
                            </div>
                            <div class="big-icon icon-right">
                                <i class="uil uil-compact-disc"></i>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-4 col-12 mt-4 pt-2">
                        <div class="card services serv-primary rounded p-4 bg-light position-relative overflow-hidden border-0">
                            <span class="h1 icon2 text-primary">
                                <i class="uil uil-weight"></i>
                            </span>
                            <div class="card-body p-0 content">
                                <h5>Scalable Solutions</h5>
                                <p class="para text-muted mb-0">Easily scale your hosting services as your business grows.</p>
                            </div>
                            <div class="big-icon icon-right">
                                <i class="uil uil-weight"></i>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-4 col-12 mt-4 pt-2">
                        <div class="card services serv-primary rounded p-4 bg-light position-relative overflow-hidden border-0">
                            <span class="h1 icon2 text-primary">
                                <i class="uil uil-invoice"></i>
                            </span>
                            <div class="card-body p-0 content">
                                <h5>Easy Upgrades</h5>
                                <p class="para text-muted mb-0">Upgrading your hosting plan is simple and hassle-free.</p>
                            </div>
                            <div class="big-icon icon-right">
                                <i class="uil uil-invoice"></i>
                            </div>
                        </div>
                    </div><!--end col-->

                    <!-- <div class="col-lg-3 col-md-4 col-12 mt-4 pt-2">
                        <div class="text-center">
                            <a href="javascript:void(0)" class="btn btn-primary">See More <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div> -->
                    <!--end col-->
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
                                        <li class="text-white-50 my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md me-1"></i> Fast Data Read/Write Speeds</li>
                                        <li class="text-white-50 my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md me-1"></i> High-Quality Hardware</li>
                                        <li class="text-white-50 my-2"><i data-feather="arrow-right-circle" class="fea icon-ex-md me-1"></i> Reliable Data Protection</li>
                                    </ul>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end container-->
                    </div><!--end row-->
                </div><!--end div-->
            </div><!--end container-->

            <div class="container mt-100 mt-60">
                <div class="row align-items-center mb-4 pb-2">
                    <div class="col-md-6">
                        <div class="section-title">
                            <h4 class="title mb-md-0 mb-4">Frequently asked <br> questions</h4>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="section-title">
                            <p class="text-muted para-desc mb-0">Create, collaborate, and turn your ideas into incredible products with the definitive platform for digital design.</p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 col-12 mt-4 pt-2">
                        <div class="d-flex">
                            <i data-feather="help-circle" class="fea icon-ex-md text-primary me-2 mt-1"></i>
                            <div class="flex-1">
                                <h5 class="mt-0">What are the benefits of using a dedicated server?</h5>
                                <p class="answer text-muted mb-0">Dedicated servers provide exclusive access to all resources, offering enhanced performance, security, and customization options. They're ideal for high-traffic websites and applications that require reliable uptime and fast processing speeds.</p>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-md-6 col-12 mt-4 pt-2">
                        <div class="d-flex">
                            <i data-feather="help-circle" class="fea icon-ex-md text-primary me-2 mt-1"></i>
                            <div class="flex-1">
                                <h5 class="mt-0"> How do I ensure my server is secure?</h5>
                                <p class="answer text-muted mb-0">To enhance server security, regularly update your software, use strong passwords, implement firewalls, and consider using SSL certificates. Regular backups and monitoring for suspicious activity are also crucial for maintaining security.</p>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-md-6 col-12 mt-4 pt-2">
                        <div class="d-flex">
                            <i data-feather="help-circle" class="fea icon-ex-md text-primary me-2 mt-1"></i>
                            <div class="flex-1">
                                <h5 class="mt-0"> What is the difference between VPS and cloud hosting?</h5>
                                <p class="answer text-muted mb-0">VPS (Virtual Private Server) hosting provides dedicated resources on a physical server, allowing for greater control and performance than shared hosting. Cloud hosting, on the other hand, utilizes multiple servers to distribute resources, offering scalability and redundancy, making it suitable for fluctuating workloads.
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-md-6 col-12 mt-4 pt-2">
                        <div class="d-flex">
                            <i data-feather="help-circle" class="fea icon-ex-md text-primary me-2 mt-1"></i>
                            <div class="flex-1">
                                <h5 class="mt-0"> Can I upgrade my server plan later?</h5>
                                <p class="answer text-muted mb-0">Yes, most hosting providers allow you to upgrade your server plan as your needs grow. You can typically move from shared hosting to VPS or from VPS to dedicated hosting with minimal downtime.
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

            </div><!--end container-->


        </section><!--end section-->
        <section class="py-md-4 py-5 bg-primary">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-6 col-12 text-center text-md-start">
                        <h4 class="text-white title-dark mb-0">Server strating from </h4>
                    </div><!--end col-->
                    <div class="col-lg-3 col-md-3 col-12 mt-4 mt-sm-0 text-center">
                        <div class="d-flex justify-content-center">
                            <span class="h6 text-white-50 mb-0 mt-2">Rs.</span>
                            <span class="price text-light title-dark h1 mb-0">499</span>
                            <span class="h6 text-white-50 align-self-end mb-1">/month</span>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-3 col-md-3 col-12 mt-4 mt-sm-0 text-center text-md-end">
                        <a href="<?= site_url('#plans') ?>" class="btn btn-light">Get Started</a>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

<?php require_once(APPPATH.'views/public/includes/footer.inc.php'); ?>