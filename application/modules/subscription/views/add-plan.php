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
                                
                                <form action="<?= site_url('subscription/add-plan') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                                    <?= csrf__() ?>
                                    
                                    <div class="row">

                                    <div class="row">
                                        <!-- Plam Name Field -->
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label">Plan Name</label>
                                            <input type="text" value="<?= set_value('plan_name') ?>" autocomplete="off" class="form-control" name="plan_name">
                                            <small><?= form_error('plan_name') ?></small>
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label">Plan Price</label>
                                            <input type="text" value="<?= set_value('plan_price') ?>" autocomplete="off" class="form-control" name="plan_price">
                                            <small><?= form_error('plan_price') ?></small>
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label">Billing Cycle</label>
                                            <select class="form-control" name="billing_cycle" id="billingCycle">
                                                <option value="" disabled selected>Select Billing Cycle</option>
                                                <option value="monthly">Monthly</option>
                                                <option value="quarterly">Quarterly</option>
                                                <option value="annually">Annually</option>
                                            </select>
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label">Server Type</label>
                                            <select class="form-control" name="hosting_type" id="planType">
                                                <option value="" disabled selected>Select Server Type</option>
                                                <option value="vps">VPS Server</option>
                                                <option value="dedicated">Dedicated Server</option>
                                                <option value="cloud">Cloud Server</option>
                                            </select>
                                        </div>
 
                                        <!-- Disk Space -->
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label">Disk Space (GB)</label>
                                            <input type="number" min="10" value="<?= set_value('disk_space') ?>" class="form-control" name="disk_space" placeholder="Enter Disk Space in GB">
                                            <small><?= form_error('disk_space') ?></small>
                                        </div>

                                        <!-- Dynamic Advanced Features -->
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Advanced Features</label>
                                            <div id="dynamicFeatures">
                                                <!-- Placeholder for dynamic features -->
                                                <div class="row mb-2">
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" name="features[]" placeholder="Enter feature name">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" name="feature_details[]" placeholder="Enter feature details">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-outline-primary addFeature">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Billing Cycles -->
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <label class="form-label">Billing Cycles</label>

                                            <!-- 1 Month -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="billing_cycle1[]" id="billingCycle1" data-duration="1 Month" value="1" required>
                                                <label class="form-check-label" for="billingCycle1">1 Month</label>
                                                <input type="number" name="price[]" id="price1" placeholder="Enter Price" class="form-control mt-2" required />
                                            </div>

                                            <!-- 3 Months -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="billing_cycle1[]" id="billingCycle3" data-duration="3 Months" value="3">
                                                <label class="form-check-label" for="billingCycle3">3 Months</label>
                                                <input type="number" name="price[]" id="price3" placeholder="Enter Price" class="form-control mt-2" />
                                            </div>

                                            <!-- 6 Months -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="billing_cycle1[]" id="billingCycle6" data-duration="6 Months" value="6">
                                                <label class="form-check-label" for="billingCycle6">6 Months</label>
                                                <input type="number" name="price[]" id="price6" placeholder="Enter Price" class="form-control mt-2" />
                                            </div>

                                            <!-- 12 Months -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="billing_cycle1[]" id="billingCycle12" data-duration="12 Months" value="12">
                                                <label class="form-check-label" for="billingCycle12">12 Months</label>
                                                <input type="number" name="price[]" id="price12" placeholder="Enter Price" class="form-control mt-2" />
                                            </div>

                                            <!-- 24 Months -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="billing_cycle1[]" id="billingCycle24" data-duration="24 Months" value="24">
                                                <label class="form-check-label" for="billingCycle24">24 Months</label>
                                                <input type="number" name="price[]" id="price24" placeholder="Enter Price" class="form-control mt-2" />
                                            </div>

                                            <!-- 36 Months -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="billing_cycle1[]" id="billingCycle36" data-duration="36 Months" value="36">
                                                <label class="form-check-label" for="billingCycle36">36 Months</label>
                                                <input type="number" name="price[]" id="price36" placeholder="Enter Price" class="form-control mt-2" />
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

<!-- JavaScript to handle dynamic fields -->
<script>
    // Function to dynamically add and remove fields
    document.addEventListener('DOMContentLoaded', function () {
        let featureContainer = document.getElementById('dynamicFeatures');
        
        // Add new feature input row
        document.querySelector('.addFeature').addEventListener('click', function() {
            let newFeatureRow = document.createElement('div');
            newFeatureRow.classList.add('row', 'mb-2');
            
            newFeatureRow.innerHTML = `
                <div class="col-md-3">
                    <input type="text" class="form-control" name="features[]" placeholder="Enter feature name">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="feature_details[]" placeholder="Enter feature details">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-danger removeFeature">-</button>
                </div>
            `;
            
            featureContainer.appendChild(newFeatureRow);
            
            // Add event listener for removing the feature
            newFeatureRow.querySelector('.removeFeature').addEventListener('click', function() {
                newFeatureRow.remove();
            });
        });
    });
</script>


<script>
$(document).ready(function () {
    $('form').on('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission
        
        // Gather form data, including the dynamic fields
        var formData = new FormData(this);
        
        $.ajax({
            url: '<?= site_url("subscription/add-plan") ?>', // Your form action URL
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                let res = JSON.parse(response);
                if (res.status === 'success') {
                    // alert(res.message);  // Or update the UI accordingly
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
                    }, 2000); // 3 seconds delay
                } else {
                    alert('Error: ' + res.message);
                }
            },
            error: function (xhr, status, error) {
                // Handle any errors
                console.error("An error occurred:", error);
                alert("An error occurred. Please try again.");
            }
        });
    });
});
</script>

