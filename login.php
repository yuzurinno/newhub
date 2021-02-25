<?php 
session_start();
include 'includes/connection.php';
if(isset($_POST['signin'])){
    $username = $_POST['username'];
    
    $error = 'Incorect Credentials';
   if(!isset($username, $_POST['password'])) {
	exit('Please fill both the username and password fields!');
   }
    if ($stmt = $conn->prepare('SELECT id, password, username, first_name, last_name, designation FROM users WHERE username=? || email_address=?')) {
        $stmt->bind_param('ss', $username, $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password, $db_username, $db_fname, $db_lname, $db_designation);
            $stmt->fetch();
            
            if (password_verify($_POST['password'], $password)) {
                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION['username'] = $db_username;
                $_SESSION['password'] = $password;
				$_SESSION['first_name'] = $db_fname;
                $_SESSION['last_name'] = $db_lname;
				$_SESSION['designation'] = $db_designation;
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

<head>
    <title>Login | Dashboard</title>
    <?php include 'includes/head.php'; ?>
</head>

<body class="pace-top">
    <div id="page-loader" class="fade show">
        <span class="spinner"></span>
    </div>
    <div id="page-container" class="fade">
       
        <div class="login login-with-news-feed">
            <div class="news-feed">
                <div class="news-image" style="background-image: url(assets/img/login-bg/login-bg-11.jpg)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>Talavera's</b> HOPE</h4>
                    <p>
                        Providing Free and Confidential HIV/STI Testing, Counseling, Support, Outreach and Referral Services.
                    </p>
                </div>
            </div>
            <div class="right-content">
                <div class="login-header">
                    <div class="brand">
                        <span class="logo"></span> <b>TGH</b> HACT 
                        <small>Hub Offering PLHIVs Empowerment</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in-alt"></i>
                    </div>
                </div>
                <div class="login-content">
                     <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="margin-bottom-0">
                        <div class="form-group m-b-15">
                            <input type="text" class="form-control form-control-lg" name="username" id="username"  autocomplete="off" placeholder="Username/Email Address" required />
                        </div>
                        <div class="form-group m-b-15">
                            <input type="password" class="form-control form-control-lg" name="password" id="password" autocomplete="off" required placeholder="Password" required />
                        </div>
                        <div class="checkbox checkbox-css m-b-30">
                            <input type="checkbox" id="remember_me_checkbox" value="" />
                            <label for="remember_me_checkbox">
                                Remember Me
                            </label>
                        </div>
                        <div class="login-buttons">
                            <button type="submit" name="signin" id="signin" value="Log in"class="btn btn-success btn-block btn-lg">Sign me in</button>
                        </div>

                        <hr />
                        <p class="text-center text-grey-darker mb-0">
                            &copy; TGH All Right Reserved <?php echo date('Y'); ?>
                        </p>
                         
                    </form>
                </div>
                <?php if(isset($_POST['signin'])){ echo $alert; } ?>
            </div>

        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>
