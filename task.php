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

if (isset($_POST['adopt']) || isset($_POST['succesfull'])) {
    $task_id = $_POST['task_id'];
    $new_status = "";
    if (isset($_POST['adopt'])) {
        $new_status = "At work";
    } elseif (isset($_POST['succesfull'])) {
        $new_status = "Completed";
    }
    $update_sql = "UPDATE `task` SET `status`='$new_status' WHERE `id`='$task_id'";
    if ($connect->query($update_sql) === TRUE) {
        $user = array();
        $res = $connect->query($sql);
        while ($row = $res->fetch_assoc()) {
            $user[] = $row;
        }
    } else {
        echo "Error updating record: " . $connect->error;
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/style/task.css">
    <title>Task</title>
</head>
<body>
    <div class="header__content">
        <h1>Task</h1>
        <ul class="header__lists">
            <li>
                <a href="/creat_task.php">Creating a task</a>
            </li>
            <li>
                <a href="/index.php">Exit</a>
            </li>
        </ul>
    </div>
    <form action="" method="POST">
        <div class="task">
            <?php
                foreach ($user as $row) {
                    if (!isset($_POST['adopt']) && !isset($_POST['succesfull'])) {
                        echo "<p name='status' class='status'>" . $row['status'] . "</p>";
                    } else {
                        $new_status = $row['status']; 
                        if (isset($_POST['adopt']) && isset($_POST['task_id']) && $_POST['task_id'] == $row['id']) {
                            $new_status = "At work";
                        } elseif (isset($_POST['succesfull']) && isset($_POST['task_id']) && $_POST['task_id'] == $row['id']) {
                            $new_status = "Completed";
                        }
                        echo "<p class='status'>" . $new_status . "</p>";
                    }
                    echo "<p>" . $row['titel'] . "</p>";
                    echo "<p>" . $row['text_task'] . "</p>";
                    if (!empty($row['file'])) {
                        echo '<a href="' . $row['file'] . '">Download file</a>';
                    }
                    echo '<form action="" method="POST">';
                    echo '<input type="hidden" name="task_id" value="' . $row['id'] . '">';
                    echo '<input type="submit" name="adopt" value="Adopt">';
                    echo '<input type="submit" name="succesfull" value="Completed">';
                    echo '</form>';
                }
            ?>
        </div>
    </form>
</body>
</html>