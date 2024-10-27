<?php
session_start();
require 'dbconT.php';


if (isset($_POST['save_db'])) {
    $id =mysqli_real_escape_string ($con,$_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
    $seat_number = mysqli_real_escape_string ($con,$_POST['seat_number']);
    $payment_done =mysqli_real_escape_string ($con, $_POST['payment_done']);
    $transaction_id = mysqli_real_escape_string ($con,$_POST['transaction_id']);
    $transaction_link =mysqli_real_escape_string ($con, $_POST['transaction_link']);

    $query = "INSERT INTO transaction (name,phone_number, seat_number, payment_done, transaction_id, transaction_link) 
              VALUES ('$name', '$phone_number', '$seat_number', '$payment_done', '$transaction_id', '$transaction_link')";
          $query_run=mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Transaction added successfully";
        header("Location: f.php");
    exit(0);
    } else {
        $_SESSION['message'] = "Failed to add Transaction: " ;
        header("Location: f.php");
        exit(0);
    }

    
}
?>
    