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
    <title>Задания</title>
</head>
<body>
    <a href="/creat_task.php">Создать проект</a>
    <a href="/index.php">Выход</a>
    <form action="" method="POST">
        <div>
            <?php
                foreach ($user as $row) {
                    if (!isset($_POST['button']) && !isset($_POST['succesfull'])) {
                        echo "<p name='status'>" . $row['status'] . "</p>";
                    } else {
                        $new_status = $row['status']; 
                        if (isset($_POST['button']) && isset($_POST['task_id']) && $_POST['task_id'] == $row['id']) {
                            $new_status = "В роботе";
                        } elseif (isset($_POST['succesfull']) && isset($_POST['task_id']) && $_POST['task_id'] == $row['id']) {
                            $new_status = "Выполнено";
                        }
                        echo "<p>" . $new_status . "</p>";
                    }
                    echo "<p>" . $row['titel'] . "</p>";
                    echo "<p>" . $row['text_task'] . "</p>";
                    if (!empty($row['file'])) {
                        echo '<a href="' . $row['file'] . '">Скачать файл</a>';
                    }
                    echo '<form action="" method="POST">';
                    echo '<input type="hidden" name="task_id" value="' . $row['id'] . '">';
                    echo '<input type="submit" name="button" value="Принять">';
                    echo '<input type="submit" name="succesfull" value="Выполнил">';
                    echo '</form>';
                }
            ?>
        </div>
    </form>
</body>
</html>
