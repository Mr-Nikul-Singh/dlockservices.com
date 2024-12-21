<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>

<div class="page">
    <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>

    <!-- Page Header -->
    <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
        <h4 class="fw-medium mb-0">Reviews</h4>
        <div class="ms-sm-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Review</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
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
                            <div class="card-title">Reviews</div>
                        </div>
                        <div class="card-body">
                            
                            <form action="<?= site_url('review/edit-review/'.$get_reviews->id) ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- Reviewer Name -->
                                    <div class="mb-4 col-xl-6">
                                        <label for="reviewer_name" class="form-label">Reviewer Name</label>
                                        <input type="text" class="form-control" id="reviewer_name" name="reviewer_name" placeholder="Enter your name" 
                                            value="<?= set_value('reviewer_name',$get_reviews->reviewer_name); ?>" required>
                                        <?= form_error('reviewer_name', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <!-- Rating -->
                                    <div class="mb-4 col-xl-6">
                                        <label for="rating" class="form-label">Rating</label>
                                        <select class="form-control" id="rating" name="rating" required>
                                            <option value="">Select Rating</option>
                                            <option value="1" <?= set_select('rating', '1'); ?> <?= ($get_reviews->rating == '1') ? 'selected' : '' ?>>1</option>
                                            <option value="2" <?= set_select('rating', '2'); ?> <?= ($get_reviews->rating == '2') ? 'selected' : '' ?>>2</option>
                                            <option value="3" <?= set_select('rating', '3'); ?> <?= ($get_reviews->rating == '3') ? 'selected' : '' ?>>3</option>
                                            <option value="4" <?= set_select('rating', '4'); ?> <?= ($get_reviews->rating == '4') ? 'selected' : '' ?>>4</option>
                                            <option value="5" <?= set_select('rating', '5'); ?> <?= ($get_reviews->rating == '5') ? 'selected' : '' ?>>5</option>
                                        </select>
                                        <?= form_error('rating', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <!-- Review Text -->
                                    <div class="mb-4 col-xl-12">
                                        <label for="review_text" class="form-label">Review</label>
                                        <textarea class="form-control" id="review_text" name="review_text" rows="4" placeholder="Enter your review here..." required><?= set_value('review_text',$get_reviews->review_text); ?></textarea>
                                        <?= form_error('review_text', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <!-- Image Upload -->
                                    <div class="mb-4 col-xl-12">
                                        <label for="review_image" class="form-label">Upload Image</label>
                                        <input type="file" class="form-control" id="review_image" name="review_image" accept="image/*">
                                        <?= form_error('review_image', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit Review</button>
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
