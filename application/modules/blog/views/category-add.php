<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>


    <div class="page">
        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>


        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Blog</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->



        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">

                <?php if(is_expired()): expired_message();  endif; ?>
                <!-- Start::row-1 -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title"></div>
                                <div class="d-flex"><div class="me-1"><?= go_back() ?></div></div>
                            </div>
                            <div class="card-body">
                                
                                <form class="" action="<?= site_url('leads/add-lead') ?>" method="post">
                                    <?= csrf__() ?>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="categoryName" class="form-label">Category Name</label>
                                            <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="parentCategory" class="form-label">Parent Category</label>
                                            <select class="form-control" id="parentCategory" name="parentCategory">
                                                <option value="">None (Top Level Category)</option>
                                                <option value="technology">Technology</option>
                                                <option value="lifestyle">Lifestyle</option>
                                                <option value="fashion">Fashion</option>
                                                <option value="health">Health</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="categoryDescription" class="form-label">Description</label>
                                        <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="4" placeholder="Enter category description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Add Category</button>
                                    </div>

                                </form>

                            </div>
                         </div>
                    </div>
                </div>
                <!--End::row-1 -->

            </div>
        </div>
        <!-- End::app-content -->


        <?php require_once(APPPATH.'views/admin/includes/partial.footer.inc.php'); ?>

    </div>


<?php require_once(APPPATH.'views/admin/includes/footer.inc.php'); ?>