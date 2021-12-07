<?php
//db-connect.php

$dsn = "mysql:host=localhost;dbname=wisp-app;charset=utf8mb4";

$dbusername = "xuanx_imm2022user"; //this may not be the right credentials
$dbpassword = "password";

$pdo = new PDO($dsn, $dbusername, $dbpassword);
?>