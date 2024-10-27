<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $conn = mysqli_connect("localhost", "root", "", "database2");

   
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

   
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $selected_seats = $_POST['selected_seats'];

    $selected_seats_array = explode(',', $selected_seats);

 
    $reserved_seat_count = 0;


    foreach ($selected_seats_array as $seat_id) {
        
        $sql = "UPDATE seat_reservations SET status = 'pending', customer_name = '$customer_name', customer_email = '$customer_email' WHERE id = '$seat_id'";

        if (mysqli_query($conn, $sql)) {
            // Increment the counter for each successful reservation
            $reserved_seat_count++;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);

    // Display a single message based on the number of reservations made using JavaScript
    echo "<script>
            var reservedSeatCount = $reserved_seat_count;
            var successMessage;
            if (reservedSeatCount === 0) {
                successMessage = 'No seats are available.';
            } else if (reservedSeatCount === 1) {
                successMessage = 'make your payment and the managers confirm your reservation soon!';
            } else {
                successMessage = reservedSeatCount + 'make your payment and the managers confirm your reservation soon!';
            }
            alert(successMessage);
            window.location.href = 'index.php'; // Redirect to the homepage after displaying the message
        </script>";
}
?>
