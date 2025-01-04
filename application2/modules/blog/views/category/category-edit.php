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
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                                
                                <form class="" action="<?= site_url('blog/edit-blog-category/'.$id) ?>" method="post">
                                    <?= csrf__() ?>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="categoryName" class="form-label strong">Category Name</label>
                                            <input type="text" class="form-control" id="categoryName" name="category_name" value="<?= set_value('category_name',$get_category_data[0]->name) ?>" placeholder="Enter category name">
                                            <small><?= form_error('category_name') ?></small>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="parentCategory" class="form-label strong">Parent Category</label>
                                            <select class="form-control" id="parentCategory" name="parent_category">
                                                <option value="">None (Top Level Category)</option>
                                                <?php foreach($get_parent_categories as $vls): ?>
                                                    <option value="<?= $vls->id ?>" <?= set_select('parent_category',$vls->id) ?> <?= ($get_category_data[0]->is_parent == $vls->id) ? 'selected' : '' ?>><?= $vls->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small><?= form_error('parent_category') ?></small>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="categoryDescription" class="form-label strong">Description</label>
                                        <textarea class="form-control" id="categoryDescription" name="description" rows="4" placeholder="Enter category description"><?= set_value('description',$get_category_data[0]->description) ?></textarea>
                                        <small><?= form_error('description') ?></small>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="clientStatus" class="form-label"><strong>Status</strong></label>
                                            <select class="form-control" id="clientStatus" name="status">
                                                <option value="">Select</option>
                                                <option value="active" <?= set_select('status','active') ?> <?= ($get_category_data[0]->status == 'active') ? 'selected' : '' ?>>Active</option>
                                                <option value="inactive" <?= set_select('status','inactive') ?> <?= ($get_category_data[0]->status == 'inactive') ? 'selected' : '' ?>>Inactive</option>
                                            </select>
                                            <small><?= form_error('status') ?></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save</button>
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