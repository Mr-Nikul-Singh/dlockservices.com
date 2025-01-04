<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>


    <div class="page">
        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>


        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Membership</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Upgrade</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Plan Details</li>
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
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                <?php if($has_plan != 'yes'): ?>
                                                    <h5 class="fw-semibold text-center">Upgrade Your Membership</h5>
                                                <?php else: ?>
                                                    <h5 class="fw-semibold text-center">You have a active plan</h5>
                                                <?php endif; ?>
                                                    <p class="text-muted text-center">Choose plan that suits best for your business needs, Our plans scales with you based on your needs</p>
                                                </div>

                                                <div class="col-12">
                                                    <?php foreach($get_plan_details as $plns): ?>
                                                        <div class="overflow-hidden">
                                                            <div class="card-body p-0">
                                                                <div class="p-4">
                                                                    <h6 class="fw-semibold "><?= $plns->plan_name ?></h6>
                                                                    <div class="pb-4 pt-2 d-flex">
                                                                        <div class="">
                                                                            <p class="mt-2 text-xxl fw-semibold mb-0">Rs.<?= $plns->plan_price ?></p>
                                                                            <p class="text-muted- op-5 fs-11 fw-semibold mb-0" style="font-size: 16px;"><strong><?= ucwords($plns->type) ?></strong></p>
                                                                        </div>
                                                                        <div class="pricing-svg1 ms-auto">
                                                                        <?=  $plns->image ?>
                                                                        </div>
                                                                    </div>
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
                                                                    <div class="row justify-content-end mt-3">
                                                                        <div class="col-12">
                                                                            <div class="form-group d-flex">
                                                                                <a href="<?= site_url('subscription/plans') ?>" class="btn btn-primary-light btn-wave me-1 responsive-btn"><i class="bx bx-arrow-back"></i> Back</a>
                                                                                <?php if($has_plan != 'yes'): ?>
                                                                                    <input type="hidden" id="email" value="<?= $this->session->email ?>">
                                                                                    <input type="hidden" id="name" value="<?= $this->session->username ?>">
                                                                                    <a href="#" onclick="checkout()" class="btn btn-primary btn-wave responsive-btn"><i class="bx bx bx-wallet"></i> Pay Now</a>
                                                                                <?php endif; ?>
                                                                            </div>
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


<?php if($has_plan != 'yes'): ?>
<!-- Include Razorpay checkout script -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    function checkout(){

        let plan_id = <?= $get_plan_details[0]->id ?>;

        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;

        // Fetch order details from your server
        fetch('<?= site_url('subscription/check-plan-price') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json', // Specify content type as JSON
            },
            body: JSON.stringify({
                plan_id: plan_id,
            }),
        })
        .then(response => response.json())
        .then(data => {
            // console.log('Data received from server:', data);

            var options = {
                key        : "<?= RAZORPAY_KEY ?>",
                amount     : data.amount,                 // Amount in paise
                currency   : 'INR',
                name       : data.plan_name,
                description: 'Payment for Order',
                order_id   : data.razorpay_order_id,
                prefill    : {
                    name: name,
                    email: email
                },
                theme: {
                    color: '#272A2F'  // Set the desired color here
                },
                handler: function (response) {
                    console.log(response);
                    // alert('Payment ID: ' + response.razorpay_payment_id);
                    // Handle the payment success response here
                    updateDatabaseWithPaymentDetails(response);
                }
            };

            var rzp = new Razorpay(options);
            rzp.open();
        })
        .catch(error => {
            console.error('Error fetching order details:', error);
            // Handle the error, e.g., show an error message to the user
        });
    };


    function updateDatabaseWithPaymentDetails(paymentDetails) {
        // Send an AJAX request to your server to update the database with payment details
        fetch('<?= site_url('subscription/update-order') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(paymentDetails),   
        })
        .then(response => response.json())
        .then(data => {
             setInterval(function() {
                location.reload();
            }, 3000);
            // console.log('Database update response:', data);
        })
        .catch(error => {
            // console.error('Error updating database:', error);
        });
}
</script>

<?php endif; ?>