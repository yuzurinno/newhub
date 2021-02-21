<?php
include 'includes/connection.php';
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
                                <label for="first_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="first_name" id="first_name" required autocomplete="off" placeholder="First Name" />
                            </div>
                            <div class="form-group">
                                <label for="middle_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="middle_name" id="middle_name" autocomplete="off" placeholder="Middle Name" />
                            </div>
                            <div class="form-group">
                                <label for="last_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="last_name" id="last_name" required autocomplete="off" placeholder="last Name" />
                            </div>
                           <div class="form-group">
                                <label for="email_address"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="email" name="email_address" id="email_address" required autocomplete="off" placeholder="Email Address" />
                            </div>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" required autocomplete="off" placeholder="Username" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" autocomplete="off" required placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="confirm_password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="confirm_password" id="confirm_password" autocomplete="off" required placeholder="Confirm Password" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" style="width: 100%; background-color: #50aaa2 !important;" class="form-submit" value="Log in" />
                            </div>
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

<?php
if(isset($_POST['signin'])){
    $username = $_POST['username'];
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    
    if(!isset($username, $password)) {
        // Could not get the data that should have been sent.
        exit('Please fill both the username and password fields!');
    }
    
    if ($stmt = $conn->prepare('SELECT id, username, email_address, password FROM users WHERE username=? || email_address=?')) {
        $stmt->bind_param('ss', $username, $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            echo "Username Or Email Address is already Exist!";
        } else {
            if ($stmt = $conn->prepare('INSERT INTO users (username, password, email_address, first_name, middle_name, last_name) VALUES (?, ?, ?, ?, ?, ?)')) {
                $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $stmt->bind_param('ssssss', $_POST['username'], $hash, $_POST['email_address'], $_POST['first_name'], $_POST['middle_name'], $_POST['last_name']);
                $stmt->execute();
                echo 'You have successfully registered, you can now login!';
            } else {
                echo 'Could not prepare statement!';
            }
        }
    }
}
?>

