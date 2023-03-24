<?php
session_start();
$host = 'localhost'; 
$dbname = 'user'; 
$user = 'root'; 
$password = ''; 

$connect = new mysqli($host, $user, $password, $dbname);
$sql = "SELECT * FROM `users`";
$res = $connect -> query($sql);
for($user = array(); $row = $res -> fetch_assoc(); $user[]=$row);

$email = $_POST['reg_email'];
$pass = $_POST['reg_pass'];
$pass = md5($pass);

$res = mysqli_query($connect, "INSERT INTO `users`(`id`, `email`, `pass`) VALUES (NULL,'$email','$pass')");
header("Location: ../index.php");

$connect -> close();

?>