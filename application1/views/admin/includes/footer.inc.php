    
    
    <div class="scrollToTop">
        <span class="arrow"><i class="bx bx-chevron-up fs-20" style="line-height: 2.5rem;"></i></span>
    </div>
    <div id="responsive-overlay"></div>
		
    <!-- Jquery JS -->
    <script src="<?= base_url('assets/js/jquery.3.2.1.min.js') ?>"></script>

    <!-- Popper JS -->
    <script src="<?= base_url('assets/libs/@popperjs/core/umd/popper.min.js') ?>"></script>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Defaultmenu JS -->
    <script src="<?= base_url('assets/js/defaultmenu.min.js') ?>"></script>

    <!-- Node Waves JS -->
    <script src="<?= base_url('assets/libs/node-waves/waves.min.js') ?>"></script>

    <!-- Sticky JS -->
    <script src="<?= base_url('assets/js/sticky.js') ?>"></script>

    <!-- Simplebar JS -->
    <script src="<?= base_url('assets/libs/simplebar/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/simplebar.js') ?>"></script>

    <!-- Color Picker JS -->
    <script src="<?= base_url('assets/libs/@simonwep/pickr/pickr.es5.min.js') ?>"></script>

    <script src="<?= base_url('assets/libs/apexcharts/apexcharts.min.js') ?>"></script>

    <!-- Custom-Switcher JS -->
    <script src="<?= base_url('assets/js/custom-switcher.min.js') ?>?v=<?= filemtime('assets/js/custom-switcher.min.js') ?>"></script>

    <!-- Custom JS -->
    <script src="<?= base_url('assets/js/custom.js') ?>?v=<?= filemtime('assets/js/custom.js') ?>"></script>

    <!-- Chart JS -->
	<script src="<?= base_url('assets/plugin/chart.js/chart.min.js') ?>"></script>

    <!-- jQuery Sparkline -->
    <script src="<?= base_url('assets/plugin/jquery.sparkline/jquery.sparkline.min.js') ?>"></script>

    <!-- Chart Circle -->
    <script src="<?= base_url('assets/plugin/chart-circle/circles.min.js') ?>"></script>

    <!-- Bootstrap Notify -->
	<script src="<?= base_url('assets/plugin/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

    <!-- Echarts JS -->
    <script src="<?= base_url('assets/libs/echarts/echarts.min.js') ?>"></script>

    <!-- Show Password JS -->
    <script src="<?= base_url('assets/js/show-password.js') ?>"></script>

    <script src="<?= base_url('assets/plugin/sweetalert/sweetalert.min.js') ?>"></script>

    <!-- Swiper JS -->
    <script src="<?= base_url('assets/libs/swiper/swiper-bundle.min.js') ?>"></script>
    
    <!-- Internal Product-Details JS -->
    <script src="<?= base_url('assets/js/product-details.js') ?>"></script>

    <!-- Select2 Cdn -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Internal Select-2.js -->
    <script src="<?= base_url('assets/js/select2.js') ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
	<script>
		// Initialize Clipboard.js
		new ClipboardJS('.input-group-text');
	</script>

    <script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
    <script src="<?= base_url('assets/ckeditor/ck_config.js') ?>"></script>
    
    <?php if(in_array($this->uri->segment(2),['dashboard','/','','reports','view-report'])): ?>
        <?php require_once(APPPATH.'views/admin/includes/phpjs/dashboard.php'); ?>
    <?php endif; ?>
    <?php require_once(APPPATH.'views/admin/includes/phpjs/customjs.php'); ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/emojionearea/dist/emojionearea.min.css">
    <script src="https://cdn.jsdelivr.net/npm/emojionearea/dist/emojionearea.min.js"></script>

        
    <!-- Gallery JS -->
    <script src="<?= base_url('assets/libs/glightbox/js/glightbox.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/gallery.js') ?>"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function() {
            $(".sortable").sortable({
            update: function(event, ui) {
                // Get the updated order
                var order = $(this).sortable('toArray', { attribute: 'data-id' });

                // Send the updated order to the server using AJAX
                $.ajax({
                type: 'POST',
                url: '<?= site_url('menu/update-menu-order') ?>', // Replace with your server-side script
                data: { order: order },
                success: function(response) {
                    // Handle the server response if needed
                    //alert(response);
                    var json = $.parseJSON(response)
                
                    $.notify({
                        icon: 'ti ti-'+json.icon,
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
                }
                });
            }
            });
        });

        // Dashbaord
        $(document).ready(function() {
            $(".sortable-dashboard-widgets-").sortable({
            update: function(event, ui) {
                // Get the updated order
                var order = $(this).sortable('toArray', { attribute: 'data-id' });

                // Send the updated order to the server using AJAX
                $.ajax({
                type: 'POST',
                url: '<?= site_url('menu/update-menu-order-') ?>', // Replace with your server-side script
                data: { order: order },
                success: function(response) {
                    // Handle the server response if needed
                    //alert(response);
                    var json = $.parseJSON(response)
                
                    $.notify({
                        icon: 'ti ti-'+json.icon,
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
                }
                });
            }
            });
        });
    </script>

    
    <script>
        $(document).ready(function() {
            $("#mytextarea").emojioneArea({
                pickerPosition: "bottom" // You can change the position of the emoji picker
            });
        });
    </script>

    
    <script>
        let idleTime = 0;
        const idleTimeout = 30 * 60 * 1000; // 30 minutes in milliseconds

        function resetIdleTime() {
            idleTime = 0;
        }

        function incrementIdleTime() {
            idleTime += 1000; // Increment by 1 second (1000 milliseconds)
            if (idleTime >= idleTimeout) {
                // Logout the user when idleTime exceeds idleTimeout
                logoutUser();
            }
        }

        function logoutUser() {
            // Implement logout logic here
            // For example, redirect the user to the logout page
            window.location.href = "<?= site_url('logout') ?>";
        }

        // Reset idleTime when there is user activity
        document.addEventListener("mousemove", resetIdleTime);
        document.addEventListener("keydown", resetIdleTime);

        // Increment idleTime every second (1000 milliseconds)
        setInterval(incrementIdleTime, 1000);
    </script>

    
    <script>
        function deleteNotif(id){
    
            $.post("<?= site_url('delete-notification') ?>",
            {
                id     : id,
            },
            function(data, status){
                var json = $.parseJSON(data)
                
                $.notify({
                    icon: 'ti ti-'+json.icon,
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
    


      <!-- Google tag (gtag.js) -->
     <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-WB4DRY3HM9"></script>
     <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
    
        gtag('config', 'G-WB4DRY3HM9');
     </script> -->
    


</body>
</html>