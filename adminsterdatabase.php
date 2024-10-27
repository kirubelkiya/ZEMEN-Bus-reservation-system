<?php
    $url='localhost';
    $username='root';
    $password='';
    $conn=mysqli_connect($url,$username,$password,"database2");
    if(!$conn){
    die('Could not connect to MySQL: ' . mysqli_connect_error());
    }
    else
?>