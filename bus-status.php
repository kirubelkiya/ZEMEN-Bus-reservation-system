<?php
session_start();
require 'dbcon.php';

// Check if delete_id is present in the URL
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete bus status record from the database
    $delete_query = "DELETE FROM bus_status WHERE ID = $delete_id";
    if (mysqli_query($con, $delete_query)) {
        $_SESSION['success'] = "Bus status deleted successfully";
    } else {
        $_SESSION['error'] = "Error occurred while deleting bus status: " . mysqli_error($con);
    }

    // Redirect back to bus-status.php after deletion
    header("Location: bus-status.php");
    exit();
}

// Fetch bus statuses from the database
$select_all_query = "SELECT ID, Bus_Number, Bus_Stations, Status FROM bus_status";
$result = mysqli_query($con, $select_all_query);

// Check if there are bus statuses
if (mysqli_num_rows($result) > 0) {
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
    <link rel="stylesheet" href="./bus-status.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Bus Status</h2>
        <a href="add-bus-status.php" class="btn btn-primary mb-3" style="text-decoration: none;">Add Bus Status</a>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error']; ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success']; ?>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bus Number</th>
                    <th>Bus Stations</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bus_statuses as $bus_status) : ?>
                    <tr>
                        <td><?php echo $bus_status['ID']; ?></td>
                        <td><?php echo $bus_status['Bus_Number']; ?></td>
                        <td><?php echo $bus_status['Bus_Stations']; ?></td>
                        <td><?php echo $bus_status['Status']; ?></td>
                        <td>
                            <a href="edit-bus-status.php?edit_id=<?php echo $bus_status['ID']; ?>" class="btn btn-sm btn-primary" style="text-decoration: none;">Edit</a>
                            <a href="bus-status.php?delete_id=<?php echo $bus_status['ID']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this bus status?')" style="text-decoration: none;">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>