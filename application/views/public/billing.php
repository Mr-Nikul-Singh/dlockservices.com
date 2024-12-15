<?php require_once(APPPATH.'views/public/includes/header.inc.php'); ?>
<?php require_once(APPPATH.'views/public/includes/light-navbar.inc.php'); ?>
<?php

$billingData = $this->root->get_record('tbl_subscriptions',"id = {$id}");
// Decode JSON into an associative array
$pricing_tab = '{"1_month":"","3_month":"","6_month":"","12_month":"","24_month":"","36_month":""}';
$pricing_data = json_decode($billingData[0]->pricing_table, true) ?? json_decode($pricing_tab);

?>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-lg-4 order-md-last">
               
                <!-- Product Cart Design -->
                <div class="card rounded shadow p-4 border-0">
                    <!-- <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="h5 mb-0">Your cart</span>
                        <span class="badge bg-primary rounded-pill"><?= count($pricing_data) ?></span>
                    </div> -->
                    <ul class="list-group mb-3 border">
                        <!-- Billing Cycle Section -->
                        <li class="d-flex justify-content-between lh-sm p-3 border-bottom">
                            <div>
                                <h6 class="my-0">Selected Billing Cycle</h6>
                                <small class="text-muted" id="selectedCycle">None selected</small>
                            </div>
                            <span id="selectedPrice" class="text-muted">INR 0.00</span> <!-- Display selected cycle price -->
                        </li>

                        <!-- GST Section -->
                        <li class="d-flex justify-content-between lh-sm p-3 border-bottom">
                            <div>
                                <h6 class="my-0">GST @ 18%</h6>
                                <small class="text-muted">Tax</small>
                            </div>
                            <span class="text-muted" id="gstAmount">INR 0.00</span> <!-- Display GST dynamically -->
                        </li>

                        <!-- Setup fee Section -->
                        <li class="d-flex justify-content-between bg-light p-3 border-bottom">
                            <div class="text-warning">
                                <h6 class="my-0">Setup Fees</h6>
                            </div>
                            <span class="text-warning">INR 0.00</span> <!-- Display total dynamically -->
                        </li>

                        <!-- Total Section -->
                        <li class="d-flex justify-content-between bg-light p-3 border-bottom">
                            <div class="text-success">
                                <h6 class="my-0">Total Due Today</h6>
                            </div>
                            <span class="text-success" id="totalAmount">INR 0.00</span> <!-- Display total dynamically -->
                        </li>
                    </ul>
                    
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </form>
                </div>

            </div><!--end col-->
            
            <div class="col-md-7 col-lg-8">
                <div class="card rounded shadow p-4 border-0">
                    <h4 class="mb-3">Choose Billing Cycle</h4>
                    <form action="<?= site_url('billing-details/'.$id) ?>" method="post">
                        <!-- Billing Details Form -->
                        <?php if ($this->session->flashdata('success_message')): ?>
                            <div class="alert alert-success">
                                <?= $this->session->flashdata('success_message'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="custom-form">

                            <div class="row">
                                <!-- Full Name -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <!-- <label class="form-label">Full Name <span class="text-danger">*</span></label> -->
                                        <div class="form-icon position-relative">
                                            <input name="fullName" id="fullName" type="hidden" class="form-control" placeholder="Full Name :" value="<?= set_value('fullName',$get_user_details[0]->full_name); ?>">
                                            <?= form_error('fullName', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <!-- <label class="form-label">Email Address <span class="text-danger">*</span></label> -->
                                        <div class="form-icon position-relative">
                                            <input name="email" id="email" type="hidden" class="form-control" placeholder="Email :" value="<?= set_value('email',$get_user_details[0]->email); ?>">
                                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div> 
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <!-- <label class="form-label">Phone Number <span class="text-danger">*</span></label> -->
                                        <div class="form-icon position-relative">
                                            <input name="phone" id="phone" type="hidden" class="form-control" placeholder="Phone :" value="<?= set_value('phone',$get_user_details[0]->contact); ?>">
                                            <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div> 
                                </div>

                                <!-- Address -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <!-- <label class="form-label">Address <span class="text-danger">*</span></label> -->
                                        <div class="form-icon position-relative">
                                            <input name="address" id="address" type="hidden" class="form-control" placeholder="Address :" value="<?= set_value('address',$get_user_details[0]->address); ?>">
                                            <?= form_error('address', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- City -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <!-- <label class="form-label">City <span class="text-danger">*</span></label> -->
                                        <div class="form-icon position-relative">
                                            <input name="city" id="city" type="hidden" class="form-control" placeholder="City :" value="<?= set_value('city',$get_user_details[0]->city); ?>">
                                            <?= form_error('city', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div> 
                                </div>

                                <!-- State -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <!-- <label class="form-label">State <span class="text-danger">*</span></label> -->
                                        <div class="form-icon position-relative">
                                            <input name="state" id="state" type="hidden" class="form-control" placeholder="State :" value="<?= set_value('state'); ?>">
                                            <?= form_error('state', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Zip Code -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <!-- <label class="form-label">Zip Code <span class="text-danger">*</span></label> -->
                                        <div class="form-icon position-relative">
                                            <input name="zip" id="zip" type="hidden" class="form-control" placeholder="Zip Code :" value="<?= set_value('zip'); ?>">
                                            <?= form_error('zip', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                            <!-- Dynamic Billing Cycle Form -->
                            <div class="form-check mb-3">
                                <?php foreach ($pricing_data as $duration => $price): ?>
                                    <input class="form-check-input" 
                                        type="radio" 
                                        name="billing_cycle" 
                                        id="billingCycle<?= $duration ?>" 
                                        value="<?= $duration ?>" 
                                        data-price="<?= $price ?>"
                                        data-duration="<?= str_replace('_', ' ', $duration) ?>"
                                        onchange="updatePrice()">
                                    <label class="form-check-label" for="billingCycle<?= $duration ?>">
                                        <?= ucwords(str_replace('_', ' ', $duration)) ?> Price - INR <?= number_format($price, 2) ?>
                                    </label>
                                    <br>
                                <?php endforeach; ?>
                            </div>

                        </div>

                        <button class="w-100 btn btn-primary">Pay Now</button>
                    </form>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->

<br>
<br>
<?php require_once(APPPATH.'views/public/includes/footer.inc.php'); ?>

<script>
// Pricing data for each duration (in INR)
const pricingData = <?= $billingData[0]->pricing_table ?>;

// Function to update price and total when billing cycle changes
function updatePrice() {
    // Get selected billing cycle
    const selectedCycle = document.querySelector('input[name="billing_cycle"]:checked');
    
    // If a billing cycle is selected
    if (selectedCycle) {
        const selectedDuration = selectedCycle.value;
        let price = pricingData[selectedDuration];

        // Ensure the price is a valid number
        if (price !== undefined && price !== null) {
            price = parseFloat(price);  // Convert the price to a float (in case it's a string)
            
            if (!isNaN(price)) {  // Check if price is a valid number
                // Calculate GST (18%)
                const gstAmount = price * 0.18;

                // Calculate Total (Price + GST)
                const totalAmount = price + gstAmount;

                // Update the displayed selected billing cycle, price, GST, and total
                document.getElementById('selectedCycle').textContent = `${ucwords(selectedDuration.replace('_', ' '))}`;
                document.getElementById('selectedPrice').textContent = `INR ${price.toFixed(2)}`;
                document.getElementById('gstAmount').textContent = `INR ${gstAmount.toFixed(2)}`;
                document.getElementById('totalAmount').textContent = `INR ${totalAmount.toFixed(2)}`;
            } else {
                // In case the price is not a valid number
                alert("Invalid price selected");
            }
        } else {
            // Handle the case where the price is not found
            alert("Price not available for the selected billing cycle");
        }
    } else {
        // If no billing cycle is selected
        document.getElementById('selectedCycle').textContent = "None selected";
        document.getElementById('selectedPrice').textContent = "INR 0.00";
        document.getElementById('gstAmount').textContent = "INR 0.00";
        document.getElementById('totalAmount').textContent = "INR 0.00";
    }
}

// Utility function to capitalize the first letter of each word (like '1_month' to '1 Month')
function ucwords(str) {
    return str.replace(/\b\w/g, function(char) {
        return char.toUpperCase();
    });
}

// Call the function initially to set the default total if any cycle is selected by default
window.onload = updatePrice;

</script>