<?php require_once(APPPATH.'views/public/includes/header.inc.php'); ?>
<?php require_once(APPPATH.'views/public/includes/light-navbar.inc.php'); ?>

 
<div class="container mt-100 mt-60 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="custom-form">
                <?php if ($this->session->flashdata('success_message')): ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('success_message'); ?>
                    </div>
                <?php endif; ?>
                <form action="<?= site_url('billing-details/'.$id) ?>" method="post">
                    <!-- Billing Details Form -->
                    <div class="row">
                        <h4>Billing Details</h4>

                        <div class="row">
                            <!-- Full Name -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <input name="fullName" id="fullName" type="text" class="form-control" placeholder="Full Name :" value="<?= set_value('fullName',$get_user_details[0]->full_name); ?>">
                                        <?= form_error('fullName', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <input name="email" id="email" type="email" class="form-control" placeholder="Email :" value="<?= set_value('email',$get_user_details[0]->email); ?>">
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div> 
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone :" value="<?= set_value('phone',$get_user_details[0]->contact); ?>">
                                        <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div> 
                            </div>

                            <!-- Address -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Address <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <input name="address" id="address" type="text" class="form-control" placeholder="Address :" value="<?= set_value('address',$get_user_details[0]->address); ?>">
                                        <?= form_error('address', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- City -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">City <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <input name="city" id="city" type="text" class="form-control" placeholder="City :" value="<?= set_value('city',$get_user_details[0]->city); ?>">
                                        <?= form_error('city', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div> 
                            </div>

                            <!-- State -->
                            <div class="col-md-6">
                                <div class="mb-3">
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

                        <h4>Server Details</h4>
                        <div class="row mt-3">
                            
                            <!-- Server Type -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Server Type <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <select name="serverType" id="serverType" class="form-control">
                                            <option value="" disabled selected>Select Server Type</option>
                                            <option value="Dedicated" <?= set_select('serverType', 'Dedicated'); ?>>Dedicated Server</option>
                                            <option value="Cloud" <?= set_select('serverType', 'Cloud'); ?>>Cloud Server</option>
                                            <option value="VPS" <?= set_select('serverType', 'VPS'); ?>>Virtual Private Server (VPS)</option>
                                        </select>
                                        <?= form_error('serverType', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- CPU Cores -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">CPU Cores <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <select name="cpuCores" id="cpuCores" class="form-control">
                                            <option value="" disabled selected>Select CPU Cores</option>
                                            <option value="2_2GB_30GB" data-ram="2GB" data-storage="30GB" data-price="650">2 Cores (2GB RAM, 30GB SSD) - 650</option>
                                            <option value="2_4GB_80GB" data-ram="4GB" data-storage="80GB" data-price="800">2 Cores (4GB RAM, 80GB SSD) - 800</option>
                                            <option value="2_8GB_100GB" data-ram="8GB" data-storage="100GB" data-price="1250">2 Cores (8GB RAM, 100GB SSD) - 1250</option>
                                            <option value="4_8GB_200GB" data-ram="8GB" data-storage="200GB" data-price="1500">4 Cores (8GB RAM, 200GB SSD) - 1500</option>
                                            <option value="8_16GB_200GB" data-ram="16GB" data-storage="200GB" data-price="2000">8 Cores (16GB RAM, 200GB SSD) - 2000</option>
                                            <option value="16_32GB_400GB" data-ram="32GB" data-storage="400GB" data-price="3000">16 Cores (32GB RAM, 400GB SSD) - 3000</option>
                                        </select>
                                        <?= form_error('cpuCores', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div> 
                            </div>

                            <!-- RAM Size -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">RAM Size <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <select name="ramSize" id="ramSize" class="form-control">
                                            <option value="" disabled selected>Select RAM Size</option>
                                            <option value="2GB">2 GB</option>
                                            <option value="4GB">4 GB</option>
                                            <option value="8GB">8 GB</option>
                                            <option value="16GB">16 GB</option>
                                            <option value="32GB">32 GB</option>
                                        </select>
                                        <?= form_error('ramSize', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Storage -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Storage <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <select name="storage" id="storage" class="form-control">
                                            <option value="" disabled selected>Select Storage Size</option>
                                            <option value="30GB">30 GB</option>
                                            <option value="80GB">80 GB</option>
                                            <option value="100GB">100 GB</option>
                                            <option value="200GB">200 GB</option>
                                            <option value="400GB">400 GB</option>
                                        </select>
                                        <?= form_error('storage', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Operating System -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Operating System <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <select name="os" id="os" class="form-control">
                                            <option value="" disabled selected>Select OS</option>
                                            <option value="Windows" <?= set_select('os', 'Windows'); ?>>Windows</option>
                                            <option value="Linux" <?= set_select('os', 'Linux'); ?>>Linux</option>
                                            <option value="Ubuntu" <?= set_select('os', 'Ubuntu'); ?>>Ubuntu</option>
                                            <option value="CentOS" <?= set_select('os', 'CentOS'); ?>>CentOS</option>
                                        </select>
                                        <?= form_error('os', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>


                            <!-- Display Price -->
                            <div class="col-md-12 mt-4">
                                <h5>Total Price: <span id="priceDisplay">0</span></h5>
                            </div>
                        </div>


                    </div>

                    <button class="btn btn-primary">Pay Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<?php require_once(APPPATH.'views/public/includes/footer.inc.php'); ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const cpuCores = document.getElementById('cpuCores');
    const ramSize = document.getElementById('ramSize');
    const storage = document.getElementById('storage');
    const priceDisplay = document.getElementById('priceDisplay');

    // When CPU Cores selection changes, update RAM, Storage, and Price automatically
    cpuCores.addEventListener('change', function() {
        const selectedOption = cpuCores.options[cpuCores.selectedIndex];
        
        // Get the associated RAM, Storage, and Price from selected option
        const ram = selectedOption.getAttribute('data-ram');
        const storageValue = selectedOption.getAttribute('data-storage');
        const price = selectedOption.getAttribute('data-price');

        // Update RAM and Storage selections
        for (let i = 0; i < ramSize.options.length; i++) {
            ramSize.options[i].selected = ramSize.options[i].value === ram;
        }

        for (let i = 0; i < storage.options.length; i++) {
            storage.options[i].selected = storage.options[i].value === storageValue;
        }

        // Display the calculated price
        priceDisplay.textContent = price ? price : 0;
    });
});

</script>