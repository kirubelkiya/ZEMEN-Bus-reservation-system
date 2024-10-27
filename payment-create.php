<?php
session_start();
require 'dbcon.php';

if(isset($_POST['save_payment'])) {
    // Retrieve form data
    $userID = $_POST['userID'];
    $paymentDate = $_POST['paymentDate'];
    $amount = $_POST['amount'];
    $paymentMethod = $_POST['paymentMethod'];
    $status = $_POST['status'];

    // Insert data into the Payment table
    $query = "INSERT INTO Payment (UserID, PaymentDate, Amount, PaymentMethod, Status) VALUES ('$userID', '$paymentDate', '$amount', '$paymentMethod', '$status')";
    if(mysqli_query($con, $query)) {
        $_SESSION['success'] = "Payment added successfully";
    } else {
        $_SESSION['error'] = "Error occurred while adding payment: " . mysqli_error($con);
    }
    header('Location: payment-view.php');
    exit();
}
?>
<!-- HTML form for creating a new payment -->
