<?php
extract($_POST);
include("database.php");

$sql = mysqli_query($conn, "SELECT * FROM register where Email='$email'");
if (mysqli_num_rows($sql) > 0) {
    echo "Email Id Already Exists";
    exit;
} else {
    $query = "INSERT INTO register(First_Name, Last_Name,Email, Password) VALUES ('$first_name', '$last_name', '$email', '" . md5($pass) . "')";
    $sql = mysqli_query($conn, $query) or die("Could Not Perform the Query");
    header("Location: index.php?status=success");
}
?>
