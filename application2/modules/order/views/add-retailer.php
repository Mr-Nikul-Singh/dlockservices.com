<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>


    <div class="page">
        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>


        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Retailer</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Retailer</a></li>
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
                                <div class="card-title"></div>
                                <div class="d-flex">
                                    <div class="me-1"><?= go_back() ?></div>
                                </div>
                            </div>
                            <div class="card-body">
                                
                                <form action="<?= site_url('retailer/add-retailer') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                                    <?= csrf__() ?>
                                    
                                    <div class="row">


                                        <div class="col-xl-12">
                                            <div class="row">
                                                
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label">Shop Name</label>
                                                    <input type="text" value="<?= set_value('shop_name') ?>" autocomplete="off" class="form-control" name="shop_name">
                                                    <small><?= form_error('shop_name') ?></small>
                                                </div>
                
                                                <div class="col-xl-3 mb-3">
                                                    <label for="" class="form-label">GST No.</label>
                                                    <input type="text" value="<?= set_value('gst') ?>" class="form-control" name="gst">
                                                    <small><?= form_error('gst') ?></small>
                                                </div>
                                                
                                                <div class="col-xl-3 mb-3">
                                                    <label for="" class="form-label">DRUG Licence No.</label>
                                                    <input type="text" value="<?= set_value('gst') ?>" class="form-control" name="drug_no">
                                                    <small><?= form_error('gst') ?></small>
                                                </div>
                                                
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label">Owner Name</label>
                                                    <input type="text" value="<?= set_value('full_name') ?>" autocomplete="off" class="form-control" name="full_name">
                                                    <small><?= form_error('full_name') ?></small>
                                                </div>

                                                <div class="col-xl-3 mb-3">
                                                    <label for="" class="form-label">Mobile Number</label>
                                                    <input type="text" value="<?= set_value('mobile') ?>" class="form-control" name="mobile">
                                                    <small><?= form_error('mobile') ?></small>
                                                </div>
                                                

                                                <div class="col-xl-3 mb-3">
                                                    <label for="" class="form-label">Email</label>
                                                    <input type="email" value="<?= set_value('email') ?>" autocomplete="off" class="form-control" name="email">
                                                    <small><?= form_error('email') ?></small>
                                                </div>
                                                
                                                <div class="col-xl-3 mb-3">
                                                    <label for="" class="form-label">Password</label>
                                                    <div class="input-group">
                                                        <input type="password" name="password" placeholder="Password" autocomplete="off" class="form-control form-control" id="signin-password">
                                                        <button class="btn btn-light bg-transparent" type="button" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                                    </div>
                                                    <small><?= form_error('password') ?></small>
                                                </div>
                                                
                                                <div class="col-xl-3 mb-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Profile Image <sup class="text-primary">Optional</sup></label>
                                                        <input type="file" class="form-control" name="photo[]">
                                                        <?php if(!empty($error)): ?>
                                                        <?php foreach($error as $vl): ?>
                                                        <small class="text-danger"><?= $vl ?></small><br/>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 mb-3">
                                                    <label for="" class="form-label">Address</label>
                                                    <textarea name="address" class="form-control" rows="3" id=""><?= set_value('address') ?></textarea>
                                                    <small><?= form_error('address') ?></small>
                                                </div>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="" class="form-label">Terms & Conditions</label>
                                                    <textarea name="tnc" class="form-control" rows="3" id=""><?= set_value('tnc') ?></textarea>
                                                    <small><?= form_error('tnc') ?></small>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-12"> 
                                            <div class="form-group">
                                                <button class="btn btn-primary">Save</button>
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