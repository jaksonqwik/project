<?php
session_start();
$dhost = 'localhost'; // adress server DB
$sdbname = 'user'; // name DB
$duser = 'root'; // user name
$dpassword = ''; // pass

$connectt = new mysqli($dhost, $duser, $dpassword, $sdbname);
$sqli = "SELECT * FROM `users`";
$ress = $connectt->query($sqli);
$users = array();
while ($rows = $ress->fetch_assoc()) {
    $users[] = $rows;
}
$connectt->close();

?>