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