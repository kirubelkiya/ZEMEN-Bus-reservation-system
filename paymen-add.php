<?php
//session_start();
require 'dbcon.php';

// Check if form is submitted
if (isset($_POST['add_payment'])) {
    // Retrieve form data
    $userID = $_POST['userID'];
    $paymentDate = $_POST['paymentDate'];
    $amount = $_POST['amount'];
    $paymentMethod = $_POST['paymentMethod'];
    $status = $_POST['status'];

    // Insert new payment record into the database
    $insert_query = "INSERT INTO Payment (UserID, PaymentDate, Amount, PaymentMethod, Status) VALUES ('$userID', '$paymentDate', '$amount', '$paymentMethod', '$status')";
    if (mysqli_query($con, $insert_query)) {
        $_SESSION['success'] = "Payment added successfully";
        // Redirect to payment list page after successful addition
        header("Location: payment-list.php");
        exit();
    } else {
        $_SESSION['error'] = "Error occurred while adding payment: " . mysqli_error($con);
    }
}

// Clear session variables after displaying messages
unset($_SESSION['success']);
unset($_SESSION['error']);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./paymen-add.css">
    <title>Add Payment</title>
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex;">
                        <h4>Add Payment</h4>
                        <div><a href="Payment-list.php" class="paymentback" id="back-button" >BACK</a></div>
                    </div>
                    <div class=" card-body">
                                <?php if (isset($_SESSION['success'])) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $_SESSION['success']; ?>
                                    </div>
                                <?php elseif (isset($_SESSION['error'])) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $_SESSION['error']; ?>
                                    </div>
                                <?php endif; ?>
                                <form method="POST">
                                    <div class="mb-3">
                                        <label for="userID" class="form-label">User ID</label>
                                        <input type="text" class="form-control" id="userID" name="userID">
                                    </div>
                                    <div class="mb-3">
                                        <label for="paymentDate" class="form-label">Payment Date</label>
                                        <input type="date" class="form-control" id="paymentDate" name="paymentDate">
                                    </div>
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="text" class="form-control" id="amount" name="amount">
                                    </div>
                                    <div class="mb-3">
                                        <label for="paymentMethod" class="form-label">Payment Method</label>
                                        <input type="text" class="form-control" id="paymentMethod" name="paymentMethod">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <input type="text" class="form-control" id="status" name="status">
                                    </div>
                                    <button type="submit" name="add_payment" class="btn btn-primary">Add Payment</button>
                                    <a href="payment-list.php" class="btn btn-secondary">Cancel</a>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>