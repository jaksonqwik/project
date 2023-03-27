<?php
$host = 'localhost'; 
$dbname = 'user'; 
$user = 'root'; 
$password = '';

$connect = new mysqli($host, $user, $password, $dbname);
$sql = "SELECT * FROM `task`";
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
    <link rel="stylesheet" href="/style/title.css">
    <title>Title</title>
</head>
<body>
    <div class="title">
        <h1>Welcome</h1>
        <a href="/creat_task.php">Creat project</a>
        <a href="/task.php">Task</a>
        <a href="/index.php">Exit</a>
    </div>
</body>
</html>
