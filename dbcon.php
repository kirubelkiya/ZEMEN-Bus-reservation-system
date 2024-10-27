<?php
// Database connection
$hostname = "localhost";
$username = "root";
$password = "";
$database = "database2";

$con = mysqli_connect($hostname, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
