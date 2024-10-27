<?php
//session_start();
require 'dbcon.php';

// Check if route ID is set in URL
if (isset($_GET['id'])) {
    $route_id = $_GET['id'];

    // Fetch route details from the database
    $query = "SELECT * FROM routes WHERE id = $route_id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $route = mysqli_fetch_assoc($result);
    } else {
        // Redirect back to route list if route ID is invalid
        header('Location: route-list.php');
        exit();
    }
} else {
    // Redirect back to route list if route ID is not provided
    header('Location: route-list.php');
    exit();
}

// Check if form is submitted
if (isset($_POST['update_route'])) {
    // Retrieve form data
    $via_cities = $_POST['via_cities'];
    $bus_departure_date = $_POST['bus_departure_date'];
    $departure_time = $_POST['departure_time'];
    $cost = $_POST['cost'];

    // Update route record in the database
    $update_query = "UPDATE routes SET via_cities = '$via_cities', bus_departure_date = '$bus_departure_date', departure_time = '$departure_time', cost = '$cost' WHERE id = $route_id";
    if (mysqli_query($con, $update_query)) {
        $_SESSION['success'] = "Route updated successfully";
        // Redirect to route view page after successful update
        header("Location: route-view.php?id=$route_id");
        exit();
    } else {
        $_SESSION['error'] = "Error occurred while updating route: " . mysqli_error($con);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Route</title>
<link rel="stylesheet" href="route-edit.css">
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Route</h4>
                        <div><a href="route-list.php" class="paymentback" id="back-button">BACK</a></div>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="via_cities" class="form-label">Via Cities</label>
                                <input type="text" class="form-control" id="via_cities" name="via_cities" value="<?= $route['via_cities']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="bus_departure_date" class="form-label">Bus Departure Date</label>
                                <input type="date" class="form-control" id="bus_departure_date" name="bus_departure_date" value="<?= $route['bus_departure_date']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="departure_time" class="form-label">Departure Time</label>
                                <input type="time" class="form-control" id="departure_time" name="departure_time" value="<?= $route['departure_time']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="cost" class="form-label">Cost</label>
                                <input type="number" class="form-control" id="cost" name="cost" value="<?= $route['cost']; ?>">
                            </div>
                            <button type="submit" name="update_route" class="btn btn-primary">Update Route</button>
                            <a href="route-list.php?id=<?= $route_id; ?>" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>