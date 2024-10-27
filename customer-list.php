<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="./index.css" rel="stylesheet">

    <title>CUSTOMER CRUD</title>
</head>

<body>

    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 style="text-align: center; font-family:Arial, Helvetica, sans-serif"> Customer Details </h1>
                    </div>
                    <div style="margin-left:0 px"> <a href=" customer-create.php" class="btn btn-primary float-end">Add Customer</a></div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Sex</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM customer";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    while ($student = mysqli_fetch_assoc($query_run)) {
                                ?>
                                        <tr>
                                            <td><?= $student['ID']; ?></td>
                                            <td><?= $student['Firstname']; ?></td>
                                            <td><?= $student['Lastname']; ?></td>
                                            <td><?= $student['Sex']; ?></td>
                                            <td><?= $student['Email']; ?></td>
                                            <td><?= $student['PhoneNumber']; ?></td>
                                            <td><?= $student['Password']; ?></td>
                                            <td>
                                                <form action="customer-view.php" method="GET" style="display: inline;">
                                                    <input type="hidden" name="id" value="<?= $student['ID']; ?>">
                                                    <button type="submit" class="btn btn-info btn-sm" style="margin-right: 5px; background-color: #17a2b8; border-color: #17a2b8;">View</button>
                                                </form>
                                                <form action="customer_edit.php" method="GET" style="display: inline;">
                                                    <input type="hidden" name="id" value="<?= $student['ID']; ?>">
                                                    <button type="submit" class="btn btn-success btn-sm" style="margin-right: 5px; background-color: #28a745; border-color: #28a745;">Edit</button>
                                                </form>
                                                <form action="codee.php" method="POST" style="display: inline;">
                                                    <input type="hidden" name="delete_customer" value="<?= $student['ID']; ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm" style="background-color: #dc3545; border-color: #dc3545;">Delete</button>
                                                </form>
                                            </td>


                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='8'>No Record Found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('addCustomerStatus').addEventListener('click', function() {

        });
    </script>

</body>

</html>