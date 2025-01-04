<?php require_once(APPPATH.'views/public/includes/header.inc.php'); ?>
<?php require_once(APPPATH.'views/public/includes/light-navbar.inc.php'); ?>

        <!-- Home Start -->
        <section class="bg-half-170 d-table w-100 bg-white" style="background: url('assets/public/images/bg/contact.png') top center;" id="home">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="title-heading text-center text-md-start">
                            <h3>Get in touch !</h3>
                            <p class="text-muted para-desc mt-3 mb-0">Hello, Contact now it's free.</p> 
                            <nav aria-label="breadcrumb" class="d-inline-block mt-4">
                                <ul class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">Dlockservices</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                                </ul>
                            </nav>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 1000 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 0 0 c 0 0 200 50 500 50 s 500 -50 500 -50 v 101 h -1000 v -100 z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- Home End -->

        <section class="section pb-0" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-detail text-center">
                            <div class="icon">
                                <i data-feather="phone" class="fea icon-md"></i>
                            </div>
                            <div class="content mt-4">
                                <h6 class="title text-uppercase fw-bold">Phone</h6>
                                <p class="text-muted">Promising development turmoil inclusive education transformative community</p>
                                <a href="tel:+152534-468-854" class="text-primary">+91 83-0257-4035</a>
                            </div>  
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-md-4 mt-4 pt-2 mt-sm-0 pt-sm-0">
                        <div class="contact-detail text-center">
                            <div class="icon">
                                <i data-feather="mail" class="fea icon-md"></i>
                            </div>
                            <div class="content mt-4">
                                <h6 class="title text-uppercase fw-bold">Email</h6>
                                <p class="text-muted">Promising development turmoil inclusive education transformative community</p>
                                <a href="mailto:contact@example.com" class="text-primary">contact@dlockservices.com</a>
                            </div>  
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-md-4 mt-4 pt-2 mt-sm-0 pt-sm-0">
                        <div class="contact-detail text-center">
                            <div class="icon">
                                <i data-feather="map-pin" class="fea icon-md"></i>
                            </div>
                            <div class="content mt-4">
                                <h6 class="title text-uppercase fw-bold">Location</h6>
                                <p class="text-muted">Shanti nagar, mansarovar, <br>Jaipur, 302018</p>
                                <a href="#" class="video-play-icon text-primary">Rajasthan</a>
                            </div>  
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
            
            <div class="container mt-100 mt-60">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="custom-form">
                            <form method="post" name="myForm" id="contactForm">
                                <p id="error-msg"></p>
                                <div id="simple-msg"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <input name="name" id="name" type="text" class="form-control" placeholder="Name :">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <input name="email" id="email" type="email" class="form-control" placeholder="Email :">
                                            </div>
                                        </div> 
                                    </div><!--end col-->

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Subject</label>
                                            <div class="form-icon position-relative">
                                                <input name="subject" id="subject" class="form-control" placeholder="subject :">
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Comments <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Message :"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form>
                        </div><!--end custom-form-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <br>
            <br>
            <br>

            <div class="container-fluid mt-100 mt-60 d-none">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="card map border-0">
                            <div class="card-body p-0">
                                <?php if(!empty($google_map)): ?>
                                    <?= $google_map ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->

<?php require_once(APPPATH.'views/public/includes/footer.inc.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();

        // Basic front-end validation
        let name = $('#name').val();
        let email = $('#email').val();
        let comments = $('#comments').val();

        if (!name || !email || !comments) {
            $('#error-msg').text('All fields marked with * are required.');
            return;
        }

        $.ajax({
            url: '<?= site_url("submit-contact") ?>',  // Make sure this route matches the backend
            type: 'POST',
            data: $(this).serialize(),  // Serialize form data
            dataType: 'json',  // Ensure server response is JSON
            success: function(response) {
                if (response.success) {
                    $('#simple-msg').addClass('alert alert-success').text('Thank you! Your message has been sent successfully.');
                    $('#contactForm')[0].reset();
                } else {
                    $('#error-msg').text(response.error || 'An error occurred. Please try again.');
                }
            },
            error: function() {
                $('#error-msg').text('An error occurred. Please try again.');
            }
        });
    });
});
</script>
