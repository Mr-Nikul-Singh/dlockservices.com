<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>


    <div class="page">
        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>


        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Subscription</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Plans</a></li>
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
                                
                                <form action="<?= site_url('subscription/edit-plan/' . $plan[0]->id) ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                                    <?= csrf__() ?>

                                    <div class="row">
                                        <div class="col-6">
                                            
                                            <!-- Plan Name -->
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">Plan Name</label>
                                                <input type="text" value="<?= set_value('plan_name', $plan[0]->plan_name) ?>" class="form-control" name="plan_name">
                                            </div>
        
                                            <!-- Plan Price -->
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">Plan Price</label>
                                                <input type="text" value="<?= set_value('plan_price', $plan[0]->plan_price) ?>" class="form-control" name="plan_price">
                                            </div>
        
                                            <!-- Billing Cycle -->
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">Billing Cycle</label>
                                                <select class="form-control" name="billing_cycle">
                                                    <option value="monthly" <?= $plan[0]->type == 'monthly' ? 'selected' : '' ?>>Monthly</option>
                                                    <option value="quarterly" <?= $plan[0]->type == 'quarterly' ? 'selected' : '' ?>>Quarterly</option>
                                                    <option value="annually" <?= $plan[0]->type == 'annually' ? 'selected' : '' ?>>Annually</option>
                                                </select>
                                            </div>
        
                                            <!-- Hosting Type -->
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">Server Type</label>
                                                <select class="form-control" name="hosting_type">
                                                    <option value="cloud" <?= $plan[0]->hosting_type == 'cloud' ? 'selected' : '' ?>>Cloud Server</option>
                                                    <option value="vps" <?= $plan[0]->hosting_type == 'vps' ? 'selected' : '' ?>>VPS Server</option>
                                                    <option value="dedicated" <?= $plan[0]->hosting_type == 'dedicated' ? 'selected' : '' ?>>Dedicated Server</option>
                                                </select>
                                            </div>
        
                                            <!-- Disk Space -->
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">Disk Space (GB)</label>
                                                <input type="number" min="10" value="<?= set_value('disk_space', $plan[0]->disk_space) ?>" class="form-control" name="disk_space">
                                            </div>
    
                                        </div>
                                        
                                        <div class="col-6">
                                            <div class="">
                                                <label class="form-label">Advanced Features</label>
                                                <div id="dynamicFeatures">
                                                    <?php
                                                    $features = json_decode($plan[0]->key_features, true);
                                                    foreach ($features as $feature => $detail): ?>
                                                        <div class="row mb-2">
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="features[]" value="<?= $feature ?>" placeholder="Feature Name">
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="feature_details[]" value="<?= $detail ?>" placeholder="Feature Details">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="button" class="btn btn-outline-danger removeFeature">-</button>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <button type="button" class="btn btn-outline-primary addFeature">Add Feature</button>
                                            </div>
                                        </div>

                                        <!-- Billing Cycles -->
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <label class="form-label">Billing Cycles</label>

                                            <?php

                                                // Decode JSON into an associative array
                                                // // $pricing_tab = '{"1_month":"","3_month":"","6_month":"","12_month":"","24_month":"","36_month":""}';
                                                // $pricing_data = json_decode($plan[0]->pricing_table, true) ?? json_decode($pricing_tab);
                                                // pre($pricing_data);

                                                $default_pricing_tab = [
                                                    "1_month" => "",
                                                    "3_month" => "",
                                                    "6_month" => "",
                                                    "12_month" => "",
                                                    "24_month" => "",
                                                    "36_month" => ""
                                                ];
                                                
                                                // Decode JSON from the database
                                                $pricing_data_from_db = json_decode($plan[0]->pricing_table, true) ?? [];
                                                
                                                // Merge default structure with the database values
                                                $pricing_data = array_merge($default_pricing_tab, $pricing_data_from_db);
                                                // pre($pricing_data);
                                            ?>

                                            <!-- Dynamic Billing Cycle Form -->
                                            <?php foreach ($pricing_data as $duration => $price): ?>
                                                <div class="form-check mb-3">
                                                    <!-- Billing Cycle Checkbox -->
                                                    <input class="form-check-input" 
                                                        type="checkbox" 
                                                        name="billing_cycle1[]" 
                                                        id="billingCycle<?= $duration ?>" 
                                                        data-duration="<?= str_replace('_', ' ', $duration) ?>" 
                                                        value="<?= $duration ?>" 
                                                        >
                                                    <label class="form-check-label" for="billingCycle<?= $duration ?>">
                                                        <?= ucwords(str_replace('_', ' ', $duration)) ?>
                                                    </label>
                                                    
                                                    <!-- Price Input -->
                                                    <input type="number" 
                                                        name="price[]" 
                                                        id="price<?= $duration ?>" 
                                                        value="<?= $price ?>" 
                                                        placeholder="Enter Price" 
                                                        class="form-control mt-2" 
                                                         />
                                                </div>
                                            <?php endforeach; ?>


                                        </div>

                                    </div>


                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Update</button>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
    let featureContainer = document.getElementById('dynamicFeatures');

    // Add event listener to the "Add Feature" button
    document.querySelector('.addFeature').addEventListener('click', function () {
        let newFeatureRow = document.createElement('div');
        newFeatureRow.classList.add('row', 'mb-2');

        newFeatureRow.innerHTML = `
            <div class="col-md-5">
                <input type="text" class="form-control" name="features[]" placeholder="Enter feature name">
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" name="feature_details[]" placeholder="Enter feature details">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-outline-danger removeFeature">-</button>
            </div>
        `;

        featureContainer.appendChild(newFeatureRow);
    });

        // Use event delegation for removing features
        featureContainer.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('removeFeature')) {
                e.target.closest('.row').remove(); // Remove the closest parent row
            }
        });
    });

</script>


<script>
    $(document).ready(function () {
        $('form').on('submit', function (e) {
            e.preventDefault();
            
            var formData = new FormData(this);
            $.ajax({
                url: '<?= site_url("subscription/edit-plan/".$plan[0]->id) ?>', // Your form action URL
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    let res = JSON.parse(response);
                    if (res.status === 'success') {
                        $.notify({
                            icon: 'ti ti-check',
                            title: res.message,
                            message: 'Secured',
                        },{
                            type: 'info',
                            placement: {
                                from: "bottom",
                                align: "right"
                            },
                            time: 1000,
                        });
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    } else {
                        alert('Error: ' + res.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("An error occurred:", error);
                    alert("An error occurred. Please try again.");
                }
            });
        });
    });
</script>

