<?php require_once(APPPATH.'views/public/includes/header.inc.php'); ?>
<?php require_once(APPPATH.'views/public/includes/light-navbar.inc.php'); ?>


        <!-- Home Start -->
        <section class="bg-half-170 d-table w-100 bg-light" style="background: url('assets/public/images/bg/page.png') top center;"  id="home">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="title-heading text-center text-md-start">
                            <h3>Blogs & News</h3>
                            <p class="text-muted para-desc mt-3 mb-0">All latest blog and news are here,</p> 
                            <nav aria-label="breadcrumb" class="d-inline-block mt-4">
                                <ul class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">Dlock Services</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
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

        <!-- Blog Start -->
        <section class="section">
            <div class="container">
                <div class="row">
                   <?php if(!empty($get_blog)): ?>
                    <?php foreach($get_blog as $blogi): ?>
                    <div class="col-lg-4 col-md-6 col-12 mb-4 pb-2">
                        <div class="card blog-post border-0 shadow rounded overflow-hidden">
                            <img src="<?= base_url('assets/public/images/blog/02.jpg') ?>" class="img-fluid" alt="">
                            <div class="card-body p-4 content">
                                <h5><a href="<?= site_url('blog-view/'.$blogi->slug_url) ?>" class="title text-dark"><?= decode($blogi->blog_title) ?></a></h5>
                                <!-- <p class="text-muted mb-3"><?= truncate_text(($blogi->content),15) ?></p> -->
                                <ul class="list-unstyled post-meta d-flex justify-content-between mb-0 pt-3 border-top">
                                    <li>
                                        <ul class="list-unstyled mb-0">
                                            <li class="list-inline-item"><a href="<?= site_url('blog-view/'.$blogi->slug_url) ?>" class="like text-dark"><i data-feather="heart" class="fea icon-sm"></i> 34</a></li>
                                            <li class="list-inline-item ms-2"><a href="<?= site_url('blog-view/'.$blogi->slug_url) ?>" class="com<?= base_url('assets/public/images/bg/page.png') ?>ment text-dark"><i data-feather="message-circle" class="fea icon-sm"></i> 08</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?= site_url('blog-view/'.$blogi->slug_url) ?>" class="read-more text-dark">Read More <i class="mdi mdi-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!--end col-->
                    <?php endforeach; ?>
                    <?php endif; ?>

                    <div class="col-12">
                        <ul class="pagination justify-content-center mb-0">
                            <?= $links ?>
                            <!-- <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Previous">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Next">Next</a></li> -->
                        </ul>
                    </div>
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- BLog End -->


<?php require_once(APPPATH.'views/public/includes/footer.inc.php'); ?>