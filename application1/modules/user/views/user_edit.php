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
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->



        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">


                <!-- Start::row-1 -->
                <?php foreach($get_user_data as $val): endforeach; ?>
                <div class="row">
                    <div class="col-xl-12">
                        <?php if(!empty($get_user_data)): ?>
                            <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title"></div>
                                <div class="d-flex">
                                    <div class="me-1"><?= go_back() ?></div>
                                </div>
                            </div>
                            <div class="card-body">
                                
                                <form action="<?= site_url('user/edit-user/'.$id) ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                                    <?= csrf__() ?>
                                    <div class="row">

                                        <div class="col-xl-12">
                                            <div class="row">
                                                <div class="col-xl-3 mb-3">
                                                    <label for="" class="form-label">Full Name</label>
                                                    <input type="text" value="<?= set_value('username',$val->username) ?>" autocomplete="off" class="form-control" name="username">
                                                    <small><?= form_error('username') ?></small>
                                                </div>
                                                <input type="hidden" id="user_id" value="<?= set_value('username',$val->id) ?>">
    
                                                <div class="col-xl-3 mb-3">
                                                    <label for="" class="form-label">Email</label>
                                                    <input type="text" value="<?= set_value('email',$val->email) ?>" autocomplete="off" class="form-control" id="user_email" name="email">
                                                    <small><?= form_error('email') ?></small>
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label for="" class="form-label">Mobile Number</label>
                                                    <input type="text" value="<?= set_value('mobile',$val->contact) ?>" class="form-control" name="mobile">
                                                    <small><?= form_error('mobile') ?></small>
                                                </div>
    
                                                <div class="col-xl-3 mb-3">
                                                    <label for="" class="form-label">Password</label>
                                                    <div class="input-group">
                                                        <input type="password" name="password" placeholder="Password" autocomplete="off" class="form-control form-control" id="signin-password">
                                                        <button class="btn btn-light bg-transparent" type="button" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                                    </div>
                                                    <small><?= form_error('password') ?></small>
                                                </div>
            
                                                <!-- <div class="col-xl-3 mb-3">
                                                    <div class="form-group mb-3">
                                                        <label for="secret_pin" class="form-label">Secret PIN</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm" id="secret_pin" name="secret_pin" value="<?= set_value('secret_pin',$val->secret_pin) ?>">
                                                            <button class="btn btn-outline-light" type="button" id="generate_pin_btn">Generate New</button>
                                                        </div>
                                                        <small><?= form_error('secret_pin') ?></small>
                                                        <div id="loadingAnimation" class="mt-2 txt-primary" style="display: none;"></div>
                                                    </div>
                                                </div> -->

                                                <div class="col-xl-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Profile Image <sup class="text-primary">Optional</sup></label>
                                                        <input type="file" class="form-control" name="photo[]">
                                                        <?php if(!empty($error)): ?>
                                                        <?php foreach($error as $vl): ?>
                                                        <small class="text-danger"><?= $vl ?></small><br/>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
    
                                            
                                                <div class="col-xl-12 mb-3">
                                                    <label for="" class="form-label">Address</label>
                                                    <textarea name="address" class="form-control" id=""><?= set_value('address',$val->address) ?></textarea>
                                                    <small><?= form_error('address') ?></small>
                                                </div>
                                            </div>

                                        </div>
                                        
                                        <div class="col-xl-6 mb-3">
                                            <div class="row">
                                                
                                                
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <button class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <?php else: ?>
                        <?= no_record() ?>
                        <?php endif; ?>
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

    function get_roles(id){
        $.get("<?= site_url('user/fetch-roles/') ?>" + id, 
        function(data, status){
            $('.appned-options').html(data);
            // alert("Data: " + data + "\nStatus: " + status);
        });
    }


    $(document).ready(function() {
        $('#generate_pin_btn').click(function() {
            // Generate a random secret PIN with alphanumeric and capital letters
            var characters = '5ABCDEF90GHI6JKL89MNO324PQRST78UV03WXYZ0123456789';
            var pin = '';
            
            for (var i = 0; i < 6; i++) {
                var randomIndex = Math.floor(Math.random() * characters.length);
                pin += characters.charAt(randomIndex);
            }
            
            // Set the generated PIN to the input field
            $('#secret_pin').val(pin);
            let secret_pin =  $('#secret_pin').val();
            show_loading('generating')

            show_loading('hide')
            //Notify
            var json = $.parseJSON(data)

            // console.log(json)
            
            $.notify({
                icon: 'fa fa-'+json.icon,
                title: json.message,
                message: 'Secured',
            },{
                type: 'info',
                placement: {
                    from: "bottom",
                    align: "right"
                },
                time: 3000,
            });
        });
    });

</script>