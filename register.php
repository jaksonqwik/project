<?php
session_start();
require_once "db.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/style/style.css">
    <title>Register</title>
</head>
<body>
    <div class="form">
        <h1>Register</h1>
        <form action="work_file/add_reg.php" method="POST">
            <div class="top">
                <input type="email" placeholder="Email" name="reg_email" class="form-input">
                <br>
                <input type="password" placeholder="Password" name="reg_pass" class="form-input">
            </div>
            <br>
            <input type="submit" value="Send" class="register" name="reg_submit">
            <div class="acc">
                Got an account?
                <br>
                <a href="index.php">Log in</a>
            </div>
        </form>
    </div>
</body>
</html>