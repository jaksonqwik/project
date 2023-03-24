<?php
session_start();
require_once 'db.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Авторизация</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="form">
        <h1 class="titles">Авторизация</h1>
        <form class="form_log" action="/work_file/log_in.php" method="POST">  
            <input type="email" class="form-input" placeholder="Email" name="email">
            <br>
            <input type="password" class="form-input" placeholder="Password" name="pass">
            <br>
            <input type="submit" value="Войти" name="login" class="sub">
        </form>
        <div class="not_acc">
            Нету аккауна?
            <br>
            <a href="register.php" class="l_register">Регистрация</a>
        </div>
    </div>
</body>
</html>
