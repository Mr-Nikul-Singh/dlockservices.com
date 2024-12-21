<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>

    <div class="page">

        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>


        <!-- Page Header -->

        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">

            <h4 class="fw-medium mb-0">Dashboard</h4>

            <div class="ms-sm-1 ms-0">

                <nav>

                    <ol class="breadcrumb mb-0">

                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>

                        <li class="breadcrumb-item active" aria-current="page">View</li>

                    </ol>

                </nav>

            </div>

        </div>

        <!-- Page Header Close -->







        <!-- Start::app-content -->

        <div class="main-content app-content">

            <div class="container-fluid">

                <!-- Start::row-5 -->

                <div class="row">

                    <div class="col-xxl-12 col-xl-12 col-lg">

                        <div class="row sortable-dashboard-widgets">
                            
                          <?php if(is_expired()): expired_message();  endif; ?>

                            <div class="col-xl-3" data-id='2'>

                                <div class="card custom-card">

                                    <div class="card-body">

                                        <div class="d-flex align-items-top">

                                            <div class="me-3">

                                                <span class="avatar avatar-md p-2 bg-primary-transparent">

                                                    <i class="ti ti-users"></i>

                                                </span>

                                            </div>

                                            <div class="flex-fill">

                                                <div class="d-flex mb-1 align-items-top justify-content-between">

                                                    <a href="<?= site_url('user/users') ?>">

                                                        <h5 class="fw-semibold mb-0 lh-1"><?= (!empty($total_donors)) ? $total_donors : '0' ?></h5>

                                                    </a>

                                                    <div class="text-success fw-semibold"><i class="ri-arrow-up-s-fill me-1 align-middle"></i></div>

                                                </div>

                                                <p class="mb-0 fs-10 op-7 text-muted fw-semibold">TOTAL REGISTRATIONS</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-3" data-id='4'>

                                <div class="card custom-card">

                                    <div class="card-body">

                                        <div class="d-flex align-items-top">

                                            <div class="me-3">

                                                <span class="avatar avatar-md p-2 bg-primary-transparent">

                                                    <i class="ti ti-coin"></i>

                                                </span>

                                            </div>

                                            <div class="flex-fill">

                                                <div class="d-flex mb-1 align-items-top justify-content-between">

                                                    <a href="<?= site_url('sales/sales') ?>">

                                                        <h5 class="fw-semibold mb-0 lh-1"><?= (!empty($get_total_events)) ? $get_total_events : '0' ?></h5>

                                                    </a>

                                                    <div class="text-success fw-semibold"><i class="ri-arrow-up-s-fill me-1 align-middle"></i></div>

                                                </div>

                                                <p class="mb-0 fs-10 op-7 text-muted fw-semibold">TOTAL SALES</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-3" data-id='1'>

                                <div class="card custom-card">

                                    <div class="card-body">

                                        <div class="d-flex align-items-top">

                                            <div class="me-3">

                                                <span class="avatar avatar-md p-2 bg-primary-transparent">

                                                    <i class="ti ti-database"></i>

                                                </span>

                                            </div>

                                            <div class="flex-fill">

                                                <div class="d-flex mb-1 align-items-top justify-content-between">

                                                    <a href="<?= site_url('orders/orders') ?>">

                                                        <h5 class="fw-semibold mb-0 lh-1"><?= (!empty($get_blood_requests)) ? $get_blood_requests : '0' ?></h5>

                                                    </a>

                                                    <div class="text-success fw-semibold"><i class="ri-arrow-up-s-fill me-1 align-middle"></i></div>

                                                </div>

                                                <p class="mb-0 fs-10 op-7 text-muted fw-semibold">NEW ORDERS</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-3" data-id='5'>

                                <div class="card custom-card">

                                    <div class="card-body">

                                        <div class="d-flex align-items-top">

                                            <div class="me-3">

                                                <span class="avatar avatar-md p-2 bg-primary-transparent">

                                                   <i class="ti ti-history"></i>

                                                </span>

                                            </div>

                                            <div class="flex-fill">

                                                <div class="d-flex mb-1 align-items-top justify-content-between">

                                                    <a href="<?= site_url('history/login-history') ?>">

                                                        <h5 class="fw-semibold mb-0 lh-1"><?= (!empty($get_login_history)) ? $get_login_history : '0' ?></h5>

                                                    </a>

                                                    <div class="text-success fw-semibold"><i class="ri-arrow-up-s-fill me-1 align-middle"></i></div>

                                                </div>

                                                <p class="mb-0 fs-10 op-7 text-muted fw-semibold">LOGIN HISTORY</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>           

                </div>

                <!-- End::row-5 -->

            </div>

        </div>

        <!-- End::app-content -->


        <?php require_once(APPPATH.'views/admin/includes/partial.footer.inc.php'); ?>


    </div>


<?php require_once(APPPATH.'views/admin/includes/footer.inc.php'); ?>