<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>


<div class="page">
    <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>


    <!-- Page Header -->
    <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
        <h4 class="fw-medium mb-0">Orders</h4>
        <div class="ms-sm-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Billing</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Payment History</li>
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
                <!-- <div class="col-xl-3">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="mt-1">
                                    <h6 class="mb-1">Total Invoices Amount</h6>
                                    <div class="">
                                        <span class="text-lg fw-semibold mb-2">$<span class="count-up" data-count="192.87">192.87</span>K</span> 
                                    </div>
                                </div>
                                <div class="avatar avatar-lg bg-info-transparent   ms-auto  p-2"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" class="svg-info"><path d="M13,16H7a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,10h2a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Zm12,2H18V3a1,1,0,0,0-.5-.87,1,1,0,0,0-1,0l-3,1.72-3-1.72a1,1,0,0,0-1,0l-3,1.72-3-1.72a1,1,0,0,0-1,0A1,1,0,0,0,2,3V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V13A1,1,0,0,0,21,12ZM5,20a1,1,0,0,1-1-1V4.73L6,5.87a1.08,1.08,0,0,0,1,0l3-1.72,3,1.72a1.08,1.08,0,0,0,1,0l2-1.14V19a3,3,0,0,0,.18,1Zm15-1a1,1,0,0,1-2,0V14h2Zm-7-7H7a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z"/></svg>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="mt-1">
                                    <h6 class="mb-1">Total Paid Invoices</h6>
                                    <div class="">
                                        <span class="text-lg  fw-semibold mb-2">$<span class="count-up" data-count="68.83">68.83</span>K</span> 
                                    </div>
                                </div>
                                <div class="avatar avatar-lg bg-success-transparent ms-auto p-2"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="svg-success"><path d="M11.5,20h-6a1,1,0,0,1-1-1V5a1,1,0,0,1,1-1h5V7a3,3,0,0,0,3,3h3v5a1,1,0,0,0,2,0V9s0,0,0-.06a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19.29.29,0,0,0-.1,0A1.1,1.1,0,0,0,11.56,2H5.5a3,3,0,0,0-3,3V19a3,3,0,0,0,3,3h6a1,1,0,0,0,0-2Zm1-14.59L15.09,8H13.5a1,1,0,0,1-1-1ZM7.5,14h6a1,1,0,0,0,0-2h-6a1,1,0,0,0,0,2Zm4,2h-4a1,1,0,0,0,0,2h4a1,1,0,0,0,0-2Zm-4-6h1a1,1,0,0,0,0-2h-1a1,1,0,0,0,0,2Zm13.71,6.29a1,1,0,0,0-1.42,0l-3.29,3.3-1.29-1.3a1,1,0,0,0-1.42,1.42l2,2a1,1,0,0,0,1.42,0l4-4A1,1,0,0,0,21.21,16.29Z"/></svg>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="mt-1">
                                    <h6 class="mb-1">Pending Invoices</h6>
                                    <div class="">
                                        <span class="text-lg  fw-semibold mb-2">$<span class="count-up" data-count="81.57">81.57</span>K</span> 
                                    </div>
                                </div>
                                <div class="avatar avatar-lg bg-warning-transparent ms-auto   p-2"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" class="svg-warning"><path d="M19,12h-7V5c0-0.6-0.4-1-1-1c-5,0-9,4-9,9s4,9,9,9s9-4,9-9C20,12.4,19.6,12,19,12z M12,19.9c-3.8,0.6-7.4-2.1-7.9-5.9C3.5,10.2,6.2,6.6,10,6.1V13c0,0.6,0.4,1,1,1h6.9C17.5,17.1,15.1,19.5,12,19.9z M15,2c-0.6,0-1,0.4-1,1v6c0,0.6,0.4,1,1,1h6c0.6,0,1-0.4,1-1C22,5.1,18.9,2,15,2z M16,8V4.1C18,4.5,19.5,6,19.9,8H16z"/></svg>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="mt-1">
                                    <h6 class="mb-1">Overdue Invoices</h6>
                                    <div class="">
                                        <span class="text-lg  fw-semibold mb-2">$<span class="count-up" data-count="32.47">32.47</span>K</span> 
                                    </div>
                                </div>
                                <div class="avatar avatar-lg bg-secondary-transparent ms-auto p-2"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" class="svg-secondary"><path d="M19,12h-7V5c0-0.6-0.4-1-1-1c-5,0-9,4-9,9s4,9,9,9s9-4,9-9C20,12.4,19.6,12,19,12z M12,19.9c-3.8,0.6-7.4-2.1-7.9-5.9C3.5,10.2,6.2,6.6,10,6.1V13c0,0.6,0.4,1,1,1h6.9C17.5,17.1,15.1,19.5,12,19.9z M15,2c-0.6,0-1,0.4-1,1v6c0,0.6,0.4,1,1,1h6c0.6,0,1-0.4,1-1C22,5.1,18.9,2,15,2z M16,8V4.1C18,4.5,19.5,6,19.9,8H16z"/></svg>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-xl-12">
                    <div class="card custom-card">
                    
                         <!-- desktop menu -->
                         <div class="d-none d-md-block">
                                <div class="card-header justify-content-end">
                                    <div class="d-flex">
                                        
                                        <div class="me-2">
                                            <select name="" class="form-control form-control-sm" onchange="set_limit(this.value)">
                                                <option value="10" <?= ($this->session->limit == 10 ? 'selected' : '') ?>>10</option>
                                                <option value="20" <?= ($this->session->limit == 20 ? 'selected' : '') ?>>20</option>
                                                <option value="50" <?= ($this->session->limit == 50 ? 'selected' : '') ?>>50</option>
                                                <option value="100" <?= ($this->session->limit == 100 ? 'selected' : '') ?>>100</option>
                                            </select>
                                        </div>
                                        
                                        <div class="me-2">
                                            <form action="<?= site_url("subscription/payment-history") ?>" method="GET">
                                                <input class="form-control form-control-sm" type="text" value="<?= set_value('filter') ?>" name="filter" placeholder="Search...">
                                            </form>
                                        </div>
                                        
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="btn btn-sm d-block btn-primary btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu" role="menu">
                                                <li><button class="dropdown-item" form="lead_form-" href="javascript:void(0);"><i class="ti ti-file-spreadsheet"></i> Export</button></li>
                                                <li><a class="dropdown-item" href=""><i class="ti ti-refresh"></i> Refresh</a></li>
                                            </ul>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <!-- mobile menu -->
                            <div class="card-header d-md-none">
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <select name="" class="form-control form-control-sm" onchange="set_limit(this.value)">
                                            <option value="10" <?= ($this->session->limit == 10 ? 'selected' : '') ?>>10</option>
                                            <option value="20" <?= ($this->session->limit == 20 ? 'selected' : '') ?>>20</option>
                                            <option value="50" <?= ($this->session->limit == 50 ? 'selected' : '') ?>>50</option>
                                            <option value="100" <?= ($this->session->limit == 100 ? 'selected' : '') ?>>100</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="btn btn-sm form-control btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><button class="dropdown-item" form="lead_form1" href="javascript:void(0);"><i class="ti ti-file-spreadsheet"></i> Export</button></li>
                                                <li><a class="dropdown-item" href=""><i class="ti ti-refresh"></i> Refresh</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <form action="<?= site_url("subscription/payment-history") ?>" method="GET">
                                            <input class="form-control form-control-sm" type="text" value="<?= set_value('filter') ?>" name="filter" placeholder="Search...">
                                        </form>
                                    </div>

                                </div>
                            </div>


                        <div class="card-body p-0">

                        <?php if(!empty($get_invoices)): ?>
                            <div class="table-responsive">
                            <form action="<?= site_url("history/export-invoices-") ?>" id="invoice_form" class="m-0 p-0" method="POST">
                                <table class="table text-nowrap table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <!-- Select -->
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input accent" id="checkAll">
                                                    <label class="form-check-label font-weight-bold" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th scope="col">No.</th>
                                            <th scope="col">Plan</th>
                                            <th scope="col">Order ID</th>
                                            <th scope="col">Payment ID</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Currency</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach($get_invoices as $val): ?>
                                        <tr id="remove_<?= $val->id ?>">
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input checked checkItem" type="checkbox" name="login_history_ids[]" value="<?= $val->id ?>" id="checkebox-sm1">
                                                </div>
                                            </td>
                                            <td><?= $i++ ?></td>
                                           
                                            <td><?= $val->plan_name ?></td>
                                            <td><span class="badge bg-success-transparent"><?= $val->order_id ?></span></td>
                                            <td><?= $val->payment_id ?></td>
                                            <td><?= $val->amount ?></td>
                                            <td><span class="badge bg-blue-transparent"><?= $val->currency ?></span></td>
                                            <td><span class="badge bg-info-transparent"><?= $val->payment_status ?></span></td>
                                            <td><span class="badge bg-primary-transparent"><?= $val->payment_method ?></span></td>
                                            <td><?= date('d-M-Y h:i A', strtotime($val->created_at)) ?></td>
                                            <td class="text-center">
                                                <a href="<?= site_url('order/payment-receipt/'.$val->id) ?>" target="_new" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-success-light"><i class="ti ti-printer"></i></a>
                                                <!-- <a href="#" onclick="delete_record(<?= $val->id ?>,'invoice/delete-invoice')" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light"><i class="ti ti-trash"></i></a> -->
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </form>
                            </div>
                        <?php else: ?>
                            <div class="p-4"><?= no_record() ?></div>
                        <?php endif; ?> 

                        </div>
                        <div class="card-footer">
                            <div class="d-flex align-items-center">
                                <!-- <div>
                                    Showing 6 Entries <i class="bi bi-arrow-right ms-2 fw-semibold"></i>
                                </div> -->
                                <div class="ms-lg-auto">
                                    <nav aria-label="Page navigation" class="pagination-style-4">
                                        <ul class="pagination mb-0">
                                            <?= $links ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
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