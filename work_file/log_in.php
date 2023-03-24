<?php
session_start();

$host = 'localhost'; 
$dbname = 'user'; 
$user = 'root'; 
$password = ''; 

$connect = new mysqli($host, $user, $password, $dbname);
$sql = "SELECT * FROM `users`";
$res = $connect->query($sql);
$user = array();
while ($row = $res->fetch_assoc()) {
    $user[] = $row;
}

$email = $_POST['email'];
$pass = $_POST['pass'];
$pass = md5($_POST['pass']);

$check = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `pass` = '$pass'");
if(mysqli_num_rows($check) > 0){
    $user = mysqli_fetch_assoc($check);

    $_SESSION['user'] = [
        "id" => $user['id'],
        "email" => $user['email'],
    ];
    header("Location: ../title.php");
}
else{
    $_SESSION['message'] = "Неверный пороль или логин";
    header("Location: ../index.php");
}
$connect->close();

?>