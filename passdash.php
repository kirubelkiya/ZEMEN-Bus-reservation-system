<?php
include 'database.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>


    <link rel="stylesheet" href="passdash.css">
</head>

<body>
    <div class="grid-container">

        <!-- Header -->
        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icons-outlined">menu</span>
            </div>
            <div class="header-left">
                <span style="display: inline-block; margin-right: 300px;">Zemen Online Ticket Reservation System</span>
                <span style="display: inline-block;">
                    <?php
                    session_start();
                    include 'database.php';
                    if (isset($_SESSION["ID"])) {
                        $ID = $_SESSION["ID"];
                        $sql = mysqli_query($conn, "SELECT * FROM register WHERE ID='$ID'");
                        if (mysqli_num_rows($sql) > 0) {
                            $row = mysqli_fetch_array($sql);
                            echo "<p class='hint-text'><br><b>Welcome: {$row['First_Name']}</b></p>";
                        } else {
                            echo "No user found with ID: $ID";
                        }
                    } else {

                        echo "Session variable 'ID' not set";
                    }
                    ?>
                </span>
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
                    <a href="#" target="_blank">
                        <span class="material-icons-outlined"></span> HOME
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="./booking.php" target="_blank">
                        <span class="material-icons-outlined"></span> NEW BOOKING

                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#" target="_blank">
                        <span class="material-icons-outlined"></span>VIEW BOOKINGS
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="./feedbackclient.php" target="_blank">
                        <span class="material-icons-outlined"></span> FEEDBACK
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#" target="_blank">
                        <span class="material-icons-outlined"></span> SETTINGS
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#" target="_blank">
                        <span class="material-icons-outlined"></span> LOGOUT
                    </a>
                </li>
            </ul>
        </aside>
        
        <main class="main-container">
            <div class="main-title">
                <p class="font-weight-bold">PASSENGER'S DASHBOARD </p>
            </div>
            <div class="main-cards">
                <a style="text-decoration: none;" href="./booking.php">
                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">New Booking</p>
                            <span class="material-icons-outlined text-blue"></span>
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
                <div class="card">
                    <a style="text-decoration: none;" href="#">
                        <div class="card-inner">
                            <p class="text-primary">View Bookings</p>
                            <span class="material-icons-outlined text-orange"></span>
                        </div>
                        <span class="text-primary font-weight-bold">0</span>
                    </a>
                </div>

                <div class="card">
                    <a style="text-decoration: none;" href="./feedbackclient.php">
                        <div class="card-inner">
                            <p class="text-primary">Feedback </p>
                            <span class="material outlined text-green"></span>
                            <h3 style="font-size:30px;padding-left:15px;">+</h3>
                        </div>

                    </a>
                </div>
            </div>
    </div>
    </main>
    </div>

</body>

</html>