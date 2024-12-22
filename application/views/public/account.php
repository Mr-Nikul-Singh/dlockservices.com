<?php require_once(APPPATH.'views/public/includes/header.inc.php'); ?>
<?php require_once(APPPATH.'views/public/includes/light-navbar.inc.php'); ?>

        <!-- Home Start -->
        <section class="bg-half-170 d-table w-100 bg-light" style="background: url('assets/public/images/bg/contact.png') top center;" id="home">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="title-heading text-center text-md-start">
                            <h3>Account</h3>
                            <nav aria-label="breadcrumb" class="d-inline-block mt-4">
                                <ul class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">Dlockservices</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">My Account</li>
                                </ul>
                            </nav>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 1000 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 0 0 c 0 0 200 50 500 50 s 500 -50 500 -50 v 101 h -1000 v -100 z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- Home End -->

        <section class="section">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <?php if(!empty($this->session->profile)): ?>
                                <img src="<?= base_url('assets/img/profile/'.$this->session->profile) ?>" class="avatar avatar-md-md rounded-circle" alt="">
                            <?php else: ?>
                                <img src="<?= base_url('assets/icons/user_placeholder.png') ?>" class="avatar avatar-md-md rounded-circle" alt="">
                            <?php endif; ?>
                            <div class="ms-3">
                                <h6 class="text-muted mb-0">Hello,</h6>
                                <h5 class="mb-0"><?= ucwords(get_userdata('first_name')) ?> <?= ucwords(get_userdata('last_name')) ?></h5>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-8 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <!-- <p class="text-muted mb-0">Launch your campaign and benefit from our expertise on designing and managing conversion centered bootstrap v5 html page.</p> -->
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-md-4 mt-4 pt-2">
                        <ul class="nav nav-pills nav-justified flex-column rounded shadow p-3 mb-0" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link rounded active" id="dashboard" data-bs-toggle="pill" href="#dash" role="tab" aria-controls="dash" aria-selected="false">
                                    <div class="text-start py-1 px-3">
                                        <h6 class="mb-0"><i class="uil uil-dashboard h5 align-middle me-2 mb-0"></i> Dashboard</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->
                            
                            <li class="nav-item mt-2">
                                <a class="nav-link rounded" id="order-history" data-bs-toggle="pill" href="#orders" role="tab" aria-controls="orders" aria-selected="false">
                                    <div class="text-start py-1 px-3">
                                        <h6 class="mb-0"><i class="uil uil-list-ul h5 align-middle me-2 mb-0"></i> Orders</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->
                         
                            <li class="nav-item mt-2">
                                <a class="nav-link rounded" id="addresses" data-bs-toggle="pill" href="#address" role="tab" aria-controls="address" aria-selected="false">
                                    <div class="text-start py-1 px-3">
                                        <h6 class="mb-0"><i class="uil uil-map-marker h5 align-middle me-2 mb-0"></i> Addresses</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->
                            
                            <li class="nav-item mt-2">
                                <a class="nav-link rounded" id="account-details" data-bs-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="false">
                                    <div class="text-start py-1 px-3">
                                        <h6 class="mb-0"><i class="uil uil-user h5 align-middle me-2 mb-0"></i> Account Details</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->
                            
                            <li class="nav-item mt-2">
                                <a class="nav-link rounded" id="ticket-details" data-bs-toggle="pill" href="#ticket" role="tab" aria-controls="ticket" aria-selected="false">
                                    <div class="text-start py-1 px-3">
                                        <h6 class="mb-0"><i class="uil uil-ticket h5 align-middle me-2 mb-0"></i> Ticket</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->
                            
                            <li class="nav-item mt-2">
                                <a class="nav-link rounded" role="tab" href="<?= site_url('flogout') ?>" aria-selected="false">
                                    <div class="text-start py-1 px-3">
                                        <h6 class="mb-0"><i class="uil uil-sign-out-alt h5 align-middle me-2 mb-0"></i> Logout</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->
                        </ul><!--end nav pills-->
                    </div><!--end col-->

                    <div class="col-md-8 col-12 mt-4 pt-2">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active shadow rounded p-4" id="dash" role="tabpanel" aria-labelledby="dashboard">
                                <h6 class="text-muted">Hello <span class="text-dark"><?= ucwords(get_userdata('first_name')) ?> </span> (not <span class="text-dark"><?= ucwords(get_userdata('first_name')) ?>  <?= ucwords(get_userdata('last_name')) ?></span>? <a href="<?= site_url('flogout') ?>" class="text-danger">Log out</a>)</h6>

                                <h6 class="text-muted mb-0">From your account dashboard you can view your <a href="javascript:void(0)" class="text-danger">recent orders</a>, manage your <a href="javascript:void(0)" class="text-danger">shipping and billing addresses</a>, and <a href="javascript:void(0)" class="text-danger">edit your password and account details</a>.</h6>
                            </div><!--end teb pane-->

                            <div class="tab-pane fade shadow rounded p-4" id="ticket" role="tabpanel" aria-labelledby="ticket">
                                <div class="table-responsive bg-white shadow rounded">
                                <table class="table mb-0 table-center table-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Ticket ID</th>
                                                <th scope="col">Subject</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Priority</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($get_tickets)): ?>
                                                <?php foreach($get_tickets as $ticket): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($ticket->ticket_id); ?></td> <!-- ID -->
                                                <td><?= htmlspecialchars($ticket->subject); ?></td> <!-- Subject -->
                                                <td>
                                                    <?php 
                                                        $status = htmlspecialchars($ticket->status); 
                                                        $badgeClass = '';

                                                        // Assign badge color classes based on the status
                                                        switch ($status) {
                                                            case 'Open':
                                                                $badgeClass = 'badge bg-primary'; // Blue for Open
                                                                break;
                                                            case 'In Progress':
                                                                $badgeClass = 'badge bg-warning'; // Yellow for In Progress
                                                                break;
                                                            case 'Resolved':
                                                                $badgeClass = 'badge bg-success'; // Green for Resolved
                                                                break;
                                                            case 'Closed':
                                                                $badgeClass = 'badge bg-danger'; // Grey for Closed
                                                                break;
                                                            default:
                                                                $badgeClass = 'badge bg-dark'; // Dark for Unknown statuses
                                                        }
                                                    ?>
                                                    <span class="<?= $badgeClass; ?>">
                                                        <?= $status; ?>
                                                    </span>
                                                </td>
                                                <td><?= htmlspecialchars($ticket->priority); ?></td> <!-- Priority -->
                                                <td><?= htmlspecialchars($ticket->created_at); ?></td> <!-- Created At -->
                                                <td> 
                                                    <div class="hstack gap-2 fs-15">
                                                        <a aria-label="anchor" href="<?= site_url('view-ticket/'.$ticket->id) ?>">View</a>
                                                    </div>
                                                </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody> 
                                    </table>
                                </div>
                            </div><!--end teb pane-->

                            <div class="tab-pane fade shadow rounded p-4" id="orders" role="tabpanel" aria-labelledby="order-history">
                                <div class="table-responsive bg-white shadow rounded">
                                    <table class="table mb-0 table-center table-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="border-bottom">Order no.</th>
                                                <th scope="col" class="border-bottom">Date</th>
                                                <th scope="col" class="border-bottom">Status</th>
                                                <!-- <th scope="col" class="border-bottom">Total</th> -->
                                                <th scope="col" class="border-bottom">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($get_orders)): ?>
                                                <?php foreach($get_orders as $orders): ?>
                                                    <tr>
                                                        <th scope="row"><?= $orders->order_id ?></th>
                                                        <td><?= date('jS F Y', strtotime($orders->created_at)) ?></td>
                                                        <td>
                                                        <?php
                                                        $status = $orders->status;
                                                        ?>

                                                        <span class="badge 
                                                            <?= ($status == 'processing') ? 'bg-warning' : '' ?> 
                                                            <?= ($status == 'delivered') ? 'bg-success' : '' ?> 
                                                            <?= ($status == 'canceled') ? 'bg-danger' : '' ?>">
                                                            <?= ucfirst($status) ?>
                                                        </span>
                                                        </td>
                                                        <!-- <td>$ 320 <span class="text-muted">for 2items</span></td> -->
                                                        <td><a href="<?= site_url('view-order/'.$orders->id) ?>" class="text-primary">View <i class="uil uil-arrow-right"></i></a></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody> 
                                    </table>
                                </div>
                            </div><!--end teb pane-->

                            <div class="tab-pane fade shadow rounded p-4" id="address" role="tabpanel" aria-labelledby="addresses">
                                <h6 class="text-muted mb-0">The following addresses will be used on the checkout page by default.</h6>

                                <div class="row">
                                    <div class="col-lg-6 mt-4 pt-2">
                                        <div class="d-flex align-items-center mb-4 justify-content-between">
                                            <h5 class="mb-0">Billing Address:</h5>
                                            <a href="#addres" class="text-primary h5 mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Edit"><i class="uil uil-edit align-middle"></i></a>
                                        </div>
                                        <div class="pt-4 border-top">
                                            <div class="alert alert-success" id="message"></div>
                                            <p class="h6"><?= ucwords($this->session->username) ?></p>
                                            <textarea name="address2" id="address2" class="form-control" placeholder="Enter your address here"><?= get_userdata('address') ?></textarea>
                                        </div>
                                        <button class="btn btn-primary mt-3" onclick="saveAddress()">Save</button>
                                    </div>
                                </div>
                            </div><!--end teb pane-->

                            <div class="tab-pane fade shadow rounded p-4" id="account" role="tabpanel" aria-labelledby="account-details">
                            <div class="alert alert-success" id="message2"></div>

                                <form id="userForm" action="" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">First Name</label>
                                                <input name="firstName" id="first-name" type="text" class="form-control" value="<?= get_userdata('first_name') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Last Name</label>
                                                <input name="lastName" id="last-name" type="text" class="form-control" value="<?= get_userdata('last_name') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Your Email</label>
                                                <input name="email" id="email" type="email" class="form-control" value="<?= get_userdata('email') ?>">
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Phone Number</label>
                                                <input name="phone" id="phone" type="text" class="form-control" value="<?= get_userdata('contact') ?>" placeholder="Enter your phone number">
                                            </div> 
                                        </div>
                                        <div class="col-lg-12 mt-2 mb-0">
                                            <button type="button" class="btn btn-primary" onclick="saveChanges()">Save Changes</button>
                                        </div>
                                    </div>
                                </form>

                                <h5 class="mt-4">Change password :</h5>
                                <div>
                                    <div class="alert alert-success" id="message3"></div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Old password :</label>
                                                <input type="password" class="form-control" placeholder="Old password" name="old_password" id="old_password">
                                            </div>
                                        </div><!--end col-->
    
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">New password :</label>
                                                <input type="password" class="form-control" placeholder="New password" name="new_password" id="new_password">
                                            </div>
                                        </div><!--end col-->
    
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Re-type New password :</label>
                                                <input type="password" class="form-control" placeholder="Re-type New password" name="confirm_password" id="confirm_password">
                                            </div>
                                        </div><!--end col-->
    
                                        <div class="col-lg-12 mt-2 mb-0">
                                            <button class="btn btn-primary" onclick="updatePassword()">Save Password</button>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div>
                            </div><!--end teb pane-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->

