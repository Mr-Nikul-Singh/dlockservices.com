<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>

<div class="page">
    <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>

    <!-- Page Header -->
    <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
        <h4 class="fw-medium mb-0">Settings</h4>
        <div class="ms-sm-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Settings</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
    
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">Website Settings</div>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('setting/save-setting') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <!-- Site Name -->
                                <div class="mb-4 col-xl-4">
                                    <label for="site_name" class="form-label">Site Name</label>
                                    <input type="text" class="form-control" id="site_name" name="site_name" placeholder="Enter site name" value="<?= set_value('site_name',$get_site_settings->site_name); ?>" required>
                                    <?= form_error('site_name', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <!-- Site Logo -->
                                <div class="mb-4 col-xl-4">
                                    <label for="site_logo" class="form-label">Site Logo</label>
                                    <input type="file" class="form-control" id="site_logo" name="site_logo">
                                    <?= form_error('site_logo', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <!-- Site Favicon -->
                                <div class="mb-4 col-xl-4">
                                    <label for="site_favicon" class="form-label">Site Favicon</label>
                                    <input type="file" class="form-control" id="site_favicon" name="site_favicon">
                                    <?= form_error('site_favicon', '<div class="text-danger">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Meta Title -->
                                <div class="mb-4 col-xl-4">
                                    <label for="meta_title" class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter meta title" value="<?= set_value('meta_title',$get_site_settings->meta_title); ?>" required>
                                    <?= form_error('meta_title', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <!-- Meta Description -->
                                <div class="mb-4 col-xl-12">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description" rows="3" placeholder="Enter meta description" required><?= set_value('meta_description',$get_site_settings->meta_description); ?></textarea>
                                    <?= form_error('meta_description', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <!-- Meta Keywords -->
                                <div class="mb-4 col-xl-12">
                                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter meta keywords" value="<?= set_value('meta_keywords',$get_site_settings->meta_keywords); ?>" required>
                                    <?= form_error('meta_keywords', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <!-- Footer Text -->
                                <div class="mb-4 col-xl-12">
                                    <label for="footer_text" class="form-label">Footer Text</label>
                                    <textarea class="form-control" id="footer_text" name="footer_text" rows="3" placeholder="Enter footer text" required><?= set_value('footer_text',$get_site_settings->footer_text); ?></textarea>
                                    <?= form_error('footer_text', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <!-- Google Analytics Code -->
                                <div class="mb-4 col-xl-12">
                                    <label for="google_analytics" class="form-label">Google Analytics Code</label>
                                    <textarea class="form-control" id="google_analytics" name="google_analytics" rows="3" placeholder="Enter Google Analytics code"><?= set_value('google_analytics',$get_site_settings->google_analytics); ?></textarea>
                                    <?= form_error('google_analytics', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <!-- Google Analytics Code -->
                                <div class="mb-4 col-xl-12">
                                    <label for="google_map_code" class="form-label">Google Map Code</label>
                                    <textarea class="form-control" id="google_map_code" name="google_map_code" rows="3" placeholder="Enter Google Map code"><?= set_value('google_map_code',$get_site_settings->google_map); ?></textarea>
                                    <?= form_error('google_map_code', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <!-- SEO Keywords -->
                                <div class="mb-4 col-xl-12">
                                    <label for="seo_keywords" class="form-label">SEO Keywords</label>
                                    <input type="text" class="form-control" id="seo_keywords" name="seo_keywords" placeholder="Enter SEO keywords" value="<?= set_value('seo_keywords',$get_site_settings->seo_keywords); ?>">
                                    <?= form_error('seo_keywords', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <!-- Save Button -->
                                <div class="col-12 mt-2">
                                    <div class="form-group d-flex">
                                        <button type="submit" class="btn btn-primary me-1 responsive-btn">Save</button>
                                    </div>
                                </div>
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
