<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>


    <div class="page">
        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>


        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Setting</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->



        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">

                <?php if(is_expired()): expired_message();  endif; ?>
                <!-- Start::row-1 -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-body">
                              

                                <form class="" action="<?= site_url('setting/profile-update') ?>" method="post" enctype="multipart/form-data">

                                    <?= csrf__() ?>

                                    <?php foreach($get_users as  $val): ?>

                                    <div class = "row">

                                        <div class="col-xl-12">

                                            <div class="row">



                                                <div class="col-xl-6 mb-3">

                                                    <div class="row">

                                                        <div class="col-xl-6 mb-3">

                                                            <div class="form-group">

                                                                <label for="" class="form-label">Username</label>

                                                                <input type="text" value="<?= set_value('username',$val->full_name) ?>" class="form-control" name="username" placeholder="">

                                                                <small><?= form_error('username') ?></small>

                                                            </div>

                                                        </div>



                                                        <div class="col-xl-6 mb-3">

                                                            <div class="form-group">

                                                                <label for="" class="form-label">Contact</label>

                                                                <input type="text" value="<?= set_value('contact',$val->contact) ?>" class="form-control" name="contact" placeholder="">

                                                                <small><?= form_error('contact') ?></small>

                                                            </div>

                                                        </div>



                                                        <div class="col-xl-12 mb-3"> 

                                                            <div class="form-group">

                                                                <label for="" class="form-label">Email</label>

                                                                <input type="text" value="<?= set_value('email',$val->email) ?>" class="form-control" name="email" placeholder="">

                                                                <small><?= form_error('email') ?></small>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>



                                                <div class="col-xl-6 mb-3">

                                                    <div class="row">

                                                        <div class="col-xl-6 mb-3">

                                                            <div class="row">

                                                                <div class="col-12 mb-3">

                                                                    <div class="form-group">

                                                                        <label for="" class="form-label">Profile Image</label>

                                                                        <input type="file" class="form-control" name="profile_pic">

                                                                        <small class="text-danger"><?= (!empty($profile_file_error)) ? $profile_file_error : '' ?></small>

                                                                    </div>

                                                                </div>

                                                                <div class="col-12">

                                                                    <div class="form-group">

                                                                    <img src="<?= (!empty($val->profile_picture)) ? base_url('assets/img/profile/'.$val->profile_picture) : base_url('assets/icons/holder5.png') ?>" style="height: 165px;width: 100%;object-fit:contain;" class="img-thumbnail" alt="">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                                

                                                <!-- <div class="col-12 mb-3">

                                                    <div class="form-group txt-primary">

                                                        <hr>

                                                        <div class="left-panel">Address Details</div>

                                                    </div>

                                                </div> -->

                                                

                                                <div class="col-12 mb-3">

                                                    <div class="form-group">

                                                        <label for="" class="form-label">address</label>

                                                        <input type="text" value="<?= set_value('address',$val->address) ?>" class="form-control" name="address">

                                                        <small><?= form_error('address') ?></small>

                                                    </div>

                                                </div>



                                                <div class="col-xl-3 mb-3">

                                                    <div class="form-group">

                                                        <label for="" class="form-label">Country</label>

                                                        <input type="text" value="<?= set_value('country',$val->country) ?>" class="form-control" name="country">

                                                        <small><?= form_error('country') ?></small>

                                                    </div>

                                                </div>



                                                <div class="col-xl-3 mb-3">

                                                    <div class="form-group">

                                                        <label for="" class="form-label">State</label>

                                                        <input type="text" value="<?= set_value('state',$val->state) ?>" class="form-control" name="state">

                                                        <small><?= form_error('state') ?></small>

                                                    </div>

                                                </div>



                                                <div class="col-xl-3 mb-3">

                                                    <div class="form-group">

                                                        <label for="" class="form-label">City</label>

                                                        <input type="text" value="<?= set_value('city',$val->city) ?>" class="form-control" name="city">

                                                        <small><?= form_error('city') ?></small>

                                                    </div>

                                                </div>



                                                <div class="col-xl-3 mb-3">

                                                    <div class="form-group">

                                                        <label for="" class="form-label">Zip Code</label>

                                                        <input type="text" value="<?= set_value('zip_code',$val->zip_code) ?>" class="form-control" name="zip_code">

                                                        <small><?= form_error('zip_code') ?></small>

                                                    </div>

                                                </div>



                                            </div>

                                        </div>


                                        <div class="col-xl-12 mb-3">

                                            <div class = "row">


                                                <!-- <div class="col-12 mb-3">

                                                    <div class="form-group txt-primary">

                                                        <hr>

                                                        <div class="left-panel">Profession Details</div>

                                                    </div>

                                                </div> -->

                                               
                                                <div class="col-xl-3 mb-3">

                                                    <div class="form-group">

                                                        <label for="" class="form-label">Profession</label>

                                                        <input type="text" value="<?= set_value('occupation',$val->occupation) ?>" class="form-control" name="occupation">

                                                        <small><?= form_error('occupation') ?></small>

                                                    </div>

                                                </div>



                                                <div class="col-xl-3 mb-3">

                                                    <div class="form-group">

                                                        <label for="" class="form-label">Designation</label>

                                                        <input type="text" value="<?= set_value('designation',$val->designation) ?>" class="form-control" name="designation">

                                                        <small><?= form_error('designation') ?></small>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class = "row">


                                                <!-- <div class="col-12 mb-3">

                                                    <div class="form-group txt-primary">

                                                        <hr>

                                                        <div class="left-panel">Social Links</div>

                                                    </div>

                                                </div> -->

                                                <div class="col-xl-3 mb-3">

                                                    <div class="form-group">

                                                        <label for="" class="form-label">Twitter Link</label>

                                                        <input type="text" value="<?= set_value('twitter_link') ?>" class="form-control" name="twitter_link">

                                                        <small><?= form_error('twitter_link') ?></small>

                                                    </div>

                                                </div>

                                                <div class="col-xl-3 mb-3">

                                                    <div class="form-group">

                                                        <label for="" class="form-label">Facebook Link</label>

                                                        <input type="text" value="<?= set_value('facebook_link') ?>" class="form-control" name="facebook_link">

                                                        <small><?= form_error('facebook_link') ?></small>

                                                    </div>

                                                </div>

                                                <div class="col-xl-3 mb-3">

                                                    <div class="form-group">

                                                        <label for="" class="form-label">YouTube Link</label>

                                                        <input type="text" value="<?= set_value('youtube_link') ?>" class="form-control" name="youtube_link">

                                                        <small><?= form_error('youtube_link') ?></small>

                                                    </div>

                                                </div>

                                                <div class="col-xl-3 mb-3">

                                                    <div class="form-group">

                                                        <label for="" class="form-label">Instagram Link</label>

                                                        <input type="text" value="<?= set_value('instagram_link') ?>" class="form-control" name="instagram_link">

                                                        <small><?= form_error('instagram_link') ?></small>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                        <div class="col-12">

                                            <div class="form-group">

                                                <button class="btn btn-primary">Submit</button>

                                            </div>

                                        </div>

                                    </div>

                                    <?php endforeach; ?>

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