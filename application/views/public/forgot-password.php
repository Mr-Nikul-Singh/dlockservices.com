<?php require_once(APPPATH.'views/public/includes/header.inc.php'); ?>
<?php require_once(APPPATH.'views/public/includes/light-navbar.inc.php'); ?>

        <section class="cover-user bg-white">
            <div class="container-fluid px-0">
                <div class="row no-gutters position-relative">
                  
                    <div class="col-lg-12 cover-my-30 cover-my-30">
                        <div class="cover-user-img d-flex align-items-center">
                            <div class="row justify-content-center m-0">
                                <div class="col-lg-6 col-md-12 col-12">
                                
                                    <div class="card login-page border-0 shadow mt-4" style="z-index: 1">
                                        <div class="card-body p-4">
                                            <h4 class="card-title text-center">Recover Account</h4>  
            
                                            <form class="login-form mt-4">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <p class="text-muted">Please enter your email address. You will receive a link to create a new password via email.</p>
                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label">Email address <span class="text-danger">*</span></label>
                                                            <input type="email" class="form-control" placeholder="Enter Your Email Address" name="email" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <button class="btn btn-primary w-100">Send</button>
                                                    </div>
                                                    <div class="mx-auto">
                                                        <p class="mb-0 mt-3"><small class="text-dark me-2">Remember your password ?</small> <a href="<?= site_url('login') ?>" class="text-dark fw-bold">Sign in</a></p>
                                                    </div>
                                                </div>
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