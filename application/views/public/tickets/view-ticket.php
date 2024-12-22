<?php require_once(APPPATH.'views/public/includes/header.inc.php'); ?>
<?php require_once(APPPATH.'views/public/includes/light-navbar.inc.php'); ?>


<div class="container mt-100 mt-60 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
        
        <div class="card-body">
                <div class="table-responsive"> 
                    <table class="table text-nowrap table-striped table-hover">

                        <h4>Ticket ID: <strong>#<?= $ticket->ticket_id ?></strong></h1>
                        <h4>Ticket: <?= $ticket->subject ?></h1>
                        <p><strong>Priority:</strong>
                            <?php 
                                $status = ($ticket->status); 
                                $badgeClass = '';

                                // Assign badge color classes based on the status
                                switch ($status) {
                                    case 'Open':
                                        $badgeClass = 'badge bg-primary'; // Blue for Open
                                        break;
                                    case 'In Progress':
                                        $badgeClass = 'badge bg-warning'; // Yellow for In Progress
                                        break;
                                    case 'Resolved':
                                        $badgeClass = 'badge bg-success'; // Green for Resolved
                                        break;
                                    case 'Closed':
                                        $badgeClass = 'badge bg-danger'; // Grey for Closed
                                        break;
                                    default:
                                        $badgeClass = 'badge bg-dark'; // Dark for Unknown statuses
                                }
                            ?>
                            <span class="<?= $badgeClass; ?>">
                                <?= $status; ?>
                            </span>
                        </p>
                        <p><strong>Priority:</strong> <?= $ticket->priority ?></p>
                        <p><strong>Description:</strong> <?= $ticket->description ?></p>

                        <hr>
                        <h5 class="mt-4 mb-4 text-primary">Replies</h5>

                        <div class="mb-4">
                            <?php if (!empty($replies)): ?>
                                <?php foreach ($replies as $reply): ?>
                                    <div class="reply-container mb-4 p-3 rounded brder">
                                        <div class="d-flex align-items-center mb-2">
                                            <!-- User Avatar -->
                                            <div class="avatar me-3">
                                                <img src="https://via.placeholder.com/40" 
                                                    alt="<?= htmlspecialchars($reply->replied_by_name) ?>" 
                                                    class="rounded-circle border" 
                                                    style="width: 40px; height: 40px; object-fit: cover;">
                                            </div>

                                            <!-- User Details -->
                                            <div>
                                                <h6 class="mb-0 fw-semibold"><?= htmlspecialchars($reply->replied_by_name) ?></h6>
                                                <small class="text-muted"><?= date('F j, Y, g:i A', strtotime($reply->created_at)) ?></small>
                                            </div>
                                        </div>

                                        <!-- Reply Message -->
                                        <div class="message bg-light p-3 rounded">
                                            <?= decode($reply->reply_message) ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="text-center py-4">
                                    <p class="text-muted fs-5">No replies yet. Be the first to add one!</p>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Styling -->
                        <style>
                            .reply-container {
                                background-color: #fff;
                                border: 1px solid #e3e3e3;
                                border-radius: 10px;
                                /* box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); */
                            }
                            .avatar img {
                                border: 2px solid #ddd;
                            }
                            .message {
                                font-size: 0.95rem;
                                line-height: 1.6;
                                color: #333;
                            }
                            .message.bg-light {
                                background-color: #f8f9fa;
                            }
                            .reply-container h6 {
                                margin-bottom: 0.3rem;
                                font-weight: bold;
                                color: #333;
                            }
                            .reply-container small.text-muted {
                                color: #6c757d;
                            }
                        </style>

                        <?php if($ticket->status !== 'Closed'): ?>

                        <hr>
                        <h5>Add Reply</h5>
                        <form action="<?= site_url('add-ticket-reply/'.$ticket->id) ?>" method="post">
                            <textarea name="reply_message" id="mytextarea1" rows="5" class="form-control" placeholder="Enter your reply..." required></textarea><br>
                            <input type="checkbox" name="is_private" value="1"> Mark as Private<br>
                            <button type="submit" class="btn btn-sm btn-primary mt-4">Submit Reply</button>
                        </form>

                        <?php endif; ?>

                    </table>
                </div>
            </div>


        </div>
    </div>
</div>


<?php require_once(APPPATH.'views/public/includes/footer.inc.php'); ?>