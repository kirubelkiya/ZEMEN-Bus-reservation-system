<html>

<head>
    <title>Contact us form using php mysql</title>
    <link rel="stylesheet" href="./feedback.css">
</head>

<body>
    <div class="container">
        <h3>CONTACT US</h3>
        <form action="form-process.php" method="POST">
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" id="firstname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" id="lastname" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <input type="text" name="message" id="message" class="form-control" required>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Submit</button>
                <button class="btn btn-danger" type="reset"> <a href="./surpass.php" style="text-decoration: none; color:white;">back</a></button>
            </div>
        </form>
    </div>
</body>

</html>