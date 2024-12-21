<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>


    <div class="page">
        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>


        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Login history</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">History</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Details</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->



        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">


                <!-- Start::row-1 -->
                <?php if(!empty($get_login_history_details)): ?>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">Login History Details</div>
                                    <div class="d-flex"><div class="me-1"><?= go_back() ?></div></div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive"> 
                                        <table class="table text-nowrap table-striped table-hover">
                                            <tbody> 
                                                <?php foreach($get_login_history_details as $val): ?>
                                                <tr>
                                                    <th>Email/Mobile</th>
                                                    <td><?= $val->email ?></td>
                                                </tr>
                                                <tr>
                                                    <th>System IP</th>
                                                    <td><?= $val->system_ip ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Device Information</th>
                                                    <td><?= $val->device_info ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Error Type</th>
                                                    <td><?= $val->error_type ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td><?= ($val->status == 'success') ? '<span class="badge bg-success">'.$val->status.'</span>' : '<span class="bdage bg-danger">'.$val->status.'</span>' ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Date</th>
                                                    <td><?= $val->created_at ?></td>
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
                    
                    <?php if(!empty($get_login_history_details[0]->location_details)): ?>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Location Details</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap table-striped table-hover">
                                            <tbody> 
                                                <?php foreach(json_decode($get_login_history_details[0]->location_details) as $key => $val): ?>
                                             
                                                <tr>
                                                    <th><?= ucfirst($key) ?></th>
                                                    <td><?= $val ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <!--End::row-1 -->

            </div>
        </div>
        <!-- End::app-content -->


        <?php require_once(APPPATH.'views/admin/includes/partial.footer.inc.php'); ?>

    </div>


<?php require_once(APPPATH.'views/admin/includes/footer.inc.php'); ?>