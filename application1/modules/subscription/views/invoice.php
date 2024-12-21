<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }
        .invoice-header {
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            margin: 0;
            font-size: 24px;
            line-height: 24px;
        }
        .invoice-header small {
            display: block;
            margin-top: 10px;
            color: #666;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-details th, .invoice-details td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .invoice-details th {
            background-color: #f5f5f5;
        }
        .invoice-summary {
            margin-top: 20px;
        }
        .invoice-summary table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-summary th, .invoice-summary td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .invoice-summary th {
            background-color: #f5f5f5;
        }
        @media print {
            .print-btn {
                display: block;
            }
        }
        .print-btn {
            display: inline-block;
            padding: 8px 10px;
            font-size: 16px;
            cursor: pointer;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>


    <br>
    <br>
    <br>
    <br>

    <?php foreach($get_invoice_data as $inv): ?>

    <div class="invoice-box">
        <div class="invoice-header">
            <h1>Payment Receipt</h1>
            <small>Order ID: <?= $inv->order_id ?></small>
            <small>Date: <?= date('d-M-Y h:i A', strtotime($inv->created_at)) ?></small>
        </div>
        <div class="invoice-details">
            <table>
                <tr>
                    <th>Buyer Name</th>
                    <td><?= $inv->username ?></td>
                </tr>
                <tr>
                    <th>Plan Name</th>
                    <td><?= $inv->plan_name ?></td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>Rs.<?= $inv->amount ?></td>
                </tr>
                <tr>
                    <th>Currency</th>
                    <td><?= $inv->currency ?></td>
                </tr>
                <tr>
                    <th>Payment Status</th>
                    <td><?= $inv->payment_status ?></td>
                </tr>
                <!-- <tr>
                    <th>Payment Method</th>
                    <td> <?= $inv->payment_method ?? 'N/A' ?></td>
                </tr> -->
            </table>
        </div>
        <div class="invoice-summary">
            <table>
                <tr>
                    <th>Total Amount</th>
                    <td>Rs.<?= $inv->amount ?></td>
                </tr>
            </table>
        </div>

        <br>
        <br>
        <br>
      
        <button class="print-btn" onclick="handlePrint()">
        <i class="fas fa-print"></i> Print Receipt
        </button>

        <script>
            function handlePrint() {
                var button = document.querySelector('.print-btn');
                button.classList.add('hidden');  // Hide the button
                window.print();  // Trigger the print function

                setTimeout(function() {
                    button.classList.remove('hidden');  // Show the button after 3 seconds
                }, 000);
            }
        </script>



    </div>
    <?php endforeach; ?>
</body>
</html>
