<?php
include("config.php");
extract($_POST);
$sql = "INSERT INTO `feedbackmessage`(`firstname`, `lastname`, `email`, `message`) VALUES ('" . $firstname . "','" . $lastname . "','" . $email . "','" . $message . "')";
$result = $mysqli->query($sql);
if (!$result) {
    die("Couldn't enter data: " . $mysqli->error);
}
echo "Thank You For Contacting Us ";
$mysqli->close();
