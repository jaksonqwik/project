<?php
$host = 'localhost'; // adress server DB
$dbname = 'user'; // name DB
$user = 'root'; // user name
$password = ''; // pass

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
    <title>Task</title>
</head>
<body>
<div class="task">
        <h1>Создание задания</h1>
        <form action="work_file/add_task.php" method="POST" enctype="multipart/form-data">
            <div class="input_task">
                <input type="text" placeholder="Название" name="add_title" class="form-input">
                <br>
                <input type="text" placeholder="Задания" name="add_task" class="form-input">
                <br>
                <input type="file" name="add_file">
            </div>
            <br>
            <input type="submit" vlaue="ОК" class="send_task" name="submit">
        </form>
    </div>
</body>
</html>