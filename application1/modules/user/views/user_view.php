<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>


    <div class="page">
        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>


        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Users</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
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
                <?php if(!empty($get_user_data)): ?>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">User Details</div>
                                    <div class="d-flex"><div class="me-1"><?= go_back() ?></div></div>
                                </div>
                                <div class="card-body"> 
                                    <div class="table-responsive"> 
                                        <table class="table table-bordered">
                                            <tbody>
                                                <?php foreach($get_user_data as $val): ?>
                                                <tr>
                                                    <th>Email</th>
                                                    <td><?= htmlspecialchars($val->email) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Contact Number</th>
                                                    <td><?= htmlspecialchars($val->contact) ?? 'N/A' ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td><?= htmlspecialchars($val->address) ?? 'N/A' ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Created Date</th>
                                                    <td><?= htmlspecialchars($val->created_at) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Profile Picture</th>
                                                    <td>
                                                        <?php if (!empty($val->profile_picture)): ?>
                                                            <img src="<?= base_url('assets/img/profile/' . htmlspecialchars($val->profile_picture)) ?>" 
                                                                width="200" height="200" alt="Profile Picture">
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