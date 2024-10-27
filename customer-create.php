<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Create</title>
    <link rel="stylesheet" href="customer-create.css">
</head>

<body>

    <div class="container mt-5">
        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="padding-top:4px; padding: bottom 4px;">
                        <h2 style="padding-left: 15px;">Customer Add</h2>
                        <div><a href="customer-list.php" class="btn btn-danger float-end" id="back-button">BACK</a></div>
                    </div>
                    <div class="card-body">
                        <form action="codee.php" method="POST">

                            <div class="mb-3">
                                <label>First Name</label>
                                <input type="text" name="fname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Sex</label><br>
                                <select name="sex" class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Phone Number</label>
                                <input type="text" name="phoneno" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_customer" class="btn btn-primary">Save Customer</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script></script>
</body>

</html>