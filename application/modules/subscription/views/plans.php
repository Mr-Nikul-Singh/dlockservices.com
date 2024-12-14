<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>


    <div class="page">
        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>


        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Subscriptions</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Plans</a></li>
                        <li class="breadcrumb-item active" aria-current="page">list</li>
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
                            <div class="card-body">


                                <!-- Start:: row-2 -->
                                <div class="row justify-content-center mb-4 mt-4">
                                    <div class="col-xxl-10 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="container-lg">
                                            <!-- <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                    <h5 class="fw-semibold text-center">Upgrade Your Membership</h5>
                                                    <p class="text-muted text-center">Choose plan that suits best for your business needs, Our plans scales with you based on your needs</p>
                                                </div>
                                            </div> -->
                                            <div class="d-flex justify-content-center mb-4 d-none">
                                                <ul class="nav nav-tabs mb-3 tab-style-6 bg-primary-transparent" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="pricing-monthly" data-bs-toggle="tab"
                                                            data-bs-target="#pricing-monthly-pane" type="button" role="tab"
                                                            aria-controls="pricing-monthly-pane" aria-selected="true">Monthly</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="pricing-yearly" data-bs-toggle="tab"
                                                            data-bs-target="#pricing-yearly-pane" type="button" role="tab"
                                                            aria-controls="pricing-yearly-pane" aria-selected="false">Yearly</button>
                                                    </li>
                                                </ul>
                                            </div> 
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane show active p-0 border-0" id="pricing-monthly-pane"
                                                    role="tabpanel" aria-labelledby="pricing-monthly" tabindex="0">
                                                    <div class="row">
                                                        <?php foreach($get_plans as $plns): ?>
                                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                                            <div class="card custom-card overflow-hidden plans">
                                                                <div class="card-body p-0">
                                                                    <div class="p-4">
                                                                        <h6 class="fw-semibold text-center"><?= $plns->plan_name ?></h6>
                                                                        <div class="pb-1 pt-0 d-fex text-center">
                                                                            <div class="">
                                                                                <p class="mt-2 text-xxl fw-semibold mb-0">Rs.<?= $plns->plan_price ?></p>
                                                                                <p class="text-muted- op-5 fs-11 fw-semibold mb-0" style="font-size: 16px;"><strong><?= $plns->type ?> / <?= ucwords($plns->hosting_type) ?></strong></p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- <div class="pricing-svg1 ms-auto">
                                                                        <?=  $plns->image ?>
                                                                        </div> -->

                                                                        <style>
                                                                            .list-group-item{
                                                                                border: none;
                                                                            }
                                                                        </style>
                                                                        <ul class="list-unstyled  fs-12 pt-3 mb-0">
                                                                            <?php

                                                                            $decodeFeatures = json_decode($plns->key_features,true);
                                                                            foreach($decodeFeatures as $keky => $plke):
                                                                            ?>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center fw-semibold">
                                                                                <?= $keky ?>
                                                                                <span class="badge bg-primary-transparent" style="font-weight: bold;"><?= ucwords($plke) ?></span>
                                                                            </li>
                                                                            <?php endforeach; ?>
                                                                        </ul>
                                                                        <!-- <?php if($plan_id == $plns->id): ?>
                                                                        <div class="d-grid">
                                                                            <a href="<?= site_url('subscription/plan-details/'.$plns->id) ?>" type="button" class="btn btn-primary btn-wave">Active Plan</a>
                                                                        </div>
                                                                        <?php elseif(!empty($plan_id)): ?>
                                                                            <div class="d-grid">
                                                                                <button href="#" type="button" disabled class="btn btn-primary btn-wave">Upgrade</button>
                                                                            </div>
                                                                        <?php else: ?>
                                                                            <div class="d-grid">
                                                                                <a href="<?= site_url('subscription/plan-details/'.$plns->id) ?>" type="button" class="btn btn-primary btn-wave">Upgrade</a>
                                                                            </div>
                                                                        <?php endif; ?> -->
                                                                        <div class="d-grid">
                                                                            <a href="<?= site_url('subscription/edit-plan/'.$plns->id) ?>" type="button" class="btn btn-primary btn-wave  mb-2">Edit Plan</a>
                                                                            <a aria-label="anchor" href="#" onclick="delete_record(<?= $plns->id ?>,'subscription/delete-plan')" class="btn btn-danger-light"><i class="ti ti-trash"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End:: row-2 -->    
                            
                               
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