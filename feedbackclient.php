<?php
$url = 'localhost';
$username = 'root';
$password = '';
$conn = mysqli_connect($url, $username, $password, "database2");
if (!$conn) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
} else {
}
?>
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
<html>

<head>
    <title>Contact us form using php mysql</title>
    <link rel="stylesheet" href="./feedback.css">
</head>

<body>
    <div class="container">
        <h3>FEEDBACK SECTION</h3>
        <form action="form-process.php" method="POST">
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" id="firstname" class="form-control" required value="<?php echo isset($row['First_Name']) ? htmlspecialchars($row['First_Name']) : ''; ?>">


            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" id="lastname" class="form-control" required value="<?php echo isset($row['Last_Name']) ? htmlspecialchars($row['Last_Name']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required value="<?php echo isset($row['Email']) ? htmlspecialchars($row['Email']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <input type="text" name="message" id="message" class="form-control" required>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Submit</button>
                <button class="btn btn-danger" type="reset"> <a href="./passdash.php" style="text-decoration: none; color:white;">back</a></button>
            </div>
        </form>
    </div>
</body>

</html>