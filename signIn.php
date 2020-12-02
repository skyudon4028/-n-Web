	<?php
	   session_start();
	   include("db.php");
	 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <?php
		$error = null;
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$data = login($username, $password);
			if($data === 0 || $data === 1){
				$error = "Sai mat khau/ten dang nhap";
			}
			else{
				$_SESSION['username'] = $username;
				header('Location: listclass.php');
				exit();
			}
		}

	?>
    <div class="main">
        <form  method="POST" class="form" id="form-2">
            <h1>Login</h1>

            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                <span class="form-message"></span>
            </div>
            
            <a href="forgotPass.php" class="form-group-forgot">Forgot Password?</a>

            <button class="form-submit">Sign in</button>

            <p>Don't have account?<a href="signUp.php" class="form-link">Sign up here</a></p>
			<p name = "errorLogin"><?="".$error?></p>

        </form>

    </div>
    <script src="main.js"></script>
</body>
</html>