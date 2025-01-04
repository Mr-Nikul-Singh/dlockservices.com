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
                        <li class="breadcrumb-item active" aria-current="page">View</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->



        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">


                <!-- Start::row-1 -->
                <?php if(!empty($get_donor_data)): ?>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">Retailer Details</div>
                                    <div class="d-flex"><div class="me-1"><?= go_back() ?></div></div>
                                </div>
                                <div class="card-body"> 
                                    <div class="table-responsive"> 
                                        <table class="table table-bordered">
                                            <tbody>
                                                <?php foreach($get_donor_data as $val): ?>
                                                <tr>
                                                    <th>Owner Name</th>
                                                    <td><?= $val->full_name ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Shop Name</th>
                                                    <td><?= $val->shop_name ?></td>
                                                </tr>
                                                <tr>
                                                    <th>GST No.</th>
                                                    <td><?= $val->gst ?></td>
                                                </tr>
                                                <tr>
                                                    <th>DRUG No.</th>
                                                    <td><?= $val->drug_no ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td><?= $val->email ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Contact Number</th>
                                                    <td><?= $val->mobile_no ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td><?= decode($val->address) ?? 'N/A' ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Created Date</th>
                                                    <td><?= $val->created_at ?></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?php if(!empty($val->profile_picture)): ?>
                                                            <img src="<?= base_url('assets/img/profile/'.$val->profile_picture) ?>" width="200" height="200px" alt="">
                                                        <?php else: ?>
                                                            <p>Profile image not exist!</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                        <?= no_record() ?>
                    <?php endif; ?>
                    
                <!--End::row-1 -->

            </div>
        </div>
        <!-- End::app-content -->


        <?php require_once(APPPATH.'views/admin/includes/partial.footer.inc.php'); ?>

    </div>


<?php require_once(APPPATH.'views/admin/includes/footer.inc.php'); ?>