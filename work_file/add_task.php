<?php
session_start();
$host = 'localhost'; 
$dbname = 'user'; 
$user = 'root'; 
$password = ''; 

$connect = new mysqli($host, $user, $password, $dbname);
$sql = "SELECT * FROM `task`";
$res = $connect -> query($sql);
for($user = array(); $row = $res -> fetch_assoc(); $user[]=$row);

$title = $_POST['add_title'];
$text_task = $_POST['add_task'];

$res = mysqli_query($connect, "INSERT INTO `task` (`id`, `titel`, `text_task`) VALUES (NULL, '$title', '$text_task')");
header("Location: ../title.php");

$connect -> close();

?>