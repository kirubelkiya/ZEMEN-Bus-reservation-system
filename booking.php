<?php
// Include database connection
require 'dbcon.php';

// Fetch routes from the database
$query = "SELECT * FROM routes";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Routes</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>List of Routes</h2>
        <table>
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
           
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['via_cities']}</td>";
                        echo "<td>{$row['bus_departure_date']}</td>";
                        echo "<td>{$row['departure_time']}</td>";
                        echo "<td>{$row['cost']}</td>";
                        echo "<td><a href='indexx.php' class='btn'>Book Now</a></td>";
                        echo "</tr>";
                    }
                    
                } else {
                    echo "<tr><td colspan='6'>No routes available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function showNotification(message) {
            // Create a notification element
            var notification = document.createElement("div");
            notification.className = "notification";
            notification.textContent = message;

            // Append notification to the body
            document.body.appendChild(notification);

            // Automatically hide after 3 seconds
            setTimeout(function() {
                notification.style.display = "none";
            }, 3000);
        }
    </script>
</body>
</html>
