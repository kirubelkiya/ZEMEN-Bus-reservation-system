<?php
$url = 'localhost';
$username = 'root';
$password = '';
$database = 'database2';

$conn = mysqli_connect($url, $username, $password, $database);

if (!$conn) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
}

$sql = "SELECT * FROM feedbackmessage";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo 'Error: ' . mysqli_error($conn);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Feedback Messages</title>
    <link rel="stylesheet" href="./feedbacklist.css">
    <style>
        /* Button Styles */
        .btn-view,
        .btn-delete {
            display: inline-block;
            padding: 8px 15px;
            margin-right: 10px;
            font-size: 16px;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-view {
            background-color: #007bff;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-view:hover,
        .btn-delete:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Feedback Messages</h3>
        <div><a href="./admin.php" class="paymentback" id="back-button">BACK</a></div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                        <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['message']); ?></td>
                        <td>
                            <a href="view_message.php?id=<?php echo $row['id']; ?>" class="btn-view" style="text-decoration: none;">View</a>
                            <a href="delete_message.php?id=<?php echo $row['id']; ?>" class="btn-delete" style="text-decoration: none;">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>


<?php
mysqli_close($conn);
?>