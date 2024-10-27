<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Message</title>
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
            /* Text color for h3 */
        }

        p {
            margin: 10px 0;
            color: #555;
            /* Text color for paragraphs */
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Delete Message</h3>
        <?php
        include 'database.php';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "DELETE FROM feedbackmessage WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<p>Message deleted successfully.</p>";
            } else {
                echo "<p>Error deleting message: " . mysqli_error($conn) . "</p>";
            }
        } else {
            echo "<p>ID parameter is missing.</p>";
        }
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>