  <!-- Footer Start -->
  <footer class="footer bg-footer">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-md-center">
                            <h4 class="text-light title-dark mb-0">Get In Touch !</h4>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row mt-3 justify-content-center">
                    <div class="col-md-4 mt-4 pt-2">
                        <div class="text-md-center">
                            <div class="icon">
                                <i data-feather="mail" class="fea icon-md text-light title-dark"></i>
                            </div>
                            <div class="content mt-2">
                                <h5 class="title text-light title-dark">Email</h5>
                                <a href="mailto:contact@dlockservices.com" class="text-foot">contact@dlockservices.com</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-4 mt-4 pt-2">
                        <div class="text-md-center">
                            <div class="icon">
                                <i data-feather="phone" class="fea icon-md text-light title-dark"></i>
                            </div>
                            <div class="content mt-2">
                                <h5 class="title text-light title-dark">Phone</h5>
                                <a href="tel:+152534-468-854" class="text-foot">+91 83-0257-4035</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-4 mt-4 pt-2">
                        <div class="text-md-center">
                            <div class="icon">
                                <i data-feather="map-pin" class="fea icon-md text-light title-dark"></i>
                            </div>
                            <div class="content mt-2">
                                <h5 class="title text-light title-dark">Location</h5>
                                <a href="#" class="text-foot">Shanti nagar, mansarovar, Jaipur, 302018 Rajasthan</a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mt-5">
                <div class="footer-bar">
                    <div class="row mt-5">
                        <div class="col-lg-4 col-md-12">
                            <a class="logo-footer h4 mouse-down text-light" href="#home">
                                <img src="images/logo-light.png" height="20" alt="">
                            </a>
                            <p class="mt-4 text-foot">
                                <?= $footerText ?? '' ?>
                            </p>
                            <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                <!-- <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li> -->
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                            </ul><!--end icon-->
                        </div>
    
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-12 mt-4 pt-2 mt-lg-0 pt-lg-0">
                                    <h5 class="text-light title-dark footer-head fw-normal mb-0">Servers</h5>
                                    <ul class="list-unstyled footer-list mt-4">
                                       
                                        <li><a href="<?= site_url('vps-servers') ?>" class="text-foot"><i class="mdi mdi-chevron-right me-1"></i>VPS Server</a></li>
                                        <li><a href="<?= site_url('dedicated-server') ?>" class="text-foot"><i class="mdi mdi-chevron-right me-1"></i>Dedicated Server</a></li>
                                        <li><a href="<?= site_url('cloud-servers') ?>" class="text-foot"><i class="mdi mdi-chevron-right me-1"></i>Cloud Server</a></li>
                                    
                                    </ul>
                                </div>
                                
                                <div class="col-lg-3 col-md-4 col-12 mt-4 pt-2 mt-lg-0 pt-lg-0">
                                    <h5 class="text-light title-dark footer-head fw-normal mb-0">About</h5>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <li><a href="<?= site_url('about') ?>" class="text-foot"><i class="mdi mdi-chevron-right me-1"></i>About us</a></li>
                                        <li><a href="<?= site_url('contact-us') ?>" class="text-foot"><i class="mdi mdi-chevron-right me-1"></i>Contact us</a></li>
                                        <li><a href="<?= site_url('refund-policy') ?>" class="text-foot"><i class="mdi mdi-chevron-right me-1"></i>Refund Policy</a></li>
                                        <li><a href="<?= site_url('terms') ?>" class="text-foot"><i class="mdi mdi-chevron-right me-1"></i>Terms & Services</a></li>
                                        <li><a href="<?= site_url('privacy') ?>" class="text-foot"><i class="mdi mdi-chevron-right me-1"></i>Privacy Policy</a></li>
                                    </ul>
                                </div>
                                
                                <div class="col-lg-6 col-md-4 col-12 mt-4 pt-2 mt-lg-0 pt-lg-0">
                                    <h5 class="text-light title-dark footer-head fw-normal mb-0">Newsletter</h5>
                                    <p class="mt-4 text-foot">Sign up and receive the latest tips via email.</p>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="foot-subscribe position-relative mb-3">
                                                    <label class="text-foot form-label">Write your email <span class="text-danger">*</span></label>
                                                    <input type="email" name="email" id="emailsubscribe" class="form-control rounded" placeholder="Your email : " required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <input type="submit" id="submitsubscribe" name="send" class="btn btn-primary w-100" value="Subscribe">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!--end footer-->
        <footer class="footer footer-line bg-footer">
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-6 col-md-7">
                        <div class="text-sm-start">
                            <p class="mb-0 text-foot">
                            © 2024 Dlock Services. All rights reserved.
                            </p>
                        </div>
                    </div><!--end col-->

                    <div class="col-sm-6 col-md-5 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <ul class="list-unstyled terms-service text-sm-end mb-0 d-">
                            <li class="list-inline-item mb-0"><a href="<?= site_url('privacy') ?>" class="text-foot me-2">Privacy</a></li>
                            <li class="list-inline-item mb-0"><a href="<?= site_url('terms') ?>" class="text-foot me-2">Terms</a></li>
                            <li class="list-inline-item mb-0"><a href="<?= site_url('faq') ?>" class="text-foot me-2">FAQs</a></li>
                            <li class="list-inline-item mb-0"><a href="<?= site_url('contact-us') ?>" class="text-foot">Contact</a></li>
                        </ul>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </footer><!--end footer-->
        <!-- Footer End -->

        <!-- Login Modal Content Start -->
        <div class="modal fade" id="LoginForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content rounded shadow border-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Login </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="login-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" required="" placeholder="Your Email :">
                                    </div>
                                </div><!--end col-->

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" required="" placeholder="Password :">
                                    </div>
                                </div><!--end col-->

                                <div class="col-12">
                                    <div class="d-flex justify-content-between">
                                        <div class="mb-3 d-inline-block">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                            </div>
                                        </div>
                                        <p class="forgot-pass mb-0"><a href="page-forgot-password.html" class="text-dark fw-bold">Forgot password ?</a></p>
                                    </div>
                                </div><!--end col-->
                                <div class="col-12 mb-0">
                                    <button class="btn btn-primary w-100">Sign in</button>
                                </div><!--end col-->
                                <div class="col-12 mt-4 text-center">
                                    <h6 class="mb-0">Or Login With</h6>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-6 mt-4">
                                            <a href="#" class="btn w-100 btn-light bg-facebook"><i class="mdi mdi-facebook"></i> Facebook</a>
                                        </div>
                                        <div class="col-sm-6 mt-4">
                                            <a href="#" class="btn w-100 btn-light"><i class="mdi mdi-google"></i> Google</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <p class="mb-0 mt-3"><small class="text-dark me-2">Don't have an account ?</small> <a href="page-signup.html" class="text-dark fw-bold">Sign Up</a></p>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Modal Content End -->


        <!-- Back to top -->
        <a href="#" class="btn btn-icon btn-soft-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
        <!-- Back to top -->

        <!-- Style switcher -->
        <div id="style-switcher" class="bg-light border p-3 pt-2 pb-2" onclick="toggleSwitcher()">
            <div>
                <h6 class="title text-center">Select Your Color</h6>
                <ul class="pattern">
                    <li class="list-inline-item">
                        <a class="color1" href="javascript: void(0);" onclick="setColor('default')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color2" href="javascript: void(0);" onclick="setColor('violet')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color3" href="javascript: void(0);" onclick="setColor('green')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color4" href="javascript: void(0);" onclick="setColor('blue')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color5" href="javascript: void(0);" onclick="setColor('pink')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color6" href="javascript: void(0);" onclick="setColor('purple')"></a>
                    </li>
                </ul>

                <h6 class="title text-center pt-3 mb-0 border-top">Theme Option</h6>
                <ul class="text-center list-unstyled mb-0">
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary rtl-version t-rtl-light mt-2" onclick="setTheme('style-rtl')">RTL</a></li>
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary ltr-version t-ltr-light mt-2" onclick="setTheme('style')">LTR</a></li>
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary dark-rtl-version t-rtl-dark mt-2" onclick="setTheme('style-dark-rtl')">RTL</a></li>
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary dark-ltr-version t-ltr-dark mt-2" onclick="setTheme('style-dark')">LTR</a></li>
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-dark dark-version t-dark mt-2" onclick="setTheme('style-dark')">Dark</a></li>
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-dark light-version t-light mt-2" onclick="setTheme('style')">Light</a></li>
                </ul>
            </div>
            <div class="bottom d-none">
                <a href="javascript: void(0);" class="settings bg-white shadow d-block"><i class="mdi mdi-cog ms-1 mdi-24px position-absolute mdi-spin text-primary"></i></a>
            </div>
        </div>
        <!-- end Style switcher -->

        
    <?php if(!empty($GoogleAnalyticsCode)): ?>
        <?= $GoogleAnalyticsCode ?>
    <?php endif; ?>
    <!-- javascript -->
    <script src="<?= base_url('assets/public/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/public/js/contact.js') ?>"></script>
    <!-- SLIDER -->
    <script src="<?= base_url('assets/public/js/tiny-slider.js') ?>"></script>
    <script src="<?= base_url('assets/public/js/tiny-slider-init.js') ?>"></script>
    <!-- Icons -->
    <script src="<?= base_url('assets/public/js/feather.min.js') ?>"></script>
    <!-- Switcher -->
    <script src="<?= base_url('assets/public/js/switcher.js') ?>"></script>
    <!-- Main Js -->
    <script src="<?= base_url('assets/public/js/app.js') ?>"></script>
    
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6756a55e4304e3196aef4963/1iel7bv7e';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
        
</body>
</html>