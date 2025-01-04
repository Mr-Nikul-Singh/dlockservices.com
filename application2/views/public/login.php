<?php require_once(APPPATH.'views/public/includes/header.inc.php'); ?>
<?php require_once(APPPATH.'views/public/includes/light-navbar.inc.php'); ?>

        <br>
        <section class="cover-user bg-white">
            <div class="container-fluid px-0">
                <div class="row no-gutters position-relative">
                
                    <div class="col-lg-12 cover-my-30">
                        <div class="cover-user-img d-flex align-items-center">
                            <div class="row justify-content-center m-0">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <!-- <div class="text-center">
                                        <a href="javascript:void(0)">
                                            <img src="<?= base_url('assets/public/images/logo-dark.png') ?>" height="30" alt="">
                                        </a>
                                    </div> -->

                                    <div class="card login-page border-0 shadow mt-4" style="z-index: 1">
                                        <div class="card-body p-4">
                                            <?= $login_error ?>
                                            <h4 class="card-title text-center">Login</h4>  
                                            <form class="login-form mt-4" action="<?= site_url('login') ?>" method="POST">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                            <input type="email" class="form-control" placeholder="Email" name="email" required="">
                                                            <small><?= form_error('email') ?></small>
                                                        </div>
                                                    </div><!--end col-->
        
                                                    <div class="col-lg-12">
                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label">Password <span class="text-danger">*</span></label>
                                                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                                            <small><?= form_error('password') ?></small>
                                                        </div>
                                                    </div><!--end col-->
        
                                                    <div class="col-lg-12">
                                                        <div class="d-flex mb-3 justify-content-between">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                                            </div>
                                                            <p class="forgot-pass mb-0"><a href="<?= site_url('forgot-password') ?>" class="text-dark fw-bold">Forgot password ?</a></p>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-lg-12 mb-0">
                                                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                                                    </div><!--end col-->
                                                    
                                                    <div class="col-lg-12 mt-4 text-center d-none">
                                                        <h6>Or Login With</h6>
                                                        <ul class="list-unstyled social-icon mb-0 mt-3">
                                                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="github" class="fea icon-sm fea-social"></i></a></li>
                                                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="gitlab" class="fea icon-sm fea-social"></i></a></li>
                                                        </ul><!--end icon-->
                                                    </div><!--end col-->

                                                    <div class="col-12 text-center">
                                                        <p class="mb-0 mt-3"><small class="text-dark me-2">Don't have an account ?</small> <a href="<?= site_url('registration') ?>" class="text-dark fw-bold">Sign Up</a></p>
                                                    </div><!--end col-->
                                                </div><!--end row-->
                                            </form>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div> <!-- end about detail -->
                    </div><!-- end col -->    
                </div><!--end row-->
            </div><!--end container fluid-->
        </section><!--end section-->




<?php require_once(APPPATH.'views/public/includes/footer.inc.php'); ?>