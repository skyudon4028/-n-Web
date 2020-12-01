<?php
    session_start();
    require_once("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <form action="Sign_up.html" method="POST" class="form" id="form-Login">
            <h1>Sign Up</h1>

            <div class="form-row-parent">
                <div class="form-row">
                    <label for="fullname" class="form-left">Name</label>
                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter Name">
                    <span class="form-message"></span>
                </div>

                <div class="form-row">
                    <label for="username" class="form-left">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
                    <span class="form-message"></span>
                </div>
            </div>

            <div class="form-row-parent">
                <div class="phone_dateofbirth">
                    <div class="form-row">
                        <label for="phone" class="form-left">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
                        <span class="form-message"></span>
                    </div>
                    
                    <div class="form-row">
                        <label for="dateofbirth" class="form-left">Date Of Birth</label>
                        <input type="text" name="dateofbirth" class="form-control" id="dateofbirth" placeholder="Enter Date">
                        <span class="form-message"></span>
                    </div>
                </div>
    

            </div>

            <div class="form-row-parent">
                <div class="form-row">
                    <label for="password" class="form-left">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                    <span class="form-message"></span>
                </div>

                <div class="form-row">
                    <label for="email" class="form-left">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                    <span class="form-message"></span>
                </div>
            </div>

            <button class="form-submit" name = "signup_btn">Sign up</button>
        </form>
    </div>

    <script src="main.js"></script>
</body>
</html>