<?php
session_start();
include 'database.php';
if (isset($_SESSION["ID"])) {
    $ID = $_SESSION["ID"];
    $sql = mysqli_query($conn, "SELECT * FROM register WHERE ID='$ID'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_array($sql);
    } else {
        echo "No user found with ID: $ID";
    }
} else {

    echo "Session variable 'ID' not set";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Seat Reservation System</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        .seats-container {
            width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }


        .seats {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        .seat {
            width: 50px;
            height: 50px;
            border: 1px solid #ccc;
            margin: 5px;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
        }

        .seat.reserved {
            background-color: #f9a825;
        }
    </style>
</head>

<body>
    <h2>Available Seats</h2>

    <div class="seats-container">
        <div class="seats">
            <?php

            $conn = mysqli_connect("localhost", "root", "", "database2");

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM seat_reservations WHERE status = 'available'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='seat available' data-seat-id='" . $row['id'] . "'>" . $row['seat_number'] . "</div>";
                }
            } else {
                echo "No available seats.";
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>

    <!-- Reservation form -->
    <form action="./f.php" method="post">
        <input type="text" name="customer_name" placeholder="Your Name" required value="<?php echo isset($row['First_Name']) ? htmlspecialchars($row['First_Name']) : ''; ?>">
        <input type="email" name="customer_email" placeholder="Your Email" required value="<?php echo isset($row['Email']) ? htmlspecialchars($row['Email']) : ''; ?>">

        <input type="hidden" name="selected_seats" id="selected_seats" value="">
        <div id="selected_seats_display"></div>
        <div>
            Total Cost: <span id="total_cost">0</span>
        </div>
        <input type="submit" value="Reserve Seats">
    </form>


    <script>
        var selectedSeats = [];
        var seatCost = 10;

        document.querySelectorAll('.seat.available').forEach(seat => {
            seat.addEventListener('click', function() {
                var seatId = this.getAttribute('data-seat-id');
                this.classList.toggle('selected');


                if (selectedSeats.includes(seatId)) {
                    selectedSeats.splice(selectedSeats.indexOf(seatId), 1);
                } else {
                    selectedSeats.push(seatId);
                }


                document.getElementById('selected_seats_display').innerText = "Selected Seats: " + selectedSeats.join(', ');

                document.getElementById('selected_seats').value = selectedSeats.join(',');

                document.getElementById('total_cost').innerText = selectedSeats.length * seatCost;
            });
        });
    </script>
</body>

</html>