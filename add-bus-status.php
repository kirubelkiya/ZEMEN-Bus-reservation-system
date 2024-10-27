<?php
session_start();
require 'dbcon.php';

// Check if form is submitted for adding bus status
if(isset($_POST['add_bus_status'])) {
    // Retrieve form data
    $bus_number = $_POST['bus_number'];
    $bus_stations = $_POST['bus_stations'];
    $status = $_POST['status'];

    // Insert new bus status record into the database
    $insert_query = "INSERT INTO bus_status (Bus_Number, Bus_Stations, Status) VALUES ('$bus_number', '$bus_stations', '$status')";
    
    if(mysqli_query($con, $insert_query)) {
        $_SESSION['success'] = "Bus status added successfully";
        // Redirect to bus status list page after successful addition
        header("Location: bus-status.php");
        exit();
    } else {
        $_SESSION['error'] = "Error occurred while adding bus status: " . mysqli_error($con);
    }
}

// Close database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bus Status</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Add Bus Status</h2>
        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error']; ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <!-- Add Bus Status Form -->
        <form action="" method="POST">
            <div class="form-group">
                <label for="bus_number">Bus Number:</label>
                <input type="text" class="form-control" id="bus_number" name="bus_number" required>
            </div>
            <div class="form-group">
                <label for="bus_stations">Bus Stations:</label>
                <input type="text" class="form-control" id="bus_stations" name="bus_stations" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>
            <button type="submit" class="btn btn-primary" name="add_bus_status">Add Bus Status</button>
        </form>
    </div>
</body>
</html>
