<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>admin registration page</title>
 <link rel="stylesheet" href="./adminadd.css">
</head>

<body>
    <div class="signup-form">
        <form action="adminregister_a.php" method="post" enctype="multipart/form-data">
            <h2>Admin Registration</h2>
            <p class="hint-text">Create new admin account</p>
            <a href="admin.php" class="btn btn-danger float-end " style="margin-left:280px">BACK</a>
            <div class="form-group">
                <div class="row">
                    <div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
                    <div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="cpass" placeholder="Confirm Password" required="required">
            </div>

            <div class="form-group">
                <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> & <a href="#">Privacy Policy</a></label>
            </div>
            <div class="form-group">
                <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Register Now</button>
            </div>

        </form>

    </div>
</body>

</html>