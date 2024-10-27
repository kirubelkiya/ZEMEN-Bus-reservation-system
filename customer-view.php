<?php
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./customer-view.css">

    <title>customer View</title>
</head>

<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>View Customer Details
                            <a href="index.php" class="btn btn-danger float-end " style="margin-left:280px">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM customer WHERE ID='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $student = mysqli_fetch_array($query_run);
                        ?>
                                <div class="mb-3">
                                    <label>First name</label>
                                    <p class="form-control">
                                        <?= $student['Firstname']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Last name</label>
                                    <p class="form-control">
                                        <?= $student['Lastname']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Sex</label>
                                    <p class="form-control">
                                        <?= $student['Sex']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Customer Email</label>
                                    <p class="form-control">
                                        <?= $student['Email']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Customer Phone number</label>
                                    <p class="form-control">
                                        <?= $student['PhoneNumber']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Customer Password</label>
                                    <p class="form-control">
                                        <?= $student['Password']; ?>
                                    </p>
                                </div>
                        <?php
                            } else {
                                echo "<h4>No Such ID Found</h4>";
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script></script>
</body>

</html>