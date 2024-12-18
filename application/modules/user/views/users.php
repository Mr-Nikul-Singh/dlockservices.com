<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>


    <div class="page">
        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>


        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Users</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
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
                                        <form action="<?= site_url("user/users") ?>" method="GET">
                                            <input class="form-control form-control-sm" type="text" value="<?= set_value('filter') ?>" name="filter" placeholder="Search...">
                                        </form>
                                    </div>
    
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a class="dropdown-item" href="<?= site_url('user/add-user') ?>"><i class="ti ti-user-plus"></i> Add User</a></li>
                                            <li><button class="dropdown-item" form="associate_form" href="javascript:void(0);"><i class="ti ti-file-spreadsheet"></i> Export</button></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash"></i> Delete</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-refresh"></i> Refresh</a></li>
                                        </ul>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <div class="card-header d-md-none">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <form action="<?= site_url("user/users") ?>" method="GET">
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
                                <div class="col-6">
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="btn btn-sm d-block btn-primary btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a class="dropdown-item" href="<?= site_url('user/add-user') ?>"><i class="ti ti-user-plus"></i> Add User</a></li>
                                            <li><button class="dropdown-item" form="associate_form" href="javascript:void(0);"><i class="ti ti-file-spreadsheet"></i> Export</button></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash"></i> Delete</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-refresh"></i> Refresh</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>



                            <?php if(!empty($get_users)): ?>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <form action="<?= site_url("user/export-user") ?>" id="associate_form" class="m-0 p-0" method="POST">
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
                                                    <th scope="col">Phone</th>
                                                    <!-- <th scope="col">DOB</th> -->
                                                    <!-- <th scope="col">Role</th> -->
                                                    <th scope="col">Customer ID</th>
                                                    <!-- <th scope="col">PIN</th> -->
                                                    <th scope="col">Account Status</th>
                                                    <!-- <th scope="col">Expiry Date</th> -->
                                                    <th scope="col">Orders</th>
                                                    <th scope="col">Login Access</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($get_users as $val): ?>
                                            <tr id="remove_<?= $val->id ?>">
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input checked" type="checkbox" name="id[]" value="<?= $val->id ?>" id="checkebox-sm1">
                                                    </div>
                                                </td>

                                                <td><?= $i++ ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-sm me-2 avatar-rounded">
                                                            <?php if(!empty($val->profile_picture)): ?>
                                                                <img src="<?= base_url('assets/img/profile/'.$val->profile_picture) ?>" alt="...">
                                                            <?php else: ?>
                                                                <img src="<?= base_url('assets/icons/user_placeholder.png') ?>" alt="...">
                                                            <?php endif; ?>
                                                        </div>
                                                        <div>
                                                            <div class="lh-1">
                                                                <span><?= ucwords(truncate_text($val->username,16)) ?></span>
                                                            </div>
                                                            <div class="lh-1">
                                                                <span class="fs-11 text-muted"><?= $val->email ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!-- <td><?= $val->login_user_name ?></td> -->
                                                <td><?= $val->contact ?></td>
                                                <!-- <td><?= ($val->dob) ? $val->dob : 'No Updated' ?></td> -->
                                                <!-- <td><span class='badge bg-info-transparent'><?= ucwords(str_replace('_', ' ', $val->type)) ?></span></td> -->
                                                <td><?= $val->customer_id ?></td>
                                                <!-- <td><?= $val->secret_pin ?></td> -->
                                                <td>
                                                    <?php
                                                    $statusBadgeClass = '';
                                                    $statusText = '';
                                                
                                                    switch ($val->account_status) {
                                                        case 'active':
                                                            $statusBadgeClass = 'badge bg-success-transparent';
                                                            $statusText = 'Active';
                                                            break;
                                                        case 'inactive':
                                                            $statusBadgeClass = 'badge bg-danger-transparent';
                                                            $statusText = 'Inactive';
                                                            break;
                                                        case 'suspended':
                                                            $statusBadgeClass = 'badge bg-warning-transparent';
                                                            $statusText = 'Suspended';
                                                            break;
                                                        case 'blocked':
                                                            $statusBadgeClass = 'badge bg-danger-transparent';
                                                            $statusText = 'Blocked';
                                                            break;
                                                        case 'expired':
                                                            $statusBadgeClass = 'badge bg-danger-transparent';
                                                            $statusText = 'Expired';
                                                            break;
                                                        case 'pending':
                                                            $statusBadgeClass = 'badge bg-info-transparent';
                                                            $statusText = 'Pending';
                                                            break;
                                                        case 'closed':
                                                            $statusBadgeClass = 'badge bg-secondary-transparent';
                                                            $statusText = 'Closed';
                                                            break;
                                                        case 'locked':
                                                            $statusBadgeClass = 'badge bg-secondary-transparent';
                                                            $statusText = 'Locked';
                                                            break;
                                                        default:
                                                            $statusBadgeClass = 'badge bg-secondary-transparent';
                                                            $statusText = 'Unknown Status';
                                                            break;
                                                    }
                                                
                                                    if($val->status == 1):
                                                        echo "<span class='badge $statusBadgeClass'>$statusText</span>";
                                                    else:
                                                        echo "<span class='badge bg-danger'>Blocked</span>";

                                                    endif;
                                                    ?>
                                                </td>

                                                <!-- <td>
                                                    <?php
                                                        $expiryTimestamp = strtotime($val->expiry_date); // Convert expiry_date to a timestamp
                                                        $expiryDate = date('d-m-Y', $expiryTimestamp); // Format the expiry date as desired
                                                        $today = date('d-m-Y'); // Today's date in the same format
                                                        
                                                        if ($expiryTimestamp < strtotime($today)) {
                                                            // If expiry date is less than today, display a warning badge
                                                            echo "<span class='badge bg-danger-transparent'>Expired</span>";
                                                        } elseif ($expiryDate == $today && $val->account_status != 'expired') {
                                                            // If expiry date is today, display a badge with "Today" text
                                                            echo "<span class='badge bg-warning-transparent'>Expiring Today</span>";
                                                        } else {
                                                            // If expiry date is greater than today, display the formatted date
                                                            echo date('d M - Y', $expiryTimestamp);
                                                        }
                                                    ?>
                                                </td> -->
                                                <td>
                                                    <u class="text-primary">
                                                        <a href="<?= site_url('order/orders?user_id='.$val->id) ?>" class="text-primary">
                                                            View Orders
                                                        </a>
                                                    </u>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-md form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"  id="login_access_<?= $val->id ?>" onchange="update_access('<?= $val->id ?>')" <?= ($val->status == '1' ? 'checked' : '') ?>>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="hstack gap-2 fs-15">
                                                        <a aria-label="anchor" href="<?= site_url('user/view-user/'.$val->id) ?>"  class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ti ti-eye"></i></a>
                                                        <a aria-label="anchor" href="<?= site_url('user/edit-user/'.$val->id) ?>" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-success-light"><i class="ti ti-edit"></i></a>
                                                        <a aria-label="anchor" href="#" onclick="delete_record_()" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light"><i class="ti ti-trash"></i></a>
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
    function update_access(id){
        var val = 0;
        if($('#login_access_'+id).is(':checked')){
            val = '1'; 
        }
        else{
            val = '0';
        }
        $.post("<?= site_url('user/login-access') ?>",
        {
            id     : id,
            status_: val
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