<?php require_once(APPPATH.'views/public/includes/header.inc.php'); ?>
<?php require_once(APPPATH.'views/public/includes/light-navbar.inc.php'); ?>
<?php

$billingData = $this->root->get_record('tbl_subscriptions',"id = {$id}");
// Decode JSON into an associative array
// Default pricing structure
$pricing_tab = '{"1_month":"","3_month":"","6_month":"","12_month":"","24_month":"","36_month":""}';

// Decode JSON from the database
$pricing_data = json_decode($billingData[0]->pricing_table, true) ?? json_decode($pricing_tab);

// Ensure all pricing values are numeric (convert empty or invalid values to 0)
foreach ($pricing_data as $key => $value) {
    $pricing_data[$key] = is_numeric($value) ? (float)$value : 0; // Convert to float or default to 0
}

?>

<section class="section mt-2">
    <div class="container">
        <div class="row">
            
            
            <div class="col-md-7 col-lg-8">
                <div class="card rounded shadow p-4 border-0">
                    <h4 class="mb-3">Choose Billing Cycle</h4>
                    <form action="<?= site_url('billing-details/'.$id) ?>" id="submit_Data" method="post">
                        <!-- Billing Details Form -->
                        <?php if ($this->session->tempdata('success_info')): ?>
                            <div class="alert alert-success">
                                <?= $this->session->tempdata('success_info'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="custom-form">

                            <div class="row">
                                <!-- Full Name -->
                                <div class="col-md-">
                                    <div class="mb-0">
                                        <!-- <label class="form-label">Full Name <span class="text-danger">*</span></label> -->
                                        <div class="form-icon position-relative">
                                            <input name="fullName" id="fullName" type="hidden" class="form-control" placeholder="Full Name :" value="<?= set_value('fullName',$get_user_details[0]->full_name); ?>">
                                            <?= form_error('fullName', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-">
                                    <div class="mb-0">
                                        <!-- <label class="form-label">Email Address <span class="text-danger">*</span></label> -->
                                        <div class="form-icon position-relative">
                                            <input name="email" id="email" type="hidden" class="form-control" placeholder="Email :" value="<?= set_value('email',$get_user_details[0]->email); ?>">
                                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div> 
                                </div>

                                <!-- Phone -->
                                <div class="col-md-">
                                    <div class="mb-0">
                                        <!-- <label class="form-label">Phone Number <span class="text-danger">*</span></label> -->
                                        <div class="form-icon position-relative">
                                            <input name="phone" id="phone" type="hidden" class="form-control" placeholder="Phone :" value="<?= set_value('phone',$get_user_details[0]->contact); ?>">
                                            <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div> 
                                </div>

                                <!-- Address -->
                                <div class="col-md-6">
                                    <div class="mb-0">
                                        <label class="form-label">Address <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <input name="address" id="address" type="text" class="form-control" placeholder="Address :" value="<?= set_value('address',$get_user_details[0]->address); ?>">
                                            <?= form_error('address', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- City -->
                                <div class="col-md-6">
                                    <div class="mb-0">
                                        <label class="form-label">City <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <input name="city" id="city" type="text" class="form-control" placeholder="City :" value="<?= set_value('city',$get_user_details[0]->city); ?>">
                                            <?= form_error('city', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div> 
                                </div>

                                <!-- State -->
                                <div class="col-md-6">
                                    <div class="mb-0">
                                        <label class="form-label">State <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <input name="state" id="state" type="text" class="form-control" placeholder="State :" value="<?= set_value('state'); ?>">
                                            <?= form_error('state', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Zip Code -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Zip Code <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <input name="zip" id="zip" type="text" class="form-control" placeholder="Zip Code :" value="<?= set_value('zip'); ?>">
                                            <?= form_error('zip', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                            <input type="hidden" id="totalAmountval" name="total_price" value="">
                            <input type="hidden" id="gstAmt" name="gst_amount" value="">
                            <input type="hidden" name="plan_name" value="<?= $billingData[0]->plan_name ?>">
                            <input type="hidden" name="hosting_type" value="<?= $billingData[0]->hosting_type ?>">
                            <input type="hidden" name="plan_id" value="<?= $billingData[0]->id ?>">

                            <hr>
                            <!-- Dynamic Billing Cycle Form -->
                            <div class="form-check mb-3">
                                <?php $count  = 0; foreach ($pricing_data as $duration => $price): ?>
                                    <?php if ($price > 0): $numbringForSelectedOne = $count++; ?>
                                    <input class="form-check-input" <?= $numbringForSelectedOne == 0 ? 'checked' : '' ?>
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
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>

                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-12">

                            <?php
                                $available_os = json_decode($billingData[0]->available_os, true) ?? ['None'];
                                $db_softwares = json_decode($billingData[0]->db_softwares, true) ?? ['None'];
                                $cpanels_list = json_decode($billingData[0]->cpanels_list, true) ?? ['None'];
                            ?>

                                <h4 class="mb-3">Configurable Options</h4>


                                <div class="row">
                                    <div class="col-md-12 col-xl-6">
                                        <div class="form-group mt-2">
                                            <label for="form-label">Operating System</label>
                                            <select name="os_system" id="" class="form-control" required>
                                                <option value="">Select</option>
                                                <?php 
                                                foreach($available_os as $key => $os):
                                                    echo  "<option value='$os'>$os</option>";
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-xl-6">
                                        <div class="form-group mt-2">
                                            <label for="form-label">Database Software</label>
                                            <select name="db_software" id="" class="form-control" required>
                                                <option value="">Select</option>
                                                <?php 
                                                foreach($db_softwares as $key => $db):
                                                    echo  "<option value='$db'>$db</option>";
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-xl-6">
                                        <div class="form-group mt-2">
                                            <label for="form-label">Control Panel</label>
                                            <select name="ctrl_panel" id="" class="form-control" required>
                                                <option value="">Select</option>
                                                <?php 
                                                foreach($cpanels_list as $key => $cp):
                                                    echo  "<option value='$cp'>$cp</option>";
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>  

                            </div>
                        </div>
                        
                    </form>
                </div>
            </div><!--end col-->

            <div class="col-md-5 col-lg-4 order-md-last">
               
                <!-- Product Cart Design -->
                <div class="card rounded shadow p-4 border-0">
                    <h5>ORDER SUMMERY</h5>
                    <ul class="list-group mb-3 border">
                        <!-- Billing Cycle Section -->
                        <li class="d-flex justify-content-between lh-sm p-3 border-bottom">
                            <div>
                                <h6 class="my-0">Plan</h6>
                                <!-- <small class="text-muted" id="selectedCycle">None selected</small> -->
                            </div>
                            <!-- <span id="selectedPrice" class="text-muted">INR 0.00</span> -->
                            <span id="selectedCycle" class="text-muted">None selected</span>
                        </li>

                        <li class="d-flex justify-content-between lh-sm p-3 border-bottom">
                            <div>
                                <h6 class="my-0">Price per month</h6>
                            </div>
                            <span id="selectedPrice" class="text-muted">INR 0.00</span>
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
                        <div class="form-group">
                            <!-- <input type="text" class="form-control" placeholder="Promo code"> -->
                            <button type="submit" form="submit_Data"  class="btn btn-primary form-control">Pay Now</button>
                        </div>
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
// Pricing data fetched from PHP
const pricingData = <?= json_encode($pricing_data); ?>;

// Function to update price and total when billing cycle changes
function updatePrice() {

    const selectedCycle = document.querySelector('input[name="billing_cycle"]:checked');
    
    if (selectedCycle) {
        const selectedDuration = selectedCycle.value;
        let price = pricingData[selectedDuration];

        // Ensure the price is a valid number (float)
        if (price !== undefined && price !== null) {
            price = parseFloat(price);  // Convert the price to a float

            if (!isNaN(price)) {
                // Check if the duration is 3_month or any other dynamic duration
                let months = 1;  // Default to 1 month
                if (selectedDuration === '3_month') {
                    months = 3;
                } else if (selectedDuration === '6_month') {
                    months = 6;
                } else if (selectedDuration === '12_month') {
                    months = 12;
                } else if (selectedDuration === '24_month') {
                    months = 24;
                } else if (selectedDuration === '36_month') {
                    months = 36;
                }

                // Calculate total price for the selected months
                const totalPrice = price * months;

                
                // Calculate GST (18%)
                const gstAmount = totalPrice * 0.18;
                
                // Calculate final total (Price + GST)
                const totalAmount = totalPrice + gstAmount;

                $('#totalAmountval').val(totalAmount);
                $('#gstAmt').val(gstAmount);

                // Update the displayed values (selected cycle, price, GST, and total)
                document.getElementById('selectedCycle').textContent = `${ucwords(selectedDuration.replace('_', ' '))} Plan`;
                document.getElementById('selectedPrice').textContent = `INR ${price.toFixed(2)}`;
                document.getElementById('gstAmount').textContent = `INR ${gstAmount.toFixed(2)}`;
                document.getElementById('totalAmount').textContent = `INR ${totalAmount.toFixed(2)}`;
                document.getElementById('MonthPrice').textContent = `INR ${price.toFixed(2)}`;
                
            } else {
                alert("Invalid price selected");
            }
        } else {
            alert("Price not available for the selected billing cycle");
        }
    } else {
        // Reset values if no billing cycle is selected
        document.getElementById('selectedCycle').textContent = "None selected";
        document.getElementById('selectedPrice').textContent = "INR 0.00";
        document.getElementById('gstAmount').textContent = "INR 0.00";
        document.getElementById('totalAmount').textContent = "INR 0.00";
    }
}

// Capitalize the first letter of each word (for billing cycle display)
function ucwords(str) {
    return str.replace(/\b\w/g, function(char) {
        return char.toUpperCase();
    });
}

// Initialize the default selected cycle when the page loads
window.onload = updatePrice;
</script>


<?php if ($this->session->tempdata('success_info')): ?>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                window.location.href = "<?= site_url('my-account/#orders') ?>";
            }, 3000); // 3000 milliseconds = 3 seconds
        });
    </script>
<?php endif; ?>