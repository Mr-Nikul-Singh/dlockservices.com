<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>
    <div class="page">
        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>

        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Ticket</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tickets</a></li>
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
                                        <form action="<?= site_url("ticket/tickets") ?>" method="GET">
                                            <input class="form-control form-control-sm" type="text" value="<?= set_value('filter') ?>" name="filter" placeholder="Search...">
                                        </form>
                                    </div>

                                </div> 
                            </div>
                        </div>

                        <div class="card-header d-md-none">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <form action="<?= site_url("ticket/tickets") ?>" method="GET">
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
                            </div>
                        </div>



                            <?php if(!empty($get_tickets)): ?>
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
                                                    <th scope="col">Ticket ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Subject</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Priority</th>
                                                    <th scope="col">Created At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($get_tickets as $index => $ticket): ?>
                                            <tr id="remove_<?= $ticket->id ?>">
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input checked" type="checkbox" name="id[]" value="<?= $ticket->id ?>" id="checkebox-sm1">
                                                    </div>
                                                </td>

                                                <td><?= $i++ ?></td>
                                                <!-- <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-sm me-2 avatar-rounded">
                                                            <?php if(!empty($ticket->image)): ?>
                                                                <img src="<?= base_url('assets/reviews/'.$ticket->image) ?>" alt="...">
                                                            <?php else: ?>
                                                                <img src="<?= base_url('assets/icons/user_placeholder.png') ?>" alt="...">
                                                            <?php endif; ?>
                                                        </div>
                                                        <div>
                                                            <div class="lh-1">
                                                                <span><?= ucwords(truncate_text($val->reviewer_name,16)) ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td> -->
                                                <td><?= htmlspecialchars($ticket->ticket_id); ?></td> <!-- ID -->
                                                <td>Demo</td>
                                                <td><?= htmlspecialchars($ticket->subject); ?></td> <!-- Subject -->
                                                <td><?= htmlspecialchars($ticket->status); ?></td> <!-- Status -->
                                                <td><?= htmlspecialchars($ticket->priority); ?></td> <!-- Priority -->
                                                <td><?= htmlspecialchars($ticket->created_at); ?></td> <!-- Created At -->
                                                <td> 
                                                    <div class="hstack gap-2 fs-15">
                                                        <a aria-label="anchor" href="<?= site_url('ticket/reply-ticket/'.$ticket->id) ?>" class="btn btn-wave waves-effect waves-light btn-sm btn-primary-light">Reply</a>
                                                        <a aria-label="anchor" href="<?= site_url('ticket/edit-ticket/'.$ticket->id) ?>" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-success-light"><i class="ti ti-edit"></i></a>
                                                        <a href="#" onclick="delete_record(<?= $ticket->id ?>,'ticket/delete-ticket')" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light"><i class="ti ti-trash"></i></a>
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