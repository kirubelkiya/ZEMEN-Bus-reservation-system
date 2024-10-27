<?php
require 'dbcon.php';


if (isset($_GET['id'])) {
    $student_id = $_GET['id'];
    $query = "SELECT * FROM customer WHERE ID = $student_id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $student = mysqli_fetch_assoc($result);
    } else {

        header('Location: index.php');
        exit();
    }
} else {

    header('Location: index.php');
    exit();
}


if (isset($_POST['update_customer'])) {

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $password = $_POST['password'];

    // Update student record in the database
    $update_query = "UPDATE customer SET Firstname = '$firstname', Lastname = '$lastname', Sex = '$sex', Email = '$email', PhoneNumber = '$phoneno', Password = '$password' WHERE ID = $student_id";
    if (mysqli_query($con, $update_query)) {
        $_SESSION['success'] = "Customer information updated successfully";
        header("Location: customer-view.php?id=$student_id");
        exit();
    } else {
        $_SESSION['error'] = "Error occurred while updatingCustomer information " . mysqli_error($con);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./customer_edit.css">

    <title>EDIT CUSTOMER INFORMATION</title>
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">EDIT CUSTOMER INFORMATION</h3>
                        <a href="customer-list.php" class="btn btn-danger float-end " style="margin-left:280px">BACK</a>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" value="<?= $student['Firstname']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" value="<?= $student['Lastname']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="sex" class="form-label">Sex</label><br>
                                <select name="sex" class="form-control" id="sex">
                                    <option <?php if ($student['Sex'] == 'Male') echo 'selected'; ?>>Male</option>
                                    <option <?php if ($student['Sex'] == 'Female') echo 'selected'; ?>>Female</option>
                                    <option <?php if ($student['Sex'] == 'Other') echo 'selected'; ?>>Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $student['Email']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="phoneno" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phoneno" name="phoneno" value="<?= $student['PhoneNumber']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?= $student['Password']; ?>">
                            </div>
                            <button type="submit" name="update_customer" class="btn btn-primary">Update Customer</button>
                            <a href="customer-view.php?id=<?= $student_id; ?>" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>