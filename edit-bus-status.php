<?php
session_start();
require 'dbcon.php';

if(isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    // Fetch bus status details from the database
    $select_query = "SELECT * FROM bus_status WHERE ID = $edit_id";
    $result = mysqli_query($con, $select_query);

    if(mysqli_num_rows($result) == 1) {
        $bus_status = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['error'] = "Bus status not found";
        header("Location: bus-status.php");
        exit();
    }
}

// Check if form is submitted for updating bus status
if(isset($_POST['update_bus_status'])) {
    // Retrieve form data
    $bus_number = $_POST['bus_number'];
    $bus_stations = $_POST['bus_stations'];
    $status = $_POST['status'];
    $edit_id = $_POST['edit_id'];

    // Update bus status record in the database
    $update_query = "UPDATE bus_status SET Bus_Number = '$bus_number', Bus_Stations = '$bus_stations', Status = '$status' WHERE ID = $edit_id";
    if(mysqli_query($con, $update_query)) {
        $_SESSION['success'] = "Bus status updated successfully";
        // Redirect to bus status list page after successful update
        header("Location: bus-status.php");
        exit();
    } else {
        $_SESSION['error'] = "Error occurred while updating bus status: " . mysqli_error($con);
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
    <title>Edit Bus Status</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Bus Status</h2>
        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error']; ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <!-- Edit Bus Status Form -->
        <form action="" method="POST">
            <div class="form-group">
                <label for="bus_number">Bus Number:</label>
                <input type="text" class="form-control" id="bus_number" name="bus_number" value="<?php echo $bus_status['Bus_Number']; ?>" required>
            </div>
            <div class="form-group">
                <label for="bus_stations">Bus Stations:</label>
                <input type="text" class="form-control" id="bus_stations" name="bus_stations" value="<?php echo $bus_status['Bus_Stations']; ?>" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status" value="<?php echo $bus_status['Status']; ?>" required>
            </div>
            <input type="hidden" name="edit_id" value="<?php echo $bus_status['ID']; ?>">
            <button type="submit" class="btn btn-primary" name="update_bus_status">Update Bus Status</button>
        </form>
    </div>
</body>
</html>
