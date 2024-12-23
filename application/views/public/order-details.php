<?php require_once(APPPATH.'views/public/includes/header.inc.php'); ?>
<?php require_once(APPPATH.'views/public/includes/light-navbar.inc.php'); ?>

    <!-- Home Start -->
    <section class="bg-half-170 d-table w-100 bg-light d-none" style="background: url('assets/public/images/bg/page.png') top center;"  id="home">
        <div class="container"> 
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="title-heading text-center text-md-start">
                        <!-- <p class="text-muted para-desc mt-3 mb-0">Brief details of working with hosting</p>  -->
                        <nav aria-label="breadcrumb" class="d-inline-block mt-4">
                            <ul class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">Dlckservices</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Order Details</li>
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

    <!-- Blog Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card blog-post border-0 shadow rounded overflow-hidden">
                        
                        <div class="card-body p-4 content">
                            <div class="mb-3"><?= go_back() ?></div>
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>Order ID</th>
                                    <td><?= $get_orders->order_id ?></td>
                                </tr>
                                <tr>
                                    <th>Full Name</th>
                                    <td><?= $get_orders->fullName ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= $get_orders->email ?></td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td><?= $get_orders->phone ?></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><?= $get_orders->address ?></td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td><?= $get_orders->city ?></td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td><?= $get_orders->state ?></td>
                                </tr>
                                <tr>
                                    <th>Zip Code</th>
                                    <td><?= $get_orders->zip ?></td>
                                </tr>
                                <tr>
                                    <th>Zip Code</th>
                                    <td><?= htmlspecialchars($get_orders->zip) ?></td>
                                </tr>
                                <tr>
                                    <th>Plan Name</th>
                                    <td><?= htmlspecialchars($get_orders->plan_name) ?></td>
                                </tr>
                                <tr>
                                    <th>Hosting Type</th>
                                    <td><?= htmlspecialchars($get_orders->hosting_type) ?></td>
                                </tr>
                                <tr>
                                    <th>OS System</th>
                                    <td><?= htmlspecialchars($get_orders->os_system) ?></td>
                                </tr>
                                <tr>
                                    <th>Database Software</th>
                                    <td><?= htmlspecialchars($get_orders->db_software) ?></td>
                                </tr>
                                <tr>
                                    <th>Control Panel</th>
                                    <td><?= htmlspecialchars($get_orders->ctrl_panel) ?></td>
                                </tr>
                                <tr>
                                    <th>Total Price</th>
                                    <td>₹<?= number_format($get_orders->total_price, 2) ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><?= ucwords($get_orders->status) ?></td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td><?= date('jS F Y', strtotime($get_orders->created_at)) ?></td> <!-- Formats the created_at date -->
                                </tr>
                            </table>
                        </div>

                    </div><!--end blog post-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

<?php require_once(APPPATH.'views/public/includes/footer.inc.php'); ?>