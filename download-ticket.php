<?php
//session_start();
require 'dbcon.php';

// Check if payment ID is set in URL
if(isset($_GET['id'])) {
    $payment_id = $_GET['id'];

    // Fetch payment details from the database
    $query = "SELECT * FROM Payment WHERE PaymentID = $payment_id";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) == 1) {
        $payment = mysqli_fetch_assoc($result);
    } else {
        // Redirect back to payment list if payment ID is invalid
        header('Location: payment-list.php');
        exit();
    }

    // Generate PDF content (You need to implement the PDF generation logic here)
    $pdf_content = "Payment ID: " . $payment['PaymentID'] . "\n";
    $pdf_content .= "User ID: " . $payment['UserID'] . "\n";
    $pdf_content .= "Payment Date: " . $payment['PaymentDate'] . "\n";
    $pdf_content .= "Amount: " . $payment['Amount'] . "\n";
    $pdf_content .= "Payment Method: " . $payment['PaymentMethod'] . "\n";
    $pdf_content .= "Status: " . $payment['Status'];

    // Set the response headers to force download
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="payment_ticket.pdf"');

    // Output the PDF content
    echo $pdf_content;
} else {
    // Redirect back to payment list if payment ID is not provided
    header('Location: payment-list.php');
    exit();
}
?>
