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

