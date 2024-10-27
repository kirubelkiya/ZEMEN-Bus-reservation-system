<!-- <?php
    session_start();
?>  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./adminlog.css">
    <title> Login & Registration</title>
</head>
<body>
 <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>Zemen bus</p>
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="./surpass.php" class="link active">Home</a></li>
                <li><a href="./services.php" class="link">Services</a></li>
                <li><a href="./about.php" class="link">About</a></li>
            </ul>
        </div>
       
    </nav>

<!----------------------------- Form box ----------------------------------->    
    <div class="form-box">
        
        <!------------------- login form -------------------------->

        <div class="login-container" id="login">
           
                
             <form action="adminsterprocess.php" method="post" enctype="multipart/form-data">
                    <header>Admin Sign in</header>

                <div class="input-box">
                    
                    <input type="text" class="input-field" name="email" autocomplement="off" placeholder="Username or Email">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" name="pass" autocomplement="off" placeholder="Password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" name="save" class="submit" value="Sign In">
                </div>
                <div class="two-col">
                   
                    <div class="two">
                        <label><a href="#">Forgot password?</a></label>
                    </div>
            </form>
    </div>
        </div>

    </div>
</div>   


<script>
   
   function myMenuFunction() {
    var i = document.getElementById("navMenu");

    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
   }
 
</script>

<script>

    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }

    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
    }

</script>

</body>
</html>