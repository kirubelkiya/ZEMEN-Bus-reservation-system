<?php
session_start();
require 'dbcon.php';

$query = "SELECT * FROM Payment";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $payments = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $payments = array(); // Empty array if no payments found
}

// Close database connection
mysqli_close($con);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./Payment-list.css">

    <title>Payment List</title>
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['success']; ?>
                    </div>
                    <?php unset($_SESSION['success']); ?>
                <?php elseif (isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error']; ?>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <h3 style="text-align: center; color: #007bff;">Payment List</h3>
                <a href="paymen-add.php" class="btn btn-primary mb-3" style="text-decoration: none;">Add Payment</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Payment Date</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($payments as $payment) : ?>
                            <tr>
                                <td><?= $payment['PaymentID']; ?></td>
                                <td><?= $payment['UserID']; ?></td>
                                <td><?= $payment['PaymentDate']; ?></td>
                                <td><?= $payment['Amount']; ?></td>
                                <td><?= $payment['PaymentMethod']; ?></td>
                                <td><?= $payment['Status']; ?></td>
                                <td>
                                    <a href="paymen-view.php?id=<?= $payment['PaymentID']; ?>" class="btn btn-info" style="text-decoration: none;">View</a>
                                    <a href="paymen-edit.php?id=<?= $payment['PaymentID']; ?>" class="btn btn-primary" style="text-decoration: none;">Edit</a>
                                    <a href="paymen-delete.php?id=<?= $payment['PaymentID']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this payment?')" style="text-decoration: none;">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>