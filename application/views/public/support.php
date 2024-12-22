<?php require_once(APPPATH.'views/public/includes/header.inc.php'); ?>
<?php require_once(APPPATH.'views/public/includes/light-navbar.inc.php'); ?>


<div class="container mt-100 mt-60 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Ticket</div>
                </div>
                <div class="card-body">
                    
                    <form action="<?= site_url('add-ticket') ?>" method="post">
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
</div>


<?php require_once(APPPATH.'views/public/includes/footer.inc.php'); ?>