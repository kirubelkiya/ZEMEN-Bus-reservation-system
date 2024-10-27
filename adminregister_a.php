<?php
extract($_POST);
include("adminsterdatabase.php");

$sql = mysqli_query($conn, "SELECT * FROM admin_register where Email='$email'");
if (mysqli_num_rows($sql) > 0) {
    echo "Email Id Already Exists";
    exit;
} else {
    $query = "INSERT INTO admin_register(First_Name, Last_Name,Email, Password) VALUES ('$first_name', '$last_name', '$email', '" . $pass . "')";
    $sql = mysqli_query($conn, $query) or die("Could Not Perform the Query");
    header("Location: admin.php?status=success");
}
