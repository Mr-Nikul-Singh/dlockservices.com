<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>


    <div class="page">
        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>


        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Setting</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Profile</a></li>
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
                <div class="row">
                    <div class="col-xxl-12 col-xl-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body d-sm-flex align-items-top p-4   main-profile-cover">
                                <?php foreach($get_users as  $val): ?>
                                <p class="avatar avatar-xxl avatar-rounded online me-3 my-auto">
                                    <img src="<?= (!empty($val->profile_picture)) ? base_url('assets/img/profile/'.$val->profile_picture) : base_url('assets/icons/holder5.png') ?>" alt="">
                                </p>
                                <div class="flex-fill main-profile-info my-auto">
                                    <h5 class="fw-semibold mb-1 "><?= $val->full_name ?></h5>
                                    <div>
                                        <p class="mb-1 text-muted"><?= $val->occupation ?></p>
                                        <div class="fs-12 op-7 mb-0 d-flex">
                                            <p class="me-3 mb-0"><i class="ri-building-line me-1 align-middle d-inline-flex"></i><?= $val->city ?></p>
                                            <p class="mb-0" title="<?= $val->address ?>"><i class="ri-map-pin-line me-1 align-middle d-inline-flex"></i><?= truncate_text($val->address,120) ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-profile-info ms-auto">
                                    <div class=" d-none">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex mb-0 ms-auto">
                                                <div class="me-4">
                                                    <p class="fw-bold fs-20  text-shadow mb-0">113</p>
                                                    <p class="mb-0 fs-12 text-muted ">Projects</p>
                                                </div>
                                                <div class="me-4">
                                                    <p class="fw-bold fs-20  text-shadow mb-0">12.2k</p>
                                                    <p class="mb-0 fs-12 text-muted ">Followers</p>
                                                </div>
                                                <div class="">
                                                    <p class="fw-bold fs-20  text-shadow mb-0">128</p>
                                                    <p class="mb-0 fs-12 text-muted ">Following</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-0  mt-2 text-end">
                                        <a href="<?= site_url('setting/profile-update') ?>" class="btn btn-primary btn-sm btn-wave"><i class="ri-edit-line me-1 align-middle"></i>UPDATE</a>
                                    </div>

                                </div>
                                <?php endforeach; ?>
                             </div>
                        </div>
                    </div>
                    <div class="col-xxl-12">
                        <div class="card custom-card">
                           <div class="">
                            <div class="p-4 border-bottom border-block-end-dashed d-none">
                                <div>
                                    <!-- <p class="fs-15 mb-2 fw-semibold">COMMINTION RATE : <span class="text-primary fs-18"><?= $val->commission_rate.'%' ?></span></p> -->
                                    <p class="fw-semibold mb-2">Profile 60% completed - <a href="javscript:void(0);" class="text-primary fs-12">Finish now</a></p>
                                    <div class="progress progress-sm progress-animate ">
                                       <div class="progress-bar bg-primary  ronded-1" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="p-4 border-bottom border-block-end-dashed">
                                <div class="">
                                    <p class="fs-15 mb- fw-semibold">Professional Bio :</p>
                                    <p class="fs-12 text-muted op-7 mb-0">
                                        I am <b class="text-default"><?= $val->note ?>,</b> 
                                    </p>
                                </div>
                            </div> -->
                            <div class="p-4  border-bottom border-block-end-dashed">
                                <p class="fs-15 mb-2 me-4 fw-semibold">Personal Info :</p>
                                <ul class="list-group">
                                    <li class="list-group-item border-0">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <div class="me-2 fw-semibold">
                                                Name :
                                            </div>
                                            <span class="fs-12 text-muted"><?= $val->full_name ?></span>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <div class="me-2 fw-semibold">
                                                Email :
                                            </div>
                                            <span class="fs-12 text-muted"><?= $val->email ?></span>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <div class="me-2 fw-semibold">
                                                Phone :
                                            </div>
                                            <span class="fs-12 text-muted">+91<?= $val->contact ?></span>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <div class="me-2 fw-semibold">
                                                Occupation :
                                            </div>
                                            <span class="fs-12 text-muted"><?= $val->occupation ?></span>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <div class="me-2 fw-semibold">
                                                Age :
                                            </div>
                                            <span class="fs-12 text-muted"><?= @$val->age ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="p-4 border-bottom border-block-end-dashed">
                                <p class="fs-15 mb-2 me-4 fw-semibold">Contact Information :</p>
                                <div class="text-muted">
                                    <p class="mb-3">
                                        <span class="avatar avatar-sm avatar-rounded me-2 bg-info-transparent">
                                            <i class="ri-mail-line align-middle fs-14"></i>
                                        </span>
                                        <?= $val->email ?>
                                    </p>
                                    <p class="mb-3">
                                        <span class="avatar avatar-sm avatar-rounded me-2 bg-warning-transparent">
                                            <i class="ri-phone-line align-middle fs-14"></i>
                                        </span>
                                        +91<?= $val->contact ?>
                                    </p>
                                    <div class="d-flex">
                                        <p class="mb-0">
                                            <span class="avatar avatar-sm avatar-rounded me-2 bg-success-transparent">
                                                <i class="ri-map-pin-line align-middle fs-14"></i>
                                            </span>
                                        </p>
                                        <p class="mb-0">
                                        <?= decode($val->address) ?> </p>

                                    </div>
                                </div>
                            </div>
                    
                            <div class="p-4 border-bottom border-block-end-dashed d-flex align-items-center">
                                <p class="fs-15 mb-2 me-1 fw-semibold">Social Networks :</p>
                                <div class="btn-list mb-0 d-flex">
                                    <button type="button" aria-label="button"  class="btn btn-sm btn-icon btn-info-light btn-wave waves-effect waves-light">
                                        <i class="ri-facebook-line"></i>
                                    </button>
                                    <button type="button" aria-label="button"  class="btn btn-sm btn-icon btn-warning-light btn-wave waves-effect waves-light">
                                        <i class="ri-instagram-line"></i>
                                    </button>
                                    <button type="button" aria-label="button"  class="btn btn-sm btn-icon btn-danger-light btn-wave waves-effect waves-light">
                                        <i class="ri-youtube-line"></i>
                                    </button>
                                </div>
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 d-none">
                        <div class=" custom-card">
                            <div class="card-body p-0">
                                <div class="task-card">
                                    <div class="card custom-card task-pending-card">
                                        <div class="card-body">

                                            <form action="" method="post">
                                                <div class="col-12 mb-3">
                                                    <label for="" class="form-label">Facebook Link</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label for=""  class="form-label">Twitter Link</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label for=""  class="form-label">Instagram Link</label>
                                                    <input type="text" class="form-control">
                                                </div>

                                                <button class="btn btn-primary" type="submit">Update</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
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