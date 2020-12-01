<?php
    session_start();
    require_once("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">  
</head>
<body>
    <?php
        $error = '';
        if(isset($_POST['Username']) && isset($_POST['Password'])){
            $user_name = $_POST['Username'];
            $pass_word = $_POST['Password'];

            $data = login($user_name, $pass_word);
            if($data){
                $_SESSION['Username'] = $user_name;
                header('Location: classView.php');
                exit();
            }
            else{
                $error = 'something Wrong!';
            }
        }
    ?>
    <div class="main">
        <form action="" method="POST" class="form" id="form-Login">
            <h1>Sign In</h1>


            <div class="form-row">
                <label for="username" class="form-left">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
            </div>
            <span class="form-message"></span>


            <div class="form-row">
                <label for="password" class="form-left">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
            </div>
            <span class="form-message"></span>


            <div class="form-row-remember">
                <div class="form-row-remember-left">
                    <input type="checkbox" name="remember" class="form-control" id="remember">
                    <label for="remember" class="form-left">Remember me</label>
                </div>
                <div class="form-row-remember-right">
                    <a href="forgotPass.php" class="forgot-password">Forgot Password?</a>
                </div>
            </div>

            <button class="form-submit">Sign in</button>

            <div class="form-nav-login">Don't have account?
                <a href="Sign_up.html" class="form-nav-login-link">Sign up here</a>
            </div>
        </form>
    </div>

</body>
</html>