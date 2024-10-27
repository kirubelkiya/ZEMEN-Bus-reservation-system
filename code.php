<?php
session_start();
require 'dbcon.php';

if (isset($_POST['delete_student'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM customer WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Customer Deleted Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Customer Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}



if (isset($_POST['save_student'])) {
    $firstname = mysqli_real_escape_string($con, $_POST['fname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lname']);
    $sex = mysqli_real_escape_string($con, $_POST['sex']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phoneno']);
    $passw= mysqli_real_escape_string($con, $_POST['password']);

    $query = "INSERT INTO customer (Firstname,Lastname,Sex,Email,PhoneNumber,Password) VALUES ('$firstname','$lastname',' $sex','$email','$phone','$passw')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Customer Created Successfully";
        header("Location: student-create.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Customer Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}
