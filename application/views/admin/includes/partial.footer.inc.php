        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <span class="input-group">
                    <input type="search" class="form-control px-2 " placeholder="Search..." aria-label="Username">
                    <a href="javascript:void(0);" class="input-group-text bg-primary text-white" id="Search-Grid"><i class="fe fe-search header-link-icon fs-18"></i></a>
                    </span>
                    <div class="mt-3">
                    <div class="">
                        <p class="fw-semibold text-muted mb-2 fs-13">Recent Searches</p>
                        <div class="ps-2">
                            <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>People<span></span></a>
                            <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>Pages<span></span></a>
                            <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>Articles<span></span></a>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="fw-semibold text-muted mb-2 fs-13">Apps and pages</p>
                        <ul class="ps-2">
                            <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                <a href="full-calendar.html"><span><i class='bx bx-calendar me-2 fs-14 bg-primary-transparent p-2 rounded-circle '></i>Calendar</span></a>
                            </li>
                            <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                <a href="mail.html"><span><i class='bx bx-envelope me-2 fs-14 bg-primary-transparent p-2 rounded-circle'></i>Mail</span></a>
                            </li>
                            <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                <a href="buttons.html"><span><i class='bx bx-dice-1 me-2 fs-14 bg-primary-transparent p-2 rounded-circle '></i>Buttons</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="mt-3">
                        <p class="fw-semibold text-muted mb-2 fs-13">Links</p>
                        <ul class="ps-2">
                            <li class="p-1 align-items-center  mb-1 search-app">
                                    <a href="javascript:void(0)" class="text-primary"><u>racoonpy.com</u></a>
                            </li>
                            <li class="p-1 align-items-center mb-1 search-app">
                                    <a href="javascript:void(0)"  class="text-primary"><u>racoonpy.com</u></a>
                            </li>
                        </ul>
                    </div> -->
                    </div>
                </div>
                <div class="modal-footer d-block">
                <div class="text-center">
                    <a href="javascript:void(0)" class="text-primary text-decoration-underline fs-15">View all results</a>
                </div>
                </div>
            </div>
            </div>
        </div>
         <!-- Footer Start -->
         <footer class="footer mt-auto py-3 bg-white text-center">
            <div class="container">
                <span class="text-muted">
                    Copyright @ 
                <span id="year"></span>  | 
                <em style="color:#B17457;">Version  <?= SOFTWARE_VERSION ?></em>
                </span>
            </div>
            
         </footer>
         
         <!-- Footer End -->
        <!-- Sidebar-right -->
        <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="sidebar-right">
            <div class="offcanvas-body">
                <ul class="nav nav-tabs tab-style-1 d-sm-flex d-block" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#orders-1" aria-current="page" ><i class="bx bx-user-plus me-1 fs-16 align-middle"></i>Team</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#accepted-1"><i
                                class="bx bx-pulse me-1 fs-16 align-middle"></i>Timeline</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#declined-1"><i
                                class="bx bx-message-square-dots me-1 fs-16 align-middle"></i>Chat</button>
                    </li>
                </ul>
                <div class="ms-auto my-auto">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"> <i
                            class="bx bx-x sidebar-btn-close"></i></button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="orders-1" role="tabpanel">
                        <div class="card-body p-0">
                            <input type="text" class="form-control" id="inlinecalendar" placeholder="Choose date">
                        </div>
                        <div class="d-flex pt-4 mt-3 pb-3 align-items-center">
                            <div>
                                <h6 class="fw-semibold mb-0">Team Members</h6>
                            </div>
                            <div class="ms-auto">
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="btn-outline-light btn btn-sm text-muted"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        View All<i class="ri-arrow-down-s-line align-middle ms-1"></i>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="border-bottom"><a class="dropdown-item" href="javascript:void(0);">Today</a>
                                        </li>
                                        <li class="border-bottom"><a class="dropdown-item" href="javascript:void(0);">This
                                                Week</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Last Week</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul class="ps-0 vertical-scroll">
                            <li class="item">
                                <div class="rounded-2 p-3 border mb-2">
                                    <div class="d-flex">
                                        <a href="profile.html"><img src="../assets/images/faces/16.jpg" alt="img"
                                                class="avatar avatar-md rounded-2 me-3"></a>
                                        <div class="me-3">
                                            <a href="profile.html">
                                                <h6 class="mb-0 fw-semibold text-default">Vanessa James</h6>
                                            </a>
                                            <span class="clearfix"></span>
                                            <span class="fs-12 text-muted">Front-end Developer</span>
                                        </div>
                                        <a aria-label="anchor" href="javascript:void(0);" class="ms-auto my-auto"> <i
                                                class="ri-arrow-right-s-line text-muted fs-20"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="rounded-2 p-3 border mb-2">
                                    <div class="d-flex">
                                        <a href="profile.html"><span
                                                class="avatar avatar-md rounded-2 bg-primary-transparent text-primary me-3">KH</span></a>
                                        <div class="me-3">
                                            <a href="profile.html">
                                                <h6 class="mb-0 fw-semibold text-default">Kriti Harris</h6>
                                            </a>
                                            <span class="clearfix"></span>
                                            <span class="fs-12 text-muted">Back-end Developer</span>
                                        </div>
                                        <a aria-label="anchor" href="javascript:void(0);" class="ms-auto my-auto"> <i
                                                class="ri-arrow-right-s-line text-muted fs-20"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="rounded-2 p-3 border mb-2">
                                    <div class="d-flex">
                                        <a href="profile.html"><img src="../assets/images/faces/6.jpg" alt="img"
                                                class="avatar avatar-md rounded-2 me-3"></a>
                                        <div class="me-3">
                                            <a href="profile.html">
                                                <h6 class="mb-0 fw-semibold text-default">Mira Henry</h6>
                                            </a>
                                            <span class="clearfix"></span>
                                            <span class="fs-12 text-muted">UI / UX Designer</span>
                                        </div>
                                        <a aria-label="anchor" href="javascript:void(0);" class="ms-auto my-auto"> <i
                                                class="ri-arrow-right-s-line text-muted fs-20"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="rounded-2 p-3 border mb-2">
                                    <div class="d-flex">
                                        <a href="profile.html"><span
                                                class="avatar avatar-md rounded-2 bg-secondary-transparent text-secondary me-3">JK</span></a>
                                        <div class="me-3">
                                            <a href="profile.html">
                                                <h6 class="mb-0 fw-semibold text-default">James Kimberly</h6>
                                            </a>
                                            <span class="clearfix"></span>
                                            <span class="fs-12 text-muted">Angular Developer</span>
                                        </div>
                                        <a aria-label="anchor" href="javascript:void(0);" class="ms-auto my-auto"> <i
                                                class="ri-arrow-right-s-line text-muted fs-20"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="rounded-2 p-3 border mb-2">
                                    <div class="d-flex">
                                        <a href="profile.html"><img src="../assets/images/faces/9.jpg" alt="img"
                                                class="avatar avatar-md rounded-2 me-3"></a>
                                        <div class="me-3">
                                            <a href="profile.html">
                                                <h6 class="mb-0 fw-semibold text-default">Marley Paul</h6>
                                            </a>
                                            <span class="clearfix"></span>
                                            <span class="fs-12 text-muted">Front-end Developer</span>
                                        </div>
                                        <a aria-label="anchor" href="javascript:void(0);" class="ms-auto my-auto"> <i
                                                class="ri-arrow-right-s-line text-muted fs-20"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="rounded-2 p-3 border mb-2">
                                    <div class="d-flex">
                                        <a href="profile.html"><span
                                                class="avatar avatar-md rounded-2 bg-success-transparent text-success me-3">MA</span></a>
                                        <div class="me-3">
                                            <a href="profile.html">
                                                <h6 class="mb-0 fw-semibold text-default">Mitrona Anna</h6>
                                            </a>
                                            <span class="clearfix"></span>
                                            <span class="fs-12 text-muted">UI / UX Designer</span>
                                        </div>
                                        <a aria-label="anchor" href="javascript:void(0);" class="ms-auto my-auto"> <i
                                                class="ri-arrow-right-s-line text-muted fs-20"></i></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="accepted-1" role="tabpanel">
                        <ul class="activity-list">
                            <li class="d-flex mt-4">
                                <div>
                                    <i class="activity-icon">
                                        <a href="profile.html"><img src="../assets/images/faces/14.jpg" alt="img"
                                                class="avatar avatar-xs rounded-2 me-3"></a>
                                    </i>
                                    <a href="profile.html">
                                        <h6 class="text-default">Elmer Barnes
                                            <span class="text-muted fs-11 mx-2 fw-normal">Today 02:41 PM</span>
                                        </h6>
                                    </a>
                                    <p class="text-muted fs-12 mb-0">Added 1 attachment <strong>docfile.doc</strong></p>
                                    <div class="btn-group file-attach mt-3" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-sm btn-primary-light">
                                            <span class="ri-file-line me-2"></span> Image_file.jpg
                                        </button>
                                        <button type="button" class="btn btn-sm btn-primary-light" aria-label="Close">
                                            <span class="ri-download-2-line"></span>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mt-4">
                                <div>
                                    <i class="activity-icon">
                                        <span class="avatar avatar-xs brround bg-success">RN</span>
                                    </i>
                                    <a href="profile.html">
                                        <h6 class="text-default">Roxanne Nunez
                                            <span class="text-muted fs-11 mx-2 fw-normal">Today 11:40 AM</span>
                                        </h6>
                                    </a>
                                    <p class="text-muted fs-12 mb-0">Commented on <strong>Task Management</strong></p>
                                    <div class="activity-comment mt-3">
                                        <p>There are many variations of passages of Lorem Ipsum available.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mt-4">
                                <div>
                                    <i class="activity-icon">
                                        <span class="avatar avatar-xs brround bg-primary"><i
                                                class="ri-shield-line text-white"></i></span>
                                    </i>
                                    <a href="profile.html">
                                        <h6 class="text-default">Shirley Vega
                                            <span class="text-muted fs-11 mx-2 fw-normal">Today 08:43 AM</span>
                                        </h6>
                                    </a>
                                    <p class="text-muted fs-12 mb-0">Task Closed by <strong> Today</strong></p>
                                </div>
                            </li>
                            <li class="d-flex mt-4">
                                <div>
                                    <i class="activity-icon">
                                        <a href="profile.html"><img src="../assets/images/faces/11.jpg" alt="img"
                                                class="avatar avatar-xs rounded-2 me-3"></a>
                                    </i>
                                    <a href="profile.html">
                                        <h6 class="text-default">Vivian Herrera
                                            <span class="text-muted fs-11 mx-2 fw-normal">Today 08:00 AM</span>
                                        </h6>
                                    </a>
                                    <p class="text-muted fs-12 mb-0">Assigned a new Task on <strong> UI Design</strong></p>
                                </div>
                            </li>
                            <li class="d-flex mt-4">
                                <div>
                                    <i class="activity-icon">
                                        <span class="avatar avatar-xs brround bg-success">TJ</span>
                                    </i>
                                    <a href="profile.html">
                                        <h6 class="text-default">Tony Jarvis
                                            <span class="text-muted fs-11 mx-2 fw-normal">Yesterday 05:40 PM</span>
                                        </h6>
                                    </a>
                                    <p class="text-muted fs-12 mb-0">Added 3 attachments <strong>Project</strong></p>
                                    <div class="activity-images mt-3">
                                        <a href="gallery.html"><img src="../assets/images/media/media-34.jpg" alt="thumb1"></a>
                                        <a href="gallery.html"><img src="../assets/images/media/media-35.jpg" alt="thumb1"></a>
                                        <a href="gallery.html"><img src="../assets/images/media/media-36.jpg" alt="thumb1"></a>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mt-4">
                                <div>
                                    <i class="activity-icon">
                                        <a href="profile.html"><img src="../assets/images/faces/16.jpg" alt="img"
                                                class="avatar avatar-xs rounded-2 me-3"></a>
                                    </i>
                                    <a href="profile.html">
                                        <h6 class="text-default">Russell Kim
                                            <span class="text-muted fs-11 mx-2 fw-normal">17 May 2022</span>
                                        </h6>
                                    </a>
                                    <p class="text-muted fs-12 mb-0">Created a group <strong> Team Unity</strong></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="declined-1" role="tabpanel">
                        <div class="list-group list-group-flush">
                            <div class="pt-3 fw-semibold ps-2 text-muted">Today</div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <a href="profile.html"><img src="../assets/images/faces/16.jpg" alt="img"
                                            class="avatar avatar-md rounded-2"></a>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <h6 class="fw-semibold mb-0">Leon Ray</h6>
                                        <p class="mb-0 fs-12 text-muted"> 2 mins ago </p>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light  me-1"><i
                                            class="ri-phone-line text-success"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-sm btn-outline-light"><i
                                            class="ri-chat-3-line text-primary"></i></a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md rounded-2 bg-danger-transparent text-danger">DT
                                        <span class="avatar-status bg-success"></span>
                                    </span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <h6 class="fw-semibold mb-0">Dane Tillery</h6>
                                        <p class="mb-0 fs-12 text-muted"> 10 mins ago </p>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light  me-1"><i
                                            class="ri-phone-line text-success"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-sm btn-outline-light"><i
                                            class="ri-chat-3-line text-primary"></i></a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <a href="profile.html"><img src="../assets/images/faces/16.jpg" alt="img"
                                            class="avatar avatar-md rounded-2"></a>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <h6 class="fw-semibold mb-0">Zelda Perkins</h6>
                                        <p class="mb-0 fs-12 text-muted"> 3 hours ago </p>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light  me-1"><i
                                            class="ri-phone-line text-success"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-sm btn-outline-light"><i
                                            class="ri-chat-3-line text-primary"></i></a>
                                </div>
                            </div>
                            <div class="py-3 fw-semibold ps-2 text-muted">Yesterday</div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md rounded-2 bg-primary-transparent text-primary">GB
                                        <span class="avatar-status bg-success"></span>
                                    </span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <h6 class="fw-semibold mb-0">Gaylord Barrett</h6>
                                        <p class="mb-0 fs-12 text-muted"> 12:40 pm </p>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light  me-1"><i
                                            class="ri-phone-line text-success"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-sm btn-outline-light"><i
                                            class="ri-chat-3-line text-primary"></i></a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <a href="profile.html"><img src="../assets/images/faces/16.jpg" alt="img"
                                            class="avatar avatar-md rounded-2"></a>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <h6 class="fw-semibold mb-0">Roger Bradley</h6>
                                        <p class="mb-0 fs-12 text-muted"> 01:00 pm </p>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light  me-1"><i
                                            class="ri-phone-line text-success"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-sm btn-outline-light"><i
                                            class="ri-chat-3-line text-primary"></i></a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <a href="profile.html"><img src="../assets/images/faces/16.jpg" alt="img"
                                            class="avatar avatar-md rounded-2"></a>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <h6 class="fw-semibold mb-0">Magnus Haynes</h6>
                                        <p class="mb-0 fs-12 text-muted"> 03:53 pm </p>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light  me-1"><i
                                            class="ri-phone-line text-success"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-sm btn-outline-light"><i
                                            class="ri-chat-3-line text-primary"></i></a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md rounded-2 bg-secondary-transparent text-secondary">DC
                                        <span class="avatar-status bg-gray"></span>
                                    </span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <h6 class="fw-semibold mb-0">Doran Chasey</h6>
                                        <p class="mb-0 fs-12 text-muted"> 06:00 pm </p>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light  me-1"><i
                                            class="ri-phone-line text-success"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-sm btn-outline-light"><i
                                            class="ri-chat-3-line text-primary"></i></a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md rounded-2 bg-warning-transparent text-warning">EW
                                        <span class="avatar-status bg-danger"></span>
                                    </span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <h6 class="fw-semibold mb-0">Ellery Wolfe</h6>
                                        <p class="mb-0 fs-12 text-muted"> 08:46 pm </p>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light  me-1"><i
                                            class="ri-phone-line text-success"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-sm btn-outline-light"><i
                                            class="ri-chat-3-line text-primary"></i></a>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="javascript:void(0)" class="btn btn-sm text-primary text-decoration-underline">View
                                    all</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/Sidebar-right-->

        <!-- Date & Time Picker JS -->

        <script src="<?= base_url('assets/libs/flatpickr/flatpickr.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/date&time_pickers.js') ?>"></script>
        