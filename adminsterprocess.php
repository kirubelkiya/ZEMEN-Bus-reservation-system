<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'adminsterdatabase.php';
    $hashed_password = ($pass);
    $stmt = $conn->prepare("SELECT * FROM Admin_register WHERE Email=? AND Password=?");
    $stmt->bind_param("ss", $email, $hashed_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $_SESSION["ID"] = $row['ID'];
        $_SESSION["Email"] = $row['Email'];
        header("Location:admin.php");
        exit();
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>
