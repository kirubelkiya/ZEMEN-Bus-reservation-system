<?php
session_start();
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
        $_SESSION['error'] = "Payment not found";
        header('Location: payment-list.php');
        exit();
    }
} else {
    // Redirect back to payment list if payment ID is not provided
    $_SESSION['error'] = "Payment ID not provided";
    header('Location: payment-list.php');
    exit();
}

// Check if form is submitted for deleting payment
if (isset($_POST['delete_payment'])) {
    // Delete payment record from the database
    $delete_query = "DELETE FROM Payment WHERE PaymentID = $payment_id";
    if (mysqli_query($con, $delete_query)) {
        $_SESSION['success'] = "Payment deleted successfully";
        // Redirect to payment list page after successful deletion
        header("Location: payment-list.php");
        exit();
    } else {
        $_SESSION['error'] = "Error occurred while deleting payment: " . mysqli_error($con);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Delete Payment</title>
    <link rel="stylesheet" href="./paymen-delete.css">
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2 style="text-align: center;">Delete Payment</h2>
                <div class="card">
                    <div class="card-header">
                        <h4>Payment Details</h4>
                        <div><a href="Payment-list.php" class="paymentback" id="back-button">BACK</a></div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" style="margin-bottom: 10px;">
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
                            </tbody>
                        </table>
                        <form method="post">
                            <button type="submit" name="delete_payment" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this payment?')">Delete</button>
                            <a href="payment-list.php" class="btn btn-primary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>