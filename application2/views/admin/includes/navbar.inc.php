         <!-- app-header -->
         <header class="app-header">

            <!-- Start::main-header-container -->
            <div class="main-header-container container-fluid">

                <!-- Start::header-content-left -->
                <div class="header-content-left">

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="<?= site_url('dashboard') ?>" class="header-logo">
                            <img src="<?= base_url('assets/public/images/logo-dark.png') ?>" alt="logo" class="desktop-logo" width="50">
                            <img src="<?= base_url('assets/public/images/logo-dark.png') ?>" alt="logo" class="toggle-logo" width="50">
                            <img src="<?= base_url('assets/public/images/logo-dark.png') ?>" alt="logo" class="desktop-dark"width="50">
                            </a>
                        </div>
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <!-- Start::header-link -->
                        <a aria-label="anchor" href="javascript:void(0);" class="sidemenu-toggle header-link" data-bs-toggle="sidebar">
                            <span class="open-toggle me-2">
                                <i class="bx bx-menu header-link-icon"></i>
                              </span>
                        </a>
                     

                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element header-search d-lg-none d-block ">
                        <!-- Start::header-link -->
                        <a aria-label="anchor" href="javascript:void(0);" class="header-link" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="bx bx-search-alt-2 header-link-icon"></i>
                        </a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->

                </div>
                <!-- End::header-content-left -->

                <!-- Start::header-content-right -->
                <div class="header-content-right">

                 

                    <!-- Start::header-element -->
                    <div class="header-element header-theme-mode d-none">
                        <!-- Start::header-link|layout-setting -->
                        <a aria-label="anchor" href="javascript:void(0);" class="header-link layout-setting">
                                <!-- Start::header-link-icon -->
                                    <i class="bx bx-sun bx-flip-horizontal header-link-icon ionicon  dark-layout"></i>
                                <!-- End::header-link-icon -->
                                <!--  Start::header-link-icon -->
                                    <i class="bx bx-moon bx-flip-horizontal header-link-icon ionicon light-layout"></i>
                                <!-- End::header-link-icon -->
                        </a>
                        <!-- End::header-link|layout-setting -->
                    </div>
                    <!-- End::header-element -->


                    


                    <!-- Start::header-element -->
                    <div class="header-element header-fullscreen d-nne">
                        <!-- Start::header-link -->
                        <!-- <a aria-label="anchor" href="<?= base_url('') ?>" download="" class="header-link">
                            <i class="bx bxl-android header-link-icon"></i>
                        </a> -->
                        <a aria-label="anchor" onclick="openFullscreen();" href="javascript:void(0);" class="header-link">
                            <!-- <i class="bx bx-fullscreen header-link-icon  full-screen-open"></i> -->
                            <i class="bx bx-exit-fullscreen header-link-icon  full-screen-close  d-none"></i>
                        </a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->

                      <!-- Start::header-element -->
                      <div class="header-element notifications-dropdown ">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                             <i class="bx bx-bell bx-flip-horizontal header-link-icon ionicon"></i>
                           <span class="badge bg-info rounded-pill header-icon-badge pulse pulse-secondary" id="notification-icon-badge">5</span>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <!-- Start::main-header-dropdown -->
                        <div class="main-header-dropdown dropdown-menu  border-0 dropdown-menu-end" data-popper-placement="none">
                            <div class="p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 fs-17 fw-semibold">Notifications</p>
                                    <span class="badge bg-secondary-transparent" id="notifiation-data">5 Unread</span>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled mb-0" id="header-notification-scroll">
                                
                            </ul>
                            <div class="p-3 empty-header-item1 border-top">
                                <div class="d-grid">
                                    <a href="notifications.html" class="btn btn-primary">View All</a>
                                </div>
                            </div>
                            <div class="p-5 empty-item1 d-none">
                                <div class="text-center">
                                    <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                                        <i class="bx bx-bell-off bx-tada fs-2"></i>
                                    </span>
                                    <h6 class="fw-semibold mt-3">No New Notifications</h6>
                                </div>
                            </div>
                        </div>
                        <!-- End::main-header-dropdown -->
                    </div>

                    <!-- End::header-element -->
                    <!-- <div class="d-flex header-settings header-shortcuts-dropdown">
                        <a aria-label="anchor" href="javascript:void(0);" class=" header-link nav-link icon" data-bs-toggle="offcanvas" data-bs-target="#apps" aria-controls="apps">
                         <i class="bx bx-category  header-link-icon"></i>
                        </a>
                     </div> -->

                    <div class="offcanvas offcanvas-end wd-330" tabindex="-1" id="apps" aria-labelledby="appsLabel">
                    <div class="offcanvas-header border-bottom">
                        <h5 id="appsLabel" class="mb-0 fs-18">Related Apps</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"> <i class="bx bx-x   apps-btn-close"></i></button>
                    </div>
                    <div class="p-3">
                        <div class="row g-3">
                            <div class="col-6">
                                    <a href="full-calendar.html">
                                        <div class="text-center p-3 related-app border">
                                            <span class="avatar fs-23 bg-success-transparent p-2 mb-2">
                                                <i class="bx bx-calendar text-success"></i>
                                            </span>
                                            <span class="d-block fs-13 text-muted fw-semibold">Calendar</span>
                                        </div>
                                    </a>
                            </div>
                            <div class="col-6">
                                    <a href="mail.html">
                                        <div class="text-center p-3 related-app border">
                                            <span class="avatar  fs-23 bg-info-transparent p-2 mb-2">
                                                <i class="bx bx-envelope  text-info"></i>
                                            </span>
                                            <span class="d-block fs-13 text-muted fw-semibold">Mail</span>
                                        </div>
                                    </a>
                            </div>
                            <div class="col-6">
                                <a href="profile.html">
                                        <div class="text-center p-3 related-app border">
                                            <span class="avatar bg-warning-transparent fs-23 bg p-2 mb-2">
                                                <i class="bx bx-user  text-warning"></i>
                                            </span>
                                            <span class="d-block fs-13 text-muted fw-semibold">Profile</span>
                                        </div>
                                    </a>
                            </div>
                            <div class="col-6">
                                <a href="chat.html">
                                        <div class="text-center p-3 related-app border">
                                            <span class="avatar    bg-pink-transparent fs-23 bg p-2 mb-2">
                                                <i class="bx bx-chat text-pink"></i>
                                            </span>
                                            <span class="d-block fs-13 text-muted fw-semibold">Chat</span>
                                        </div>
                                    </a>
                            </div>
                            <div class="col-6">
                                <a href="contacts.html">
                                        <div class="text-center p-3 related-app border">
                                            <span class="avatar    bg-secondary-transparent fs-23 bg p-2 mb-2">
                                                <i class="bx bx-phone text-secondary"></i>
                                            </span>
                                            <span class="d-block fs-13 text-muted fw-semibold">Contacts</span>
                                        </div>
                                    </a>
                            </div>
                            <div class="col-6">
                                <a href="mail-settings.html">
                                        <div class="text-center p-3 related-app border">
                                            <span class="avatar    bg-teal-transparent fs-23 bg p-2 mb-2">
                                                <i class="bx bx-cog text-teal"></i>
                                            </span>
                                            <span class="d-block fs-13 text-muted fw-semibold">Settings</span>
                                        </div>
                                    </a>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- Start::header-element -->


                     <!-- Start::header-element -->
                     <div class="d-flex header-settings d-none">
                        <a aria-label="anchor"  href="javascript:void(0);" class=" header-link nav-link icon me-1" data-bs-toggle="offcanvas" data-bs-target="#sidebar-right" aria-controls="sidebar-right">
                         <i class="bx bx-slider header-link-icon"></i>
                        </a>
                     </div>
                   <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element mainuserProfile d-none">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="d-sm-flex wd-100p">
                                    <div class="avatar avatar-sm">
                                        <img alt="avatar" class="rounded-circle" src="<?= (!empty($this->session->profile_picture)) ? base_url('assets/img/profile/'.$this->session->profile_picture) : base_url('assets/icons/user_placeholder.png') ?>">   
                                    </div>
                                    <div class="ms-2 my-auto d-none d-xl-flex">
                                        <h6 class=" font-weight-semibold mb-0 fs-13 user-name d-sm-block d-none"><?= $this->session->username ?></h6>
                                    </div>
                                </div>
                            </div>

                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <ul class="dropdown-menu  border-0 main-header-dropdown  overflow-hidden header-profile-dropdown" aria-labelledby="mainHeaderProfile">
                            <li><a class="dropdown-item border-bottom" href="#">Customer ID <?= $this->session->customer_id ?></a></li>
                            <li><a class="dropdown-item border-bottom" href="#"><i class="fs-13 me-2 bx bx-help-circle"></i>Help</a></li>
                        </ul>
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <!-- Start::header-link|switcher-icon -->
                        <a href="<?= site_url('auth/logout') ?>"  class="header-link switcher-icon ms-1">
                        <i class="bx bx-power-off header-link-icon"></i>
                        </a>
                        <!-- <a aria-label="anchor" href="javascript:void(0);" class="header-link switcher-icon ms-1" data-bs-toggle="offcanvas" data-bs-target="#switcher-canvas">
                             <i class="bx bx-cog bx-spin header-link-icon"></i>
                        </a> -->
                        <!-- End::header-link|switcher-icon -->
                    </div>
                    <!-- End::header-element -->

                </div>
                <!-- End::header-content-right -->

            </div>
            <!-- End::main-header-container -->

        </header>
        <!-- /app-header -->

        <!-- Start::app-sidebar -->
        <aside class="app-sidebar" id="sidebar">

            <!-- Start::main-sidebar-header -->
            <div class="main-sidebar-header">
                <a href="<?= site_url('dashboard') ?>" class="header-logo">
                    <!-- <?php if(!empty($this->session->logo_picture)): ?>
                        <img src="<?= base_url('assets/img/profile/'.$this->session->logo_picture) ?>" style="border-radius:0px !important;"  alt="navbar brand" width="120" style="width:120px;" class="navbar-brand">
                    <?php else: ?>
                        <img src="<?= base_url('assets/logo/logo.png') ?>" style="border-radius:0px !important;" alt="navbar brand" width="120" style="width:120px;" class="navbar-brand">
                    <?php endif; ?> -->
                    <img src="<?= base_url('assets/public/images/logo-dark.png') ?>" alt="logo" class="desktop-logo" width="150">
                    <img src="<?= base_url('assets/public/images/logo-dark.png') ?>" alt="logo" class="toggle-logo" width="150">
                    <img src="<?= base_url('assets/public/images/logo-dark.png') ?>?v=<?= filemtime('assets/public/images/logo-dark.png') ?>" alt="logo" class="desktop-dark" width="120px">
                </a>
            </div>
            <!-- End::main-sidebar-header -->

            <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll">

                <!-- Start::nav -->
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <div class="slide-left" id="slide-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
                    </div>

                
                    <?php if(is_admin()): ?>
                        <ul class="main-menu">
                                    
                            <!-- Start::slide__category -->
                            <li class="slide__category"><span class="category-name">General</span></li>
                            <!-- End::slide__category -->

                            <!-- Start::Dashboard Slide -->
                            <?php
                                $dashboardHookKey = array('dashboard','/');
                                $dashboardActiveHook = in_array($this->uri->segment(2), $dashboardHookKey) ? 'active' : '';
                            ?>
                            <li class="slide <?= $dashboardActiveHook ?>">
                                <a href="<?= site_url('dashboard') ?>" class="side-menu__item <?= $dashboardActiveHook ?>">
                                    <span class="side-menu__icon"><i class='bx bx-home'></i></span>
                                    <span class="side-menu__label">Dashboard</span>
                                </a>
                            </li>
                            <!-- End::Dashboard Slide -->

            
                            <?php
                                $hookKey1 = array('users','view-user','add-user','edit-user');
                                $ActiveHook = in_array($this->uri->segment(2), $hookKey1) ? 'active open' : '';
                            ?>
                         
                            <li class="slide has-sub <?= $ActiveHook ?>">
                                <a href="javascript:void(0);" class="side-menu__item <?= $ActiveHook ?>">
                                    <span class="side-menu__icon"><i class='ti ti-users'></i></span>
                                    <span class="side-menu__label">Users</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Users</a></li>
                                    <li class="slide"><a href="<?= site_url('user/add-user') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'add-user' ? 'active' : '' ?>">Add User</a></li>
                                    <li class="slide"><a href="<?= site_url('user/users') ?>"  class="side-menu__item <?= $this->uri->segment(2) == 'users' ? 'active' : '' ?>">Manage</a></li>
                                </ul>
                            </li>

                            <?php
                                $hookKey1 = array('orders','new','view-order','payment-history','view-history');
                                $ActiveHook = in_array($this->uri->segment(2), $hookKey1) ? 'active open' : '';
                            ?>
                         
                            <li class="slide has-sub <?= $ActiveHook ?>">
                                <a href="javascript:void(0);" class="side-menu__item <?= $ActiveHook ?>">
                                    <span class="side-menu__icon"><i class='ti ti-list'></i></span>
                                    <span class="side-menu__label">Orders</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Orders</a></li>
                                    <li class="slide"><a href="<?= site_url('order/new') ?>"  class="side-menu__item <?= $this->uri->segment(2) == 'new' ? 'active' : '' ?>">New Orders</a></li>
                                    <li class="slide"><a href="<?= site_url('order/orders') ?>"  class="side-menu__item <?= $this->uri->segment(2) == 'orders' ? 'active' : '' ?>">Manage</a></li>
                                    <!-- <li class="slide"><a href="<?= site_url('order/expired') ?>"  class="side-menu__item <?= $this->uri->segment(2) == 'expired' ? 'active' : '' ?>">Expired Orders</a></li> -->
                                    <!-- <li class="slide"><a href="<?= site_url('order/payment-history') ?>"  class="side-menu__item <?= $this->uri->segment(2) == 'payment-history' ? 'active' : '' ?>">Payment History</a></li> -->

                                </ul>
                            </li>

                            <?php
                                $hookKey113 = array('contacts','view-contacts');
                                if(in_array($this->uri->segment(2),$hookKey113)){
                                    $activeHook113 = 'active';
                                    $openHook = 'open';
                                }else{
                                    $activeHook113 = '';
                                    $openHook = '';
                                }
                            ?>
                         
                            <li class="slide <?= $activeHook113 ?>">
                                <a href="<?= site_url('contact/contacts') ?>" class="side-menu__item <?= $activeHook113 ?>">
                                    <span class="side-menu__icon">
                                        <i class='bx bx-phone'></i>
                                    </span> 
                                    <span class="side-menu__label <?= $this->uri->segment(2) == 'contacts' ? 'active' : '' ?>">Contacts</span>
                                </a>
                            </li>
                            <!-- End::slide -->

                            <!-- Start::Settings Slide -->
                            <?php
                                $settingsHookKey = array('add-review','edit-review','reviews');
                                $settingsActiveHook = in_array($this->uri->segment(2), $settingsHookKey) ? 'active open' : '';
                            ?>
                            <li class="slide has-sub <?= $settingsActiveHook ?>">
                                <a href="javascript:void(0);" class="side-menu__item <?= $settingsActiveHook ?>">
                                    <span class="side-menu__icon"><i class='ti ti-star'></i></span>
                                    <span class="side-menu__label">Reviews</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Reviews</a></li>
                                    <li class="slide">
                                        <a href="<?= site_url('review/add-review') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'add-review' ? 'active' : '' ?>">Add Review</a>
                                    </li>
                                    <li class="slide">
                                        <a href="<?= site_url('review/reviews') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'reviews' ? 'active' : '' ?>">Manage</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- End::Settings Slide -->

                            <!-- Start::Settings Slide -->
                            <?php
                                $settingsHookKey = array('blogs','add-blog','edit-blog','view-blog','blog-categories','add-blog-category');
                                $settingsActiveHook = in_array($this->uri->segment(2), $settingsHookKey) ? 'active open' : '';
                            ?>
                            <li class="slide has-sub <?= $settingsActiveHook ?>">
                                <a href="javascript:void(0);" class="side-menu__item <?= $settingsActiveHook ?>">
                                    <span class="side-menu__icon"><i class='ti ti-file'></i></span>
                                    <span class="side-menu__label">Blog</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Blog</a></li>
                                    <li class="slide">
                                        <a href="<?= site_url('blog/add-blog') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'add-blog' ? 'active' : '' ?>">Add Blog</a>
                                    </li>
                                    <li class="slide">
                                        <a href="<?= site_url('blog/blogs') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'blogs' ? 'active' : '' ?>">Manage</a>
                                    </li>
                                    <li class="slide">
                                        <a href="<?= site_url('blog/blog-categories') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'blog-categories' ? 'active' : '' ?>">Categories</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- End::Settings Slide -->

                            <!-- Start::Settings Slide -->
                            <?php
                                $settingsHookKey = array('tickets','add-ticket','edit-ticket','view-ticket');
                                $settingsActiveHook = in_array($this->uri->segment(2), $settingsHookKey) ? 'active open' : '';
                            ?>
                            <li class="slide has-sub <?= $settingsActiveHook ?>">
                                <a href="javascript:void(0);" class="side-menu__item <?= $settingsActiveHook ?>">
                                    <span class="side-menu__icon"><i class='ti ti-ticket'></i></span>
                                    <span class="side-menu__label">Tickets</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Tickets</a></li>
                                    <li class="slide">
                                        <a href="<?= site_url('ticket/add-ticket') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'add-ticket' ? 'active' : '' ?>">Create Ticket</a>
                                    </li>
                                    <li class="slide">
                                        <a href="<?= site_url('ticket/tickets') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'tickets' ? 'active' : '' ?>">Manage</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- End::Settings Slide -->


                            <!-- Start::slide__category -->
                            <li class="slide__category"><span class="category-name">Advance</span></li>
                            <!-- End::slide__category -->


                            <!-- Start::Settings Slide -->
                            <?php
                                $settingsHookKey = array('add-plan','plans','view-subscription','edit-plan','configurations');
                                $settingsActiveHook = in_array($this->uri->segment(2), $settingsHookKey) ? 'active open' : '';
                            ?>
                            <li class="slide has-sub <?= $settingsActiveHook ?>">
                                <a href="javascript:void(0);" class="side-menu__item <?= $settingsActiveHook ?>">
                                    <span class="side-menu__icon"><i class='ti ti-diamond'></i></span>
                                    <span class="side-menu__label">Subscriptions</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Subscriptions</a></li>
                                    <li class="slide">
                                        <a href="<?= site_url('subscription/add-plan') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'add-plan' ? 'active' : '' ?>">Add New</a>
                                    </li>
                                    <li class="slide">
                                        <a href="<?= site_url('subscription/plans') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'plans' ? 'active' : '' ?>">Manage</a>
                                    </li>
                                    <!-- <li class="slide">
                                        <a href="<?= site_url('subscription/configurations') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'configurations' ? 'active' : '' ?>">Manage Configurations</a>
                                    </li> -->
                                </ul>
                            </li>
                            <!-- End::Settings Slide -->

                            <!-- Start::Settings Slide -->
                            <?php
                                $settingsHookKey = array('drug-code','batch');
                                $settingsActiveHook = in_array($this->uri->segment(2), $settingsHookKey) ? 'active open' : '';
                            ?>
                            <li class="slide has-sub d-none <?= $settingsActiveHook ?>">
                                <a href="javascript:void(0);" class="side-menu__item <?= $settingsActiveHook ?>">
                                    <span class="side-menu__icon"><i class='ti ti-table'></i></span>
                                    <span class="side-menu__label">Master's</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Master's</a></li>
                                    <li class="slide">
                                        <a href="<?= site_url('master/drug-code') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'drug-code' ? 'active' : '' ?>">Drug Code</a>
                                    </li>
                                    <li class="slide">
                                        <a href="<?= site_url('master/batch') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'batch' ? 'active' : '' ?>">Batch</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- End::Settings Slide -->

                            <!-- Start::Settings Slide -->
                            <?php
                                $settingsHookKey = array('settings','change-password','profile-details','profile-update','site-settings');
                                $settingsActiveHook = in_array($this->uri->segment(2), $settingsHookKey) ? 'active open' : '';
                            ?>
                            <li class="slide has-sub <?= $settingsActiveHook ?>">
                                <a href="javascript:void(0);" class="side-menu__item <?= $settingsActiveHook ?>">
                                    <span class="side-menu__icon"><i class='bx bx-cog'></i></span>
                                    <span class="side-menu__label">Settings</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Settings</a></li>
                                    <li class="slide">
                                        <a href="<?= site_url('setting/site-settings') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'site-settings' ? 'active' : '' ?>">Site Settings</a>
                                    </li>
                                    <li class="slide">
                                        <a href="<?= site_url('setting/profile-details') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'profile-details' ? 'active' : '' ?>">Update Profile</a>
                                    </li>
                                    <li class="slide">
                                        <a href="<?= site_url('setting/change-password') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'change-password' ? 'active' : '' ?>">Update Password</a>
                                    </li>
                                    <!-- <li class="slide">
                                        <a href="<?= site_url('setting/smtp-setting') ?>" class="side-menu__item <?= $this->uri->segment(2) == 'smtp-setting' ? 'active' : '' ?>">SMTP Setting</a>
                                    </li> -->
                                </ul>
                            </li>
                            <!-- End::Settings Slide -->

                            <!-- Start::slide -->
                            <li class="slide">
                                <a href="<?= site_url('setting/backup') ?>" class="side-menu__item">
                                    <span class="side-menu__icon">
                                        <i class='bx bx-coin-stack'></i>
                                    </span> 
                                    <span class="side-menu__label">Backup</span>
                                </a>
                            </li>
                            <!-- End::slide -->


                            <!-- Start::slide__category -->
                            <li class="slide__category"><span class="category-name">OTHER's</span></li>
                            <!-- End::slide__category -->

                            <?php
                                $hookKey113 = array('login-history','view-history');
                                if(in_array($this->uri->segment(2),$hookKey113)){
                                    $activeHook113 = 'active';
                                    $openHook = 'open';
                                }else{
                                    $activeHook113 = '';
                                    $openHook = '';
                                }
                            ?>
                         
                            <li class="slide <?= $activeHook113 ?>">
                                <a href="<?= site_url('history/login-history') ?>" class="side-menu__item <?= $activeHook113 ?>">
                                    <span class="side-menu__icon">
                                        <i class='bx bx-history'></i>
                                    </span> 
                                    <span class="side-menu__label <?= $this->uri->segment(2) == 'login-history' ? 'active' : '' ?>">Login History</span>
                                </a>
                            </li>
                            <!-- End::slide -->

                            <!-- Start::slide -->
                            <li class="slide">
                                <a href="<?= site_url('auth/logout') ?>" class="side-menu__item">
                                    <span class="side-menu__icon">
                                        <i class='bx bx-power-off'></i>
                                    </span> 
                                    <span class="side-menu__label">Logout</span>
                                </a>
                            </li>
                            <!-- End::slide -->

                        </ul>
                   
                    <?php endif; ?>  
                    
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
                </nav>
                <!-- End::nav -->

            </div>
            <!-- End::main-sidebar -->

        </aside>
        <!-- End::app-sidebar -->