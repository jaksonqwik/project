<?php
$host = 'localhost'; // adress server DB
$dbname = 'user'; // name DB
$user = 'root'; // user name
$password = ''; // pass

$connect = new mysqli($host, $user, $password, $dbname);
$sql = "SELECT * FROM `users`";
$res = $connect->query($sql);
$user = array();
while ($row = $res->fetch_assoc()) {
    $user[] = $row;
}
$connect->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Главная</title>
</head>
<body>
    <a href="/creat_task.php">Создать проект</a>
</body>
</html>