<?php require_once(APPPATH.'views/public/includes/footer.inc.php'); ?>

<script>
    $('#message').hide();
    $('#message2').hide();
    $('#message3').hide();

    function saveAddress(){
        let address2 = $('#address2').val();
        $.post("<?= site_url('save-address') ?>",
        {
            address: address2
        },
        function(data, status){
            $('#message').show();
            $('#message').html(data);
        });
    }

    function saveChanges() {

        const firstName = $('#first-name').val().trim();
        const lastName  = $('#last-name').val().trim();
        const email     = $('#email').val().trim();
        const phone     = $('#phone').val().trim();

        if (!firstName || !lastName || !email || !phone) {
            alert("Please fill in all fields.");
            return;
        }
        $.post("<?= site_url('save-info') ?>",
        {
            fname: firstName,
            lname: lastName,
            email: email,
            phone: phone,
        },
        function(data, status){
            $('#message2').show();
            $('#message2').html(data);
        });
    }

    function updatePassword() {
    const old_password = $('#old_password').val().trim();
    const new_password = $('#new_password').val().trim();
    const confirm_password = $('#confirm_password').val().trim();

    if (!old_password || !new_password || !confirm_password) {
        alert("Please fill in all fields.");
        return;
    }

    if (new_password !== confirm_password) {
        alert("New password and confirm password do not match.");
        return;
    }

    $.post("<?= site_url('update-password') ?>", {
        old_password: old_password,
        new_password: new_password,
        confirm_password: confirm_password
    }, function(response) {
        $('#message3').show();
        $('#message3').html(response.message);
        if(response.status == 200){
            setTimeout(() => {
                window.location.href = "<?= site_url('flogout') ?>";
            }, 3000);
        }
    }, "json")
    .fail(function(xhr) {
        // Handle any error
        $('#message3').show();
        $('#message3').html("Error: " + xhr.responseText);
    });
}

$(document).ready(function () {
    // Check if the URL has a hash
    if (window.location.hash) {
        var hash = window.location.hash; // Get the hash from the URL
        var tabLink = $('a[href="' + hash + '"]'); // Find the corresponding tab link
        var tabContent = $(hash); // Find the corresponding tab content

        // Check if both the tab link and content exist
        if (tabLink.length && tabContent.length) {
            // Deactivate all tabs and tab contents
            $('.nav-pills .nav-link').removeClass('active');
            $('.tab-content .tab-pane').removeClass('active show');

            // Activate the selected tab and its content
            tabLink.addClass('active');
            tabContent.addClass('active show');
        }
    }
});



</script>