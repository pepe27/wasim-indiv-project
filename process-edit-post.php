<?php 
//process-edit-post.php
include("includes/session-check.php");

$id = $_POST["id"];
$title = $_POST["title"];
// $date = $_POST["date"];
$imageUrl = $_POST["imageUrl"];
$textBox = $_POST["textBox"];

//connect
include("includes/db-connect.php"); 

//prepare

$stmt = $pdo->prepare("UPDATE `posts` 
    SET `title` = '$title', 
    `imageUrl` = '$imageUrl', 
    `textBox` = '$textBox' 
    WHERE `posts`.`id` = $id;");

if($stmt->execute() == true){
    ?> 
    <?php
    header("Location: dashboard.php");
}

?>
<a href="dashboard.php">Back to Dashboard</a>