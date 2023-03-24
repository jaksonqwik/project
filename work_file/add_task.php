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

$path = 'file/' . time() . $_FILES['add_file']['name'];
move_uploaded_file($_FILES['add_file']['tmp_name'], '../' . $path);

$title = $_POST['add_title'];
$text_task = $_POST['add_task'];

$res = mysqli_query($connect, "INSERT INTO `task` (`titel`, `text_task`, `file`) VALUES ('$title', '$text_task', '$path')");
header("Location: ../title.php");

$connect -> close();

?>