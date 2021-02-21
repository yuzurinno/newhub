<?php 
session_start();
include 'includes/connection.php';
if(isset($_POST['signin'])){
    $username = $_POST['username'];
    
   if(!isset($username, $_POST['password'])) {
	exit('Please fill both the username and password fields!');
   }
    if ($stmt = $conn->prepare('SELECT id, password, username FROM users WHERE username=? || email_address=?')) {
        $stmt->bind_param('ss', $username, $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password, $db_username);
            $stmt->fetch();
            
            if (password_verify($_POST['password'], $password)) {
                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION['username'] = $db_username;
                $_SESSION['password'] = $password;
                $error = $_SESSION['username'];
                $error = $_SESSION['password'];
                header('location: index.php');
           
              
            } else {
                $error = 'Incorrect password!';
            }
        } else {
            $error =  'Incorrect username!';
        }
        
        $stmt->close();
        
    } 
    $alert = "<div class='alert alert-danger' role='alert'>$error</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
    .main {
        background: #f8f8f8;
        padding: 5% 0 !important;
    }
    .form-title {
        color: #50aaa2;
        text-align: center;
        padding-top: 38px;

    }
    .social-label {
        text-align: center !important;
    }
</style>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="signin-form">
                        <h2 class="form-title">Log In</h2>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" required autocomplete="off" placeholder="Username/Email Address" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" autocomplete="off" required placeholder="Password" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" style="width: 100%; background-color: #50aaa2 !important;" class="form-submit" value="Log in" />
                            </div>
                            <?php if(isset($_POST['signin'])){ echo $alert; } ?>
                        </form>
                        
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

