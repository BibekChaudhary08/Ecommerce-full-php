<?php
require("includes/config.php");

if(isset($_GET['email']) && isset($_GET['verification_code'])){
    $email = $_GET['email'];
    $verification_code = $_GET['verification_code'];
    
    $query = "SELECT * FROM `users` WHERE `email`='$email' AND `verification_code`='$verification_code'";
    $result = mysqli_query($con, $query);
    
    if($result){
        if(mysqli_num_rows($result) == 1){
            $result_fetch = mysqli_fetch_assoc($result);
            
            if($result_fetch['is_verified'] == 0){
                // Use 'email' instead of 'uemail' in the update statement
                $update = "UPDATE `users` SET `is_verified`='1' WHERE `email`='$email'";
                if(mysqli_query($con, $update)){
                    $msg = "Email verification successful. You can now <a href='login.php'>login</a>.";
                } else {
                    $error = "Error updating user record: " . mysqli_error($con);
                }
            } else {
                $error = "Email is already verified.";
            }
        } else {
            $error = "Invalid email or verification code.";
        }
    } else {
        $error = "Database query failed: " . mysqli_error($con);
    }
} else {
    $error = "Invalid URL parameters.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Meta Tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/favicon.ico">
    
    <!--	Fonts
        ========================================================-->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
    
    <!--	Css Link
        ========================================================-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    
    <!--	Title
        =========================================================-->
    <title>Email Verification - Real Estate PHP</title>
</head>
<body>
    

            
            <div class="page-wrappers login-body full-row bg-gray">
                <div class="login-wrapper">
                    <div class="container">
                        <div class="loginbox">
                            <div class="login-right">
                                <div class="login-right-wrap">
                                    <h1>Email Verification</h1>
                                    <?php
                                    if (!empty($msg)) {
                                        echo "<p class='alert alert-success'>$msg</p>";
                                    } else {
                                        echo "<p class='alert alert-danger'>$error</p>";
                                    }
                                    ?>
                                    <p class="account-subtitle">Return to <a href="login.php">Login</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Wrapper End -->
    
    <!--	Js Link
    ============================================================-->
    <script src="js/jquery.min.js"></script>
    <!--jQuery Layer Slider -->
    <script src="js/greensock.js"></script>
    <script src="js/layerslider.transitions.js"></script>
    <script src="js/layerslider.kreaturamedia.jquery.js"></script>
    <!--jQuery Layer Slider -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/tmpl.js"></script>
    <script src="js/jquery.dependClass-0.1.js"></script>
    <script src="js/draggable-0.1.js"></script>
    <script src="js/jquery.slider.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
