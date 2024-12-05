   <!-- Navbar STart -->
   <header id="topnav" class="defaultscroll sticky">
        <div class="container">
            <!-- Logo container-->
            <a class="logo" href="<?= site_url('/') ?>">
                <img src="<?= base_url('assets/public/images/logo-dark.png') ?>" height="40" style="border-radius: 4px;" class="logo-light-mode" alt="">
                <img src="<?= base_url('assets/public/images/logo-dark.png') ?>" height="40" style="border-radius: 4px;"  class="logo-dark-mode" alt="">
            </a>
            <div class="menu-extras">
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

            <ul class="buy-button list-inline mb-0">
                <?php if(is_user_logged_in()): ?>
                <li class="list-inline-item mb-0">
                    <div class="dropdown dropdown-primary">
                        <button type="button" class="btn btn-icon rounded-circle btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="user" class="icons"></i></button>
                        <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 py-3" style="width: 200px;">
                            <a class="dropdown-item text-dark" href="<?= site_url('my-account') ?>"><i class="uil uil-user align-middle me-1"></i> Account</a>
                            <!-- <a class="dropdown-item text-dark" href="<?= site_url('orders') ?>"><i class="uil uil-clipboard-notes align-middle me-1"></i> Order History</a> -->
                            <div class="dropdown-divider my-3 border-top"></div>
                            <a class="dropdown-item text-dark" href="<?= site_url('flogout') ?>"><i class="uil uil-sign-out-alt align-middle me-1"></i> Logout</a>
                        </div>
                    </div>
                </li>
                <?php else: ?>
                    <li><a href="<?= site_url('login') ?>" class="sub-menu-item btn-rds btn lg-primary text-white">Sign-In</a></li>
                <?php endif; ?>
            </ul><!--end login button-->
    
            <div id="navigation">
                <!-- Navigation Menu-->   
                <ul class="navigation-menu">
                <li><a href="<?= site_url('/') ?>" class="sub-menu-item">Home</a></li>
                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">Servers</a><span class="menu-arrow"></span>
                    <ul class="submenu megamenu">
                        <li>
                            <ul>
                                <li><a href="<?= site_url('vps-servers') ?>" class="sub-menu-item"><img src="<?= base_url('assets/public/images/icons/vps.svg') ?>" class="avatar avatar-ex-sm me-2" alt=""> VPS Server</a></li>     
                                <li><a href="<?= site_url('dedicated-server') ?>" class="sub-menu-item"><img src="<?= base_url('assets/public/images/icons/dedicated.svg') ?>" class="avatar avatar-ex-sm me-2" alt=""> Dedicated Server</a></li> 
                                <li><a href="<?= site_url('cloud-servers') ?>" class="sub-menu-item"><img src="<?= base_url('assets/public/images/icons/cloud.svg') ?>" class="avatar avatar-ex-sm me-2" alt=""> Cloud Server</a></li>
                            </ul>
                        </li>

                        <!-- <li>
                            <ul>
                                <li><a href="hosting-web.html" class="sub-menu-item"><img src="images/icons/web.svg" class="avatar avatar-ex-sm me-2" alt=""> Web Hosting</a></li>
                                <li><a href="hosting-reseller.html" class="sub-menu-item"><img src="images/icons/reseller.svg" class="avatar avatar-ex-sm me-2" alt=""> Reseller Hosting</a></li>  
                                <li><a href="hosting-wordpress.html" class="sub-menu-item"><img src="images/icons/wordpress.svg" class="avatar avatar-ex-sm me-2" alt=""> Worpress Server</a></li>  
                                <li><a href="hosting-email.html" class="sub-menu-item"><img src="images/icons/email.svg" class="avatar avatar-ex-sm me-2" alt=""> Email Server</a></li> 
                            </ul>
                        </li> -->
                    </ul>
                </li>

                <li><a href="<?= site_url('blog') ?>" class="sub-menu-item">Blog</a></li>
                <li><a href="<?= site_url('about') ?>" class="sub-menu-item">About</a></li>
                <li><a href="<?= site_url('contact-us') ?>" class="sub-menu-item">Contact</a></li>
                <li><a href="<?= site_url('support-center') ?>" class="sub-menu-item">Support Center</a></li>
                </ul><!--end navigation menu-->
            </div><!--end navigation-->
        </div><!--end container-->
    </header><!--end header-->
    <!-- Navbar End -->

