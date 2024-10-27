<?php
session_start();
require 'dbcon.php';

// Check if form is submitted for adding bus status
if(isset($_POST['add_bus_status'])) {
    // Retrieve form data
    $bus_number = $_POST['bus_number'];

    // Insert new bus status record into the database
    $insert_query = "INSERT INTO bus_status (bus_number) VALUES ('$bus_number')";
    
    if(mysqli_query($con, $insert_query)) {
        $_SESSION['success'] = "Bus status added successfully";
        // Redirect to bus status list page after successful addition
        header("Location: bus-status.php");
        exit();
    } else {
        $_SESSION['error'] = "Error occurred while adding bus status: " . mysqli_error($con);
    }
}

// Check if bus status ID is set for editing
if(isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    // Fetch bus status details from the database
    $select_query = "SELECT * FROM bus_status WHERE id = $edit_id";
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
    $edit_id = $_POST['edit_id'];

    // Update bus status record in the database
    $update_query = "UPDATE bus_status SET bus_number = '$bus_number' WHERE id = $edit_id";
    if(mysqli_query($con, $update_query)) {
        $_SESSION['success'] = "Bus status updated successfully";
        // Redirect to bus status list page after successful update
        header("Location: bus-status.php");
        exit();
    } else {
        $_SESSION['error'] = "Error occurred while updating bus status: " . mysqli_error($con);
    }
}

$select_all_query = "SELECT * FROM bus_status";
$result = mysqli_query($con, $select_all_query);

// Check if there are bus statuses
if(mysqli_num_rows($result) > 0) {
    $bus_statuses = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $bus_statuses = array(); // Empty array if no bus statuses found
}

// Close database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Status</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Bus Status</h2>
        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error']; ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success']; ?>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        <!-- Bus Status Form -->
        <form action="" method="POST" class="mb-4">
            <div class="form-group">
                <label for="bus_number">Bus Number</label>
                <input type="text" class="form-control" id="bus_number" name="bus_number" <?php if(isset($bus_status)) echo "value='" . $bus_status['bus_number'] . "'" ?> required>
            </div>
            <?php if(isset($bus_status)): ?>
                <input type="hidden" name="edit_id" value="<?php echo $bus_status['id']; ?>">
                <button type="submit" class="btn btn-primary" name="update_bus_status">Update Bus Status</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary" name="add_bus_status">Add Bus Status</button>
            <?php endif; ?>
        </form>
        <!-- Bus Status Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bus Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($bus_statuses as $bus_status): ?>
                    <tr>
                        <td><?php echo $bus_status['id']; ?></td>
                        <td><?php echo $bus_status['bus_number']; ?></td>
                        <td>
                            <a href="bus-status.php?edit_id=<?php echo $bus_status['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="bus-status.php?delete_id=<?php echo $bus_status['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this bus status?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
