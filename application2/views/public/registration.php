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
                                  
                                    <div class="card login-page border-0 shadow mt-4" style="z-index: 1">
                                        <div class="card-body p-4">
                                            <h4 class="card-title text-center">Signup</h4>  
                                            <form class="login-form mt-4" action="<?= site_url('registration') ?>" method="POST">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3 position-relative">                                               
                                                            <label class="form-label">First name <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="First Name" value="<?= set_value('fname') ?>" name="fname" required="">
                                                            <small><?= form_error('fname') ?></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3 position-relative">                                                
                                                            <label class="form-label">Last name <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Last Name" value="<?= set_value('lname') ?>" name="lname" required="">
                                                            <small><?= form_error('lname') ?></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                            <input type="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>" name="email" required="">
                                                            <small><?= form_error('email') ?></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label">Password <span class="text-danger">*</span></label>
                                                            <input type="password" class="form-control" placeholder="Password" name="password" required="">
                                                            <small><?= form_error('password') ?></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="d-flex mb-3 justify-content-between">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="terms" type="checkbox" value="1" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">I Accept <a href="#" class="text-primary">Terms And Condition</a></label>
                                                            </div>
                                                        </div>
                                                        <small><?= form_error('terms') ?></small>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button class="btn btn-primary w-100" type="submit">Register</button>
                                                    </div>
                                                    <div class="col-lg-12 mt-4 text-center d-none">
                                                        <h6>Or Signup With</h6>
                                                        <ul class="list-unstyled social-icon mb-0 mt-3">
                                                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="github" class="fea icon-sm fea-social"></i></a></li>
                                                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="gitlab" class="fea icon-sm fea-social"></i></a></li>
                                                        </ul><!--end icon-->
                                                    </div>
                                                    <div class="mx-auto">
                                                        <p class="mb-0 mt-3"><small class="text-dark me-2">Already have an account ?</small> <a href="<?= site_url('login') ?>" class="text-dark fw-bold">Sign in</a></p>
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