<?php
//session_start();
require 'dbcon.php';

// Check if payment ID is set in URL
if (isset($_GET['id'])) {
    $payment_id = $_GET['id'];

    // Fetch payment details from the database
    $query = "SELECT * FROM Payment WHERE PaymentID = $payment_id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $payment = mysqli_fetch_assoc($result);
    } else {
        // Redirect back to payment list if payment ID is invalid
        header('Location: payment-list.php');
        exit();
    }
} else {
    // Redirect back to payment list if payment ID is not provided
    header('Location: payment-list.php');
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./paymen-view.css">

    <title>Payment Details</title>
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Payment Details</h4>
                        <div><a href="Payment-list.php" class="paymentback" id="back-button">BACK</a></div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td><?= $payment['PaymentID']; ?></td>
                                </tr>
                                <tr>
                                    <th>User ID</th>
                                    <td><?= $payment['UserID']; ?></td>
                                </tr>
                                <tr>
                                    <th>Payment Date</th>
                                    <td><?= $payment['PaymentDate']; ?></td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td><?= $payment['Amount']; ?></td>
                                </tr>
                                <tr>
                                    <th>Payment Method</th>
                                    <td><?= $payment['PaymentMethod']; ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><?= $payment['Status']; ?></td>
                                </tr>
                                <tr>
                                    <th>Ticket</th>
                                    <td>
                                        <!-- Download Ticket Button -->
                                        <a href="download-ticket.php?id=<?= $payment['PaymentID']; ?>" class="btn btn-success">Download Ticket</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="payment-list.php" class="btn btn-primary">Back to Payment List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>