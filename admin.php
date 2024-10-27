<?php
include 'database.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="grid-container">

        <!-- Header -->
        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icons-outlined">menu</span>
            </div>
            <div class="header-left">
                <div>Zemen Online Ticket Reservation System</div>
            </div>
            <div class="header-right">
                <span class="material-icons-outlined">notifications</span>
                <span class="material-icons-outlined">email</span>
                <span class="material-icons-outlined">account_circle</span>
            </div>
        </header>
        <!-- End Header -->

        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <div class="material-icons-outlined"></div> ZEMEN BUS
                    <hr>
                </div>
                <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
            </div>

            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="./admin.php" target="_blank">
                        <span class="material-icons-outlined"></span> HOME
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="./customer-list.php" target="_blank">
                        <span class="material-icons-outlined"></span> USERS
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="./payment-list.php" target="_blank">
                        <span class="material-icons-outlined"></span> PAYMENTS
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="./route-list.php" target="_blank">
                        <span class="material-icons-outlined"></span> SCHEDULES
                    </a>
                </li>

                <li class="sidebar-list-item">
                    <a href="./bus-status.php" target="_blank">
                        <span class="material-icons-outlined"></span> BUSES
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="./adminadd.php" target="_blank">
                        <span class="material-icons-outlined"></span> ADMIN ADD
                    </a>
                </li>

                <li class="sidebar-list-item">
                    <a href="./feedbacklist.php" target="_blank">
                        <span class="material-icons-outlined"></span> FEEDBACK RECEIVED
                    </a>
                </li>
            </ul>
        </aside>
        <!-- End Sidebar -->

        <!-- Main -->
        <main class="main-container">
            <div class="main-title">
                <p class="font-weight-bold">ADMIN DASHBOARD</p>
            </div>

            <div class="main-cards">

                <a style="text-decoration: none;" href="./customer-list.php">
                    <div class="card">

                        <div class="card-inner">
                            <p class="text-primary">Customer information </p>
                            <span class="material-icons-outlined text-blue"></span>
                            <?php
                            $select_listings = $conn->prepare("SELECT * FROM customer");
                            $select_listings->execute();
                            $select_listings->store_result();
                            $count_listings = $select_listings->num_rows;
                            ?>
                            <br>
                            <h3 style="font-size:30px;padding-left:15px;"><?= $count_listings; ?></h3>

                        </div>
                    </div>
                </a>

                <a style="text-decoration: none;" href="./payment-list.php">
                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">Payments</p>
                            <?php
                            $select_listings = $conn->prepare("SELECT * FROM payment");
                            $select_listings->execute();
                            $select_listings->store_result();
                            $count_listings = $select_listings->num_rows;
                            ?>
                            <br>
                            <h3 style="font-size:30px;padding-left:15px;"><?= $count_listings; ?></h3>
                        </div>
                    </div>
                </a>

                <a style="text-decoration: none;" href="./route-list.php">
                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">SCHEDULES</p>
                            <span class="material-icons-outlined text-red"></span>
                            <?php
                            $select_listings = $conn->prepare("SELECT * FROM routes");
                            $select_listings->execute();
                            $select_listings->store_result();
                            $count_listings = $select_listings->num_rows;
                            ?>
                            <br>
                            <h3 style="font-size:30px;padding-left:15px;"><?= $count_listings; ?></h3>
                        </div>

                    </div>
                </a>



                <a style="text-decoration: none;" href="./bus-status.php">
                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">Buses</p>
                            <span class="material-icons-outlined text-red"></span>
                            <?php
                            $select_listings = $conn->prepare("SELECT * FROM bus_status");
                            $select_listings->execute();
                            $select_listings->store_result();
                            $count_listings = $select_listings->num_rows;
                            ?>
                            <br>
                            <h3 style="font-size:30px;padding-left:15px;"><?= $count_listings; ?></h3>
                        </div>

                    </div>
                </a>
                <a style="text-decoration: none;" href="./adminadd.php">
                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">Admin add</p>
                            <?php
                            $select_listings = $conn->prepare("SELECT * FROM admin_register");
                            $select_listings->execute();
                            $select_listings->store_result();
                            $count_listings = $select_listings->num_rows;
                            ?>
                            <br>
                            <h3 style="font-size:30px;padding-left:15px;">+</h3>
                        </div>
                    </div>
                </a>
                <a style="text-decoration: none;" href="./feedbacklist.php">
                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">Feedbacks Received</p>
                            <span class="material-icons-outlined text-red"></span>
                            <?php
                            $select_listings = $conn->prepare("SELECT * FROM feedbackmessage");
                            $select_listings->execute();
                            $select_listings->store_result();
                            $count_listings = $select_listings->num_rows;
                            ?>
                            <br>
                            <h3 style="font-size:30px;padding-left:15px;"><?= $count_listings; ?></h3>
                        </div>
                    </div>

                </a>
            </div>

    </div>

    </main>
    </div>

</body>

</html>