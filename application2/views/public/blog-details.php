<?php require_once(APPPATH.'views/public/includes/header.inc.php'); ?>
<?php require_once(APPPATH.'views/public/includes/light-navbar.inc.php'); ?>


        <!-- Home Start -->
        <section class="bg-half-170 d-table w-100 bg-light" style="background: url('assets/public/images/bg/page.png') top center;"  id="home">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="title-heading text-center text-md-start">
                            <h3><?= decode($get_blog->blog_title) ?></h3>
                            <!-- <p class="text-muted para-desc mt-3 mb-0">Brief details of working with hosting</p>  -->
                            <nav aria-label="breadcrumb" class="d-inline-block mt-4">
                                <ul class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">Dlockservices</a></li>
                                    <li class="breadcrumb-item"><a href="<?= site_url('blog') ?>">Blog</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
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
                    <div class="col-lg-8 col-md-7 col-12">
                        <div class="card blog-post border-0 shadow rounded overflow-hidden">
                            <img src="images/blog/single.jpg" class="img-fluid" alt="">

                            <div class="card-body p-4 content">
                                <?= decode($get_blog->content) ?>
                                <ul class="list-unstyled post-meta d-flex justify-content-between align-items-center mb-0 pt-3 border-top">
                                    <li class="d-none">
                                        <ul class="list-unstyled mb-0">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="like text-dark"><i data-feather="heart" class="fea icon-sm"></i> 34</a></li>
                                            <li class="list-inline-item ms-2"><a href="javascript:void(0)" class="comment text-dark"><i data-feather="message-circle" class="fea icon-sm"></i> 08</a></li>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <ul class="list-unstyled social-icon mb-0">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                        </ul><!--end icon-->
                                    </li>
                                </ul>
                            </div>
                        </div><!--end blog post-->

                        <!-- Comments Start -->
                        <div class="row d-none">
                            <div class="col-12 mt-4 pt-2">
                                <div class="section-title">
                                    <h5 class="mb-0">Comments :</h5>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                        <!-- Leave Comments Start -->
                        <div class="row">
                            <div class="col-12 mt-4 pt-2">
                                <div class="section-title">
                                    <h5 class="mb-0">Leave A Comment :</h5>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-12 mt-4 pt-2">
                                <form class="p-4 shadow rounded">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Your Comment</label>
                                                <textarea id="message" placeholder="Your Comment" rows="5" name="message" class="form-control" required=""></textarea>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                                <input id="name" name="name" type="text" placeholder="Name" class="form-control" required="">
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                <input id="email" type="email" placeholder="Email" name="email" class="form-control" required="">
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-12">
                                            <div class="send">
                                            <button type="submit" class="btn w-100 btn-primary">Send Comment</button>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form><!--end form-->
                            </div><!--end col-->
                        </div><!--end row-->
                        <!-- Leave Comments End -->
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-5 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="sidebar component-wrapper mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <!-- SEARCH -->
                            <div class="widget mb-4 pb-2">
                                <div id="search2" class="widget-search mb-0">
                                    <form role="search" method="get" id="searchform" class="searchform">
                                        <div>
                                            <input type="text" class="border rounded" name="s" id="s" placeholder="Search Keywords...">
                                            <input type="submit" id="searchsubmit" value="Search">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- SEARCH -->

                            <!-- CATAGORIES -->
                            <div class="widget mb-4 pb-2">
                                <h4 class="widget-title">Catagories</h4>
                                <div class="p-4 mt-4 rounded shadow">
                                    <ul class="list-unstyled mb-0 catagory">
                                    <?php if(!empty($get_category)): ?>
                                    <?php foreach($get_category as $cator): ?>
                                        <li><a href="jvascript:void(0)"><?= $cator->name ?></a> <span class="float-end"></span></li>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- CATAGORIES -->

                            <!-- TAG CLOUDS -->
                            <div class="widget mb-4 pb-2">
                                <h4 class="widget-title">Tags Cloud</h4>
                                <div class="tagcloud p-4 mt-4 rounded shadow">
                                    <?php if (!empty($get_blog->tags)): ?>
                                        <?php 
                                            $tags = explode(',', $get_blog->tags); // Split the tags by comma
                                            foreach ($tags as $tag): 
                                        ?>
                                            <a href="<?= site_url('blog-view/'.$slug) ?>" class="rounded"><?= htmlspecialchars($tag); ?></a>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p>No tags available.</p>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <!-- TAG CLOUDS -->
                            
                            <!-- SOCIAL -->
                            <div class="widget">
                                <h4 class="widget-title">Follow us</h4>
                                <div class="pt-4 px-4 pb-3 mt-4 rounded shadow">
                                    <ul class="list-unstyled social-icon social mb-0">
                                        <li class="list-inline-item"><a href="jvascript:void(0)" class="rounded"><i class="mdi mdi-facebook"></i></a></li>
                                        <li class="list-inline-item"><a href="jvascript:void(0)" class="rounded"><i class="mdi mdi-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="jvascript:void(0)" class="rounded"><i class="mdi mdi-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="jvascript:void(0)" class="rounded"><i class="mdi mdi-vimeo"></i></a></li>
                                        <li class="list-inline-item"><a href="jvascript:void(0)" class="rounded"><i class="mdi mdi-linkedin"></i></a></li>
                                        <li class="list-inline-item"><a href="jvascript:void(0)" class="rounded"><i class="mdi mdi-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- SOCIAL -->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mt-100 mt-60 d-none">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center mb-4 pb-2">
                            <h4 class="title mb-4">Related Blog Post</h4>
                            <p class="text-muted mx-auto para-desc mb-0">Create, collaborate, and turn your ideas into incredible products with the definitive platform for digital design.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="card blog-post border-0 shadow rounded overflow-hidden">
                            <img src="images/blog/01.jpg" class="img-fluid" alt="">
                            <div class="card-body p-4 content">
                                <h5><a href="javascript:void(0)" class="title text-dark">Quickly formulate backend</a></h5>
                                <p class="text-muted mb-3">This is required when, for example, the final text is not yet available.</p>
                                <ul class="list-unstyled post-meta d-flex justify-content-between mb-0 pt-3 border-top">
                                    <li>
                                        <ul class="list-unstyled mb-0">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="like text-dark"><i data-feather="heart" class="fea icon-sm"></i> 34</a></li>
                                            <li class="list-inline-item ms-2"><a href="javascript:void(0)" class="comment text-dark"><i data-feather="message-circle" class="fea icon-sm"></i> 08</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)" class="read-more text-dark">Read More <i class="mdi mdi-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="card blog-post border-0 shadow rounded overflow-hidden">
                            <img src="images/blog/02.jpg" class="img-fluid" alt="">
                            <div class="card-body p-4 content">
                                <h5><a href="javascript:void(0)" class="title text-dark">Progressively visualize enabled</a></h5>
                                <p class="text-muted mb-3">This is required when, for example, the final text is not yet available.</p>
                                <ul class="list-unstyled post-meta d-flex justify-content-between mb-0 pt-3 border-top">
                                    <li>
                                        <ul class="list-unstyled mb-0">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="like text-dark"><i data-feather="heart" class="fea icon-sm"></i> 34</a></li>
                                            <li class="list-inline-item ms-2"><a href="javascript:void(0)" class="comment text-dark"><i data-feather="message-circle" class="fea icon-sm"></i> 08</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)" class="read-more text-dark">Read More <i class="mdi mdi-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="card blog-post border-0 shadow rounded overflow-hidden">
                            <img src="images/blog/03.jpg" class="img-fluid" alt="">
                            <div class="card-body p-4 content">
                                <h5><a href="javascript:void(0)" class="title text-dark">Credibly implement maximizing</a></h5>
                                <p class="text-muted mb-3">This is required when, for example, the final text is not yet available.</p>
                                <ul class="list-unstyled post-meta d-flex justify-content-between mb-0 pt-3 border-top">
                                    <li>
                                        <ul class="list-unstyled mb-0">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="like text-dark"><i data-feather="heart" class="fea icon-sm"></i> 34</a></li>
                                            <li class="list-inline-item ms-2"><a href="javascript:void(0)" class="comment text-dark"><i data-feather="message-circle" class="fea icon-sm"></i> 08</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)" class="read-more text-dark">Read More <i class="mdi mdi-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

<?php require_once(APPPATH.'views/public/includes/footer.inc.php'); ?>