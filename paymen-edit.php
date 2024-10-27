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

// Check if form is submitted
if (isset($_POST['update_payment'])) {
    // Retrieve form data
    $userID = $_POST['userID'];
    $paymentDate = $_POST['paymentDate'];
    $amount = $_POST['amount'];
    $paymentMethod = $_POST['paymentMethod'];
    $status = $_POST['status'];

    // Update payment record in the database
    $update_query = "UPDATE Payment SET UserID = '$userID', PaymentDate = '$paymentDate', Amount = '$amount', PaymentMethod = '$paymentMethod', Status = '$status' WHERE PaymentID = $payment_id";
    if (mysqli_query($con, $update_query)) {
        $_SESSION['success'] = "Payment updated successfully";
        // Redirect to payment view page after successful update
        header("Location: payment-view.php?id=$payment_id");
        exit();
    } else {
        $_SESSION['error'] = "Error occurred while updating payment: " . mysqli_error($con);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Payment</title>
    <link rel="stylesheet" href="./paymen-edit.css">
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Payment</h4>
                        <div><a href="Payment-list.php" class="paymentback" id="back-button">BACK</a></div>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="userID" class="form-label">User ID</label>
                                <input type="text" class="form-control" id="userID" name="userID" value="<?= $payment['UserID']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="paymentDate" class="form-label">Payment Date</label>
                                <input type="date" class="form-control" id="paymentDate" name="paymentDate" value="<?= $payment['PaymentDate']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="text" class="form-control" id="amount" name="amount" value="<?= $payment['Amount']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="paymentMethod" class="form-label">Payment Method</label>
                                <input type="text" class="form-control" id="paymentMethod" name="paymentMethod" value="<?= $payment['PaymentMethod']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="status" value="<?= $payment['Status']; ?>">
                            </div>
                            <button type="submit" name="update_payment" class="btn btn-primary">Update Payment</button>
                            <a href="payment-view.php?id=<?= $payment_id; ?>" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>