<?php 
    require_once("db.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $email ='';
        $msg = '';

        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $result = reset_password($email);
            
            if($result['code'] == 0){
                $msg = 'you will receive an email to reset password';
            }
            else{
                $msg = $result['error'];
            }
            
        }
     ?>
    <div class="main-forgot">
        <form action="" method="POST" class="form" id="form-3">
            <h3 class="heading">Reset Password</h3>

            <p class="space"></p>

            <div class="form-group">
                <input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
                <span class="form-message"></span>
            </div>

            <p class="form-mess"><?= $msg ?></p>
        
            <p class="space"></p>

            <button class="form-submit">Reset</button>
        </form>
    </div>

    <script src="main.js"></script>
</body>
</html>