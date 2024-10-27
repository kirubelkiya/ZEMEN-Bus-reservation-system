<?php
//session_start();
require 'dbcon.php';

// Check if form is submitted
if (isset($_POST['add_route'])) {
    // Retrieve form data
    $via_cities = $_POST['via_cities'];
    $bus_departure_date = $_POST['bus_departure_date'];
    $departure_time = $_POST['departure_time'];
    $cost = $_POST['cost'];

    // Insert new route record into the database
    $insert_query = "INSERT INTO routes (via_cities, bus_departure_date, departure_time, cost) VALUES ('$via_cities', '$bus_departure_date', '$departure_time', '$cost')";
    if (mysqli_query($con, $insert_query)) {
        $_SESSION['success'] = "Route added successfully";
        // Redirect to route list page after successful addition
        header("Location: route-list.php");
        exit();
    } else {
        $_SESSION['error'] = "Error occurred while adding route: " . mysqli_error($con);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Route</title>
    <link rel="stylesheet" href="route-add.css">
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Route</h4>
                        <div><a href="route-list.php" class="paymentback" id="back-button">BACK</a></div>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="via_cities" class="form-label">Via Cities</label>
                                <input type="text" class="form-control" id="via_cities" name="via_cities" required>
                            </div>
                            <div class="mb-3">
                                <label for="bus_departure_date" class="form-label">Bus Departure Date</label>
                                <input type="date" class="form-control" id="bus_departure_date" name="bus_departure_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="departure_time" class="form-label">Departure Time</label>
                                <input type="time" class="form-control" id="departure_time" name="departure_time" required>
                            </div>
                            <div class="mb-3">
                                <label for="cost" class="form-label">Cost</label>
                                <input type="number" class="form-control" id="cost" name="cost" required>
                            </div>
                            <button type="submit" name="add_route" class="btn btn-primary">Add Route</button>
                            <a href="route-list.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>