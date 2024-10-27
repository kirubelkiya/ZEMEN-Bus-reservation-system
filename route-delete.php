<?php
require 'dbcon.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $route_id = $_GET['id'];

    $delete_query = "DELETE FROM routes WHERE id = $route_id";

    if (mysqli_query($con, $delete_query)) {
        $_SESSION['success'] = "Route deleted successfully";
    } else {
        
        $_SESSION['error'] = "Error occurred while deleting route: " . mysqli_error($con);
    }
} else {

    header("Location: route-list.php");
    exit();
}
header("Location: route-list.php");
exit();
