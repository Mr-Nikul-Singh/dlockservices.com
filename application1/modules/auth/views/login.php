<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $this->title ?></title>
	<meta content="A powerful CRM software for managing customer relationships, tracking leads, and streamlining your business operations." name="description">
    <meta content="CRM, Customer Relationship Management, Sales Management, Lead Tracking, Real Estate CRM, Business Software" name="keywords">
    <link rel="canonical" href="https://www.racoonpy.com/" />

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets/meta/favicon_1733428599.png') ?>" type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="<?= base_url('assets/js/authentication-main.js') ?>"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="<?= base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" >

    <!-- Style Css -->
    <link href="<?= base_url('assets/css/styles.min.css') ?>" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" >


</head>

<body>


    <div class="page error-bg" id="particles-js-">
        <div class="container">
            <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                    <!-- <div class="my-5 d-flex justify-content-center">
                        <a href="<?= site_url('/') ?>">
                            <img src="<?= base_url('assets/logo/logo.svg') ?>" alt="logo" class="desktop-logo" width="100">
                            <img src="<?= base_url('assets/logo/logo.svg') ?>" alt="logo" class="desktop-dark" width="100">
                        </a>
                    </div> -->
                    <div class="card custom-card rectangle2-">
                        <form action="<?= site_url('auth/login') ?>" method="post">
                        <?= csrf__() ?>
                        <div class="card-body p-5 rectangle3-">
                             <?= $login_error ?>
                            <p class="h4 fw-semibold mb-2 text-center">Sign In</p>
                            <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome back</p>
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="signin-username" class="form-label text-default-">Username</label>
                                    <input type="text" name="username" value="<?= set_value('username') ?>"  placeholder="Username" autocomplete="off" class="form-control form-control-lg" id="signin-username">
                                    <small><?= form_error('username') ?></small>
                                </div>
                                <div class="col-xl-12">
                                    <label for="signin-pin" class="form-label text-default-">PIN</label>
                                    <input type="text" name="secret_pin" value="<?= set_value('secret_pin') ?>" class="form-control form-control-lg" id="signin-pin" placeholder="Secret PIN" pattern="[a-zA-Z0-9]+" title="Only alphanumeric characters are allowed" autocomplete="off">
                                    <small><?= form_error('secret_pin') ?></small>
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label for="signin-password" class="form-label text-default- d-block">Password<a href="reset-password-basic.html" class="float-end text-primary d-none">Forget password ?</a></label>
                                    <div class="input-group">
                                        <input type="password" name="password" placeholder="Password" autocomplete="off"  class="form-control form-control-lg" id="signin-password">
                                        <button class="btn btn-light bg-transparent" type="button" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                    <small><?= form_error('password') ?></small>
                                    <div class="mt-2 d-none">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                Remember password ?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    
                                    <button type="submit" class="btn btn-lg btn-primary-dark">Sign In</button>
                                </div>
                            </div>
                            <!-- <div class="text-center">
                                <p class="fs-12 text-muted mt-3">Dont have an account? <a href="sign-up-basic.html" class="text-primary">Sign Up</a></p>
                            </div>
                            <div class="text-center my-3 authentication-barrier">
                                <span>OR</span>
                            </div>
                            <div class="btn-list text-center">
                                <button class="btn btn-icon btn-light btn-wave waves-effect waves-light">
                                    <i class="ri-facebook-line fw-bold "></i>
                                </button>
                                <button class="btn btn-icon btn-light  btn-wave waves-effect waves-light">
                                    <i class="ri-google-line fw-bold "></i>
                                </button>
                                <button class="btn btn-icon btn-light  btn-wave waves-effect waves-light">
                                    <i class="ri-twitter-line fw-bold "></i>
                                </button>
                            </div> -->
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom-Switcher JS -->
    <script src="<?= base_url('assets/js/custom-switcher.min.js') ?>"></script>

    <!-- Bootstrap JS -->
    <script src="<?=  base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Show Password JS -->
    <script src="<?= base_url('assets/js/show-password.js') ?>"></script>

</body>
</html> 