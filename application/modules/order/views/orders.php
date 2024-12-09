<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>


    <div class="page">
        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>

 
        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Orders</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Orders</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
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

                        <!-- desktop menu -->
                        <div class="d-none d-md-block">
                            <div class="card-header justify-content-between">
                                <div class="card-title"></div>
                                <div class="d-flex">
    
                                    <div class="me-3">
                                        <select name="" class="form-control form-control-sm" onchange="set_limit(this.value)">
                                            <option value="10" <?= ($this->session->limit == 10 ? 'selected' : '') ?>>10</option>
                                            <option value="20" <?= ($this->session->limit == 20 ? 'selected' : '') ?>>20</option>
                                            <option value="50" <?= ($this->session->limit == 50 ? 'selected' : '') ?>>50</option>
                                            <option value="100" <?= ($this->session->limit == 100 ? 'selected' : '') ?>>100</option>
                                        </select>
                                    </div>
    
                                    <div class="me-3">
                                        <form action="<?= site_url("order/orders") ?>" method="GET">
                                            <input class="form-control form-control-sm" type="text" value="<?= set_value('filter') ?>" name="filter" placeholder="Search...">
                                        </form>
                                    </div>
    
                                    <!-- <div class="dropdown">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><button class="dropdown-item" form="associate_form" href="javascript:void(0);"><i class="ti ti-file-spreadsheet"></i> Export</button></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-refresh"></i> Refresh</a></li>
                                        </ul>
                                    </div> -->
                                </div> 
                            </div>
                        </div>

                        <div class="card-header d-md-none">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <form action="<?= site_url("order/orders") ?>" method="GET">
                                        <input class="form-control form-control-sm" type="text" value="<?= set_value('filter') ?>" name="filter" placeholder="Search...">
                                    </form>
                                </div>
                                <div class="col-6 mb-2">
                                    <select name="" class="form-control form-control-sm" onchange="set_limit(this.value)">
                                        <option value="10" <?= ($this->session->limit == 10 ? 'selected' : '') ?>>10</option>
                                        <option value="20" <?= ($this->session->limit == 20 ? 'selected' : '') ?>>20</option>
                                        <option value="50" <?= ($this->session->limit == 50 ? 'selected' : '') ?>>50</option>
                                        <option value="100" <?= ($this->session->limit == 100 ? 'selected' : '') ?>>100</option>
                                    </select>
                                </div>
                                <!-- <div class="col-6">
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="btn btn-sm d-block btn-primary btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><button class="dropdown-item" form="associate_form" href="javascript:void(0);"><i class="ti ti-file-spreadsheet"></i> Export</button></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-refresh"></i> Refresh</a></li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>



                            <?php if(!empty($get_orders)): ?>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <form action="<?= site_url("retailer/export-retailers") ?>" id="associate_form" class="m-0 p-0" method="POST">
                                        <table class="table text-nowrap table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input accent" id="checkAll">
                                                            </label>
                                                        </div>
                                                    </th>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Name</th>
                                                    <!-- <th scope="col">Phone</th> -->
                                                    <!-- <th scope="col">Address</th> -->
                                                    <th scope="col">City/State/Zip</th>
                                                    <th scope="col">Requirements</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($get_orders as $val): ?>
                                            <tr id="remove_<?= $val->id ?>">
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input checked" type="checkbox" name="id[]" value="<?= $val->id ?>" id="checkebox-sm1">
                                                    </div>
                                                </td>

                                                <td><?= $i++ ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="lh-1">
                                                                <span><?= ucwords(truncate_text($val->fullName,16)) ?></span>
                                                            </div>
                                                            <span class="fs-11 text-muted">ORDER ID: <strong><?= ($val->order_id) ? $val->order_id : 'No Updated' ?></strong></span>
                                                            <div class="lh-1">
                                                                <span class="fs-11 text-muted"><?= $val->email ?></span>
                                                            </div>
                                                            <span class="fs-11 text-muted"><em><b><?= ($val->phone) ? $val->phone : 'No Updated' ?></b></em></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!-- <td><?= ($val->address) ? $val->address : 'No Updated' ?></td> -->
                                                <td><?= $val->city.', '.$val->state.','.$val->zip ?></td>
                                                <td>
                                                    <span><strong>Server Type :</strong>  <?= $val->serverType ?></span><br>
                                                    <span><strong>CPU Cores :</strong> <?= $val->cpuCores ?></span><br>
                                                    <span><strong>RAM Size :</strong> <?= $val->ramSize ?></span><br>
                                                    <span><strong>Storage :</strong> <?= $val->storage ?></span><br>
                                                    <span><strong>OS :</strong> <?= $val->os ?></span>
                                                </td>
                                                <td><?= $val->created_at ?></td>
                                                <td class="text-center">
                                                    <select name="" onchange="UpdateOrderStatus(<?= $val->id ?>,this.value)" class="form-control-sm">
                                                        <option value="">Select</option>
                                                        <option value="processing" <?= ($val->status == 'processing') ? 'selected' : '' ?>>Processing</option>
                                                        <option value="delivered" <?= ($val->status == 'delivered') ? 'selected' : '' ?>>Delivered</option>
                                                        <option value="canceled" <?= ($val->status == 'canceled') ? 'selected' : '' ?>>Canceled</option>
                                                    </select>
                                                    <br>
                                                    <br>
                                                    <?php
                                                    $status = $val->status;
                                                    ?>

                                                    <span class="badge 
                                                        <?= ($status == 'processing') ? 'bg-warning' : '' ?> 
                                                        <?= ($status == 'delivered') ? 'bg-success' : '' ?> 
                                                        <?= ($status == 'canceled') ? 'bg-danger' : '' ?>">
                                                        <?= ucfirst($status) ?>
                                                    </span>

                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 fs-15">
                                                        <!-- <a aria-label="anchor" href="<?= site_url('retailer/view-retailer/'.$val->id) ?>"  class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ti ti-eye"></i></a> -->
                                                        <!-- <a aria-label="anchor" href="<?= site_url('retailer/edit-retailer/'.$val->id) ?>" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-success-light"><i class="ti ti-edit"></i></a> -->
                                                        <a aria-label="anchor" href="#" onclick="delete_record(<?= $val->id ?>,'order/delete-order')" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light"><i class="ti ti-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            </tbody> 
                                        </table>
                                    </form>
                                </div>
                            </div>
                            <?php else: ?>
                                <div class="p-4"><?= no_record() ?></div>
                            <?php endif; ?>
                            <div class="card-footer">
                                <div class="d-flex align-items-center">
                                    <!-- <div>
                                        Showing  <?php $records ?> Entries <i class="bi bi-arrow-right ms-2 fw-semibold"></i>
                                    </div> -->
                                    <div class="ms-auto">
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


<script>
    function UpdateOrderStatus(id,value){
        // alert(id +'---' + value)
        $.post("<?= site_url('order/update-order-status') ?>",
        {
            order_id     : id,
            order_status: value
        },
        function(data, status){
            var json = $.parseJSON(data)
            
            $.notify({
                icon: 'ti-'+json.icon,
                title: json.message,
                message: 'Secured',
            },{
                type: 'info',
                placement: {
                    from: "bottom",
                    align: "right"
                },
                time: 1000,
            });
        });
    }
</script>