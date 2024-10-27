<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            margin-top: 0;
            color: #333;
            font-size: 24px;
            text-align: center;
        }

        p {
            margin: 10px 0;
            color: #666;
            font-size: 16px;
        }

        strong {
            font-weight: bold;
            color: #000;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>View Message</h3>
        <?php
        include 'database.php';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM feedbackmessage WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                echo "<p><strong>First Name:</strong> " . $row['firstname'] . "</p>";
                echo "<p><strong>Last Name:</strong> " . $row['lastname'] . "</p>";
                echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
                echo "<p><strong>Message:</strong> " . $row['message'] . "</p>";
            } else {
                echo "<p>Message not found.</p>";
            }
        } else {
            echo "<p>ID parameter is missing.</p>";
        }
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>