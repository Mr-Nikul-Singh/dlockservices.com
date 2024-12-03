<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>


    <div class="page">
        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>


        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Blog</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Blog</a></li>
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
                                
                                <form class="" action="<?= site_url('blog/edit-blog/'.$id) ?>" method="post">
                                    <?= csrf__() ?>
                                  
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="blogTitle" class="form-label">Blog Title</label>
                                            <input type="text" class="form-control" id="blogTitle" name="blog_title" value="<?= set_value('blog_title',$get_blog_data[0]->blog_title) ?>" placeholder="Enter blog title">
                                            <small><?= form_error('blog_title') ?></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="blogContent" class="form-label">Blog Content</label>
                                            <textarea class="form-control" id="mytextarea1" name="content" rows="6" placeholder="Enter blog content"><?= set_value('content',$get_blog_data[0]->content) ?></textarea>
                                            <small><?= form_error('content') ?></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="blogCategory" class="form-label">Category</label>
                                            <select name="category" id="p-holder4" class="js-example-placeholder-single form-control">
                                                <option value="">Select</option>
                                                <?php foreach($get_parent_categories as $msp): ?>
                                                <optgroup label="<?= $msp->name ?>">
                                                    <?php foreach($get_categories as $val): ?>
                                                        <?php if($val->is_parent == $msp->id): ?>
                                                            <option value="<?= $val->id ?>" <?= set_select('category',$val->id) ?> <?= $get_blog_data[0]->category_id == $val->id ? 'selected' : '' ?>><?= $val->name ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </optgroup>
                                                <?php endforeach; ?>
                                            </select>
                                            <small><?= form_error('category') ?></small>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="blogTags" class="form-label">Tags</label>
                                            <input type="text" class="form-control" id="blogTags" name="tags" value="<?= set_value('tags',$get_blog_data[0]->tags) ?>" placeholder="Enter blog tags (comma-separated)">
                                            <small><?= form_error('tags') ?></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="blogAuthor" class="form-label">Author</label>
                                            <input type="text" class="form-control" id="blogAuthor" name="author" value="<?= set_value('author',$get_blog_data[0]->author) ?>" placeholder="Enter author name">
                                            <small><?= form_error('author') ?></small>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="blogStatus" class="form-label">Status</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="draft"  <?= $get_blog_data[0]->status == 'draft' ? 'selected' : '' ?>>Draft</option>
                                                <option value="publish"  <?= $get_blog_data[0]->status == 'publish' ? 'selected' : '' ?>>Published</option>
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