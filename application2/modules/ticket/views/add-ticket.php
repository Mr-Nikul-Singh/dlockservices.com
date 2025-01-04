<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>

<div class="page">
    <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>

    <!-- Page Header -->
    <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
        <h4 class="fw-medium mb-0">Ticket</h4>
        <div class="ms-sm-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Ticket</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                            <div class="card-title">Ticket</div>
                        </div>
                        <div class="card-body">
                            
                            <form action="<?= site_url('ticket/add-ticket') ?>" method="post">
                                <div class="row">
                                    <!-- Subject -->
                                    <div class="mb-4 col-xl-6">
                                        <label for="subject" class="form-label">Subject</label>
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter ticket subject" value="<?= set_value('subject'); ?>">
                                        <small><?= form_error('subject'); ?></small>
                                    </div>

                                    <!-- Category -->
                                    <div class="mb-4 col-xl-6">
                                        <label for="category" class="form-label">Category</label>
                                        <select class="form-control" id="category" name="category">
                                            <option value="">Select Category</option>
                                            <option value="support" <?= set_select('category', 'support'); ?>>Support</option>
                                            <option value="billing" <?= set_select('category', 'billing'); ?>>Billing</option>
                                            <option value="sales" <?= set_select('category', 'sales'); ?>>Sales</option>
                                            <option value="others" <?= set_select('category', 'others'); ?>>Others</option>
                                        </select>
                                        <small><?= form_error('category'); ?></small>
                                    </div>

                                    <!-- Priority -->
                                    <div class="mb-4 col-xl-6">
                                        <label for="priority" class="form-label">Priority</label>
                                        <select class="form-control" id="priority" name="priority">
                                            <option value="">Select Priority</option>
                                            <option value="Low" <?= set_select('priority', 'Low'); ?>>Low</option>
                                            <option value="Medium" <?= set_select('priority', 'Medium'); ?>>Medium</option>
                                            <option value="High" <?= set_select('priority', 'High'); ?>>High</option>
                                            <option value="Critical" <?= set_select('priority', 'Critical'); ?>>Critical</option>
                                        </select>
                                        <small><?= form_error('priority'); ?></small>
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-4 col-xl-6">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="">Select Status</option>
                                            <option value="Open" <?= set_select('status', 'Open'); ?>>Open</option>
                                            <option value="In Progress" <?= set_select('status', 'In Progress'); ?>>In Progress</option>
                                            <option value="Resolved" <?= set_select('status', 'Resolved'); ?>>Resolved</option>
                                            <option value="Closed" <?= set_select('status', 'Closed'); ?>>Closed</option>
                                        </select>
                                        <small><?= form_error('status'); ?></small>
                                    </div>

                                    <!-- Description -->
                                    <div class="mb-4 col-xl-12">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="mytextarea1" name="description" rows="4" placeholder="Enter ticket description..."><?= set_value('description'); ?></textarea>
                                        <small><?= form_error('description'); ?></small>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Create Ticket</button>
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
