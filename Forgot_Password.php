<?php
    require_once("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="main-forgot">
        <form action="" method="POST" class="form" id="form-3">
            <h3 class="heading">RESET PASSWORD</h3>

            <p class="space"></p>

            <div class="form-group">
                <label for="email" class="form-left">Email</label>
                
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control" id="email" placeholder="Email address">
                <span class="form-message"></span>
            </div>

            <button class="form-submit">Reset password</button>
        </form>
    </div>

    <script src="main.js"></script>
</body>
</html>