<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>


    <div class="page">
        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>


        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Contacts</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Contacts</a></li>
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
                                            <form action="<?= site_url("contact/contacts") ?>" method="GET">
                                                <input class="form-control form-control-sm" type="text" value="<?= set_value('filter') ?>" name="filter" placeholder="Search...">
                                            </form>
                                        </div>
                                        
                                        <!-- <div class="me-2">
                                            <button class="btn btn-sm form-control btn-primary" onclick="oPenLeadFilterBox()"> <i class="bx bx-filter-alt"></i> Filter</button>
                                        </div> -->

                                        <!-- <div class="dropdown">
                                            <a href="javascript:void(0);" class="btn btn-sm d-block btn-primary btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu" role="menu">
                                                <li><button class="dropdown-item" form="history_form" href="javascript:void(0);"><i class="ti ti-file-spreadsheet"></i> Export</button></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);"  onclick="BulkDelete('login_history')" ><i class="ti ti-trash"></i> Delete</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-refresh"></i> Refresh</a></li>
                                            </ul>
                                        </div> -->

                                    </div>

                                </div>
                            </div>

                            <!-- mobile menu -->
                            <div class="card-header d-md-none">
                                <div class="row">

                                    <div class="col-12 mb-2">
                                        <form action="<?= site_url("contact/contacts") ?>" method="GET">
                                            <input class="form-control form-control-sm" type="text" value="<?= set_value('filter') ?>" name="filter" placeholder="Search...">
                                        </form>
                                    </div>

                                    <!-- <div class="col-6">
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="btn btn-sm form-control btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><button class="dropdown-item" form="history_form" href="javascript:void(0);"><i class="ti ti-file-spreadsheet"></i> Export</button></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);"  onclick="BulkDelete('login_history')" ><i class="ti ti-trash"></i> Delete</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-refresh"></i> Refresh</a></li>
                                            </ul>
                                        </div>
                                    </div> -->
                                </div>
                            </div>



                            <div class="card-body p-0">

                            <?php if(!empty($get_contacts)): ?>
                                <div class="table-responsive">
                                <form action="<?= site_url("history/export-history") ?>" id="history_form" class="m-0 p-0" method="POST">
                                    <table class="table text-nowrap table-bordere table-hover">
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Mobile Number</th>
                                                <th scope="col">Message</th>
                                                <th scope="col">Subject</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($get_contacts as $val): ?>
                                            <tr id="remove_<?= $val->id ?>">
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input checked checkItem" type="checkbox" name="login_history_ids[]" value="<?= $val->id ?>" id="checkebox-sm1">
                                                    </div>
                                                </td>
                                                <td><?= $i++ ?></td>
                                                <td><?= $val->name ?></td>
                                                <td><?= $val->email ?></td>
                                                <td><?= $val->phone ?></td>
                                                <td><?= $val->message ?></td>
                                                <td><?= $val->subject ?></td>
                                                <td><span class="badge bg-warning-transparent d-none"><?= (date('l',strtotime($val->created_at))) ?></span> <?= $val->created_at ?></td>
                                                <td>
                                                    <a href="#" onclick="delete_record(<?= $val->id ?>,'contact/delete-contact')" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light"><i class="ti ti-trash"></i></a>
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