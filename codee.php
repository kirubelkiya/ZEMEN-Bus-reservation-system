<?php
session_start();
require 'dbcon.php';


if (isset($_POST['delete_customer'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['delete_customer']);

    $query = "DELETE FROM customer WHERE ID='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Customer Deleted Successfully";
        header("Location: customer-list.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Customer Not Deleted";
        header("Location: customer-list.php");
        exit(0);
    }
}




if (isset($_POST['update_customer'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['id']);
    $firstname = mysqli_real_escape_string($con, $_POST['fname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lname']);
    $sex = mysqli_real_escape_string($con, $_POST['sex']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phoneno = mysqli_real_escape_string($con, $_POST['phoneno']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $update_query = "UPDATE customer SET Firstname='$firstname', Lastname='$lastname', Sex='$sex', Email='$email', PhoneNumber='$phoneno', Password='$password' WHERE ID='$student_id'";
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        $_SESSION['success'] = "Customer information updated successfully";
        header("Location: customer-view.php?id=$student_id");
        exit();
    } else {
        $_SESSION['error'] = "Error occurred while updating customer information: " . mysqli_error($con);
        header("Location: customer-edit.php?id=$student_id");
        exit();
    }
}

if (isset($_POST['save_customer'])) {
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
        header("Location: customer-create.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Customer Not Created";
        header("Location: customer-create.php");
        exit(0);
    }
}
