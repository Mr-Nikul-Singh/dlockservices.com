<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>


    <div class="page">
        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>


        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Settings</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Passowrd</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
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
                    <div class="col-xl-6">
                        <div class="card custom-card">
                            <div class="card-header"><div class="card-title">Change Password</div></div>
                            <div class="card-body">
                                <form action="<?= site_url('setting/change-password') ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf__() ?>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group mb-3">
                                                <label for="" class="form-label">Current Password</label>
                                                <div class="password-toggle">
                                                    <input type="password" class="form-control" value="<?= set_value('old_password') ?>" name="old_password">
                                                </div>
                                                <small><?= form_error('old_password') ?></small>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="" class="form-label">New Password</label>
                                                <div class="password-toggle">
                                                    <input type="password" class="form-control" value="<?= set_value('new_password') ?>" name="new_password">
                                                </div>
                                                <small><?= form_error('new_password') ?></small>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="" class="form-label">Confirm Password</label>
                                                <div class="password-toggle">
                                                    <input type="password" class="form-control" name="confirm_password" value="<?= set_value('confirm_password') ?>">
                                                </div>
                                                <small><?= form_error('confirm_password') ?></small>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" type="submit">Change</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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

            // alert(secret_pin + user_id)

            $.post("<?= site_url('setting/generate-secret-pin') ?>",
            {
                secret_pin: secret_pin
            },
            function(data, status){
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
    });

</script>