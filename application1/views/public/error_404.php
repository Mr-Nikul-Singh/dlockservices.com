<?php require_once(APPPATH.'views/public/includes/header.inc.php'); ?>
        
<!-- start -->
<section class="bg-home d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="text-center">
                    <img src="<?= base_url('assets/public/images/svg/404.svg') ?>" width="400px" class="img-fluid" alt="">

                    <div class="mt-5">
                        <h3>Something is wrong</h3>
                        <p class="text-muted para-desc mx-auto">The page you are looking for was moved, removed, renamed or might never existed.</p>

                        <a href="<?= site_url('/') ?>" class="btn btn-primary mt-2">Go to Home</a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- end -->

</body>
</html>