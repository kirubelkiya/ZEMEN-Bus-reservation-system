<?php
//session_start();
require 'dbcon.php';

// Fetch all routes from the database
$query = "SELECT * FROM routes";
$result = mysqli_query($con, $query);

// Check if there are any routes
if (mysqli_num_rows($result) > 0) {
    $routes = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $routes = []; // Initialize empty array if no routes found
}
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Route List</title>
    <link rel="stylesheet" href="./route-list.css">
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_SESSION['success']; ?>
                    </div>
                    <?php unset($_SESSION['success']); ?>
                <?php elseif (isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_SESSION['error']; ?>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <h2 style="text-align: center;">SCHEDULES &nbsp; LIST</h2>
                <a href="route-add.php" class="btn btn-primary mb-3" style="text-decoration: none;">Add Route</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Via Cities</th>
                            <th>Bus Departure Date</th>
                            <th>Departure Time</th>
                            <th>Cost</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($routes as $route) : ?>
                            <tr>
                                <td><?= $route['id']; ?></td>
                                <td><?= $route['via_cities']; ?></td>
                                <td><?= $route['bus_departure_date']; ?></td>
                                <td><?= $route['departure_time']; ?></td>
                                <td><?= $route['cost']; ?></td>
                                <td>
                                    <a href="route-view.php?id=<?= $route['id']; ?>" class="btn btn-info" style="text-decoration: none;">View</a>
                                    <a href="route-edit.php?id=<?= $route['id']; ?>" class="btn btn-primary" style="text-decoration: none;">Edit</a>
                                    <a href="route-delete.php?id=<?= $route['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this route?')" style="text-decoration: none;">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

</html>