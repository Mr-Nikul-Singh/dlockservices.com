<?php require_once(APPPATH.'views/admin/includes/header.inc.php'); ?>


    <div class="page">
        <?php require_once(APPPATH.'views/admin/includes/navbar.inc.php'); ?>


        <!-- Page Header -->
        <div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
            <h4 class="fw-medium mb-0">Settings</h4>
            <div class="ms-sm-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Database</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Backup</li>
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
                            <div class="card-header"><div class="card-title">Download Backup</div></div>
                            <div class="card-body">
                                <form action="<?= site_url('setting/start-backup') ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf__() ?>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <button class="btn btn-primary" type="submit">Start Backup</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-1 -->


                <div class="row">
                <?php
// Directory where backups are stored
$backupDir = 'assets/0000/23939/208203/';

// Get all files in the backup directory
$backupFiles = glob($backupDir . '*.sql');

// Prepare an array to store backup details
$backups = [];

foreach ($backupFiles as $file) {
    // Get the file name
    $fileName = basename($file);
    
    // Extract the timestamp (backup date) from the file name
    preg_match('/db-backup-(\d+)-/', $fileName, $matches);
    
    if (isset($matches[1])) {
        // Convert the timestamp into a human-readable date
        $backupDate = date('Y-m-d H:i:s', $matches[1]);
        
        // Add the backup details to the array
        $backups[] = [
            'file' => $fileName,
            'backupDate' => $backupDate,
        ];
    }
}

?>

                    <!-- HTML to display the backups -->
                    <div class="row">
                        <div class="col-12">
                            <h3>Database Backup Files</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Backup Date</th>
                                        <th>File Name</th>
                                        <th>Download</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Loop through the backups and display each one in the table
                                    foreach ($backups as $index => $backup) {
                                        echo "<tr>";
                                        echo "<td>" . ($index + 1) . "</td>";
                                        echo "<td>" . $backup['backupDate'] . "</td>";
                                        echo "<td>" . $backup['file'] . "</td>";
                                        echo "<td><a href='" . $backupDir . $backup['file'] . "' class='btn btn-primary' download>Download</a></td>";
                                        echo "<td><button class='btn btn-danger delete-btn' data-file='" . $backup['file'] . "'><i class='ti ti-trash'></i></button></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- End::app-content -->


        <?php require_once(APPPATH.'views/admin/includes/partial.footer.inc.php'); ?>

    </div>


<?php require_once(APPPATH.'views/admin/includes/footer.inc.php'); ?>


    <!-- AJAX Script for Deleting Backup -->
    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function() {
                var fileName = $(this).data('file');
                if (confirm("Are you sure you want to delete the backup file: " + fileName + "?")) {
                    // Send the request to the backend for deletion
                    $.ajax({
                        url: '<?= site_url('setting/delete-bakcup') ?>',
                        type: 'POST',
                        data: { file: fileName },
                        success: function(response) {
                            if (response === 'success') {
                                alert('Backup file deleted successfully.');
                                location.reload(); // Reload the page to update the list
                            } else {
                                alert('Error deleting the backup file.');
                            }
                        }
                    });
                }
            });
        });
    </script>