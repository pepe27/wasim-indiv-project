<?php 
//process-edit-post.php
include("includes/session-check.php");

?>

<?php 

$title = $_POST["title"];
// $date = $_POST["date"];
$imageUrl = $_POST["imageUrl"];
$text = $_POST["text"];

//connect
include("includes/db-connect.php"); 

//prepare
$stmt = $pdo->prepare("UPDATE `posts` 
    SET `title` = '$title',
    `imageUrl` = '$imageUrl',
    `text` = '$text'
    WHERE `posts`.`id` = $id;");

// UPDATE `person` 
// 	SET `firstName` = '$firstName', 
// 	`lastName` = '$lastName', 
// 	`dob` = '$dob' 
// 	WHERE `person`.`personId` = $personId;

    

if($stmt->execute() == true){
	?> 
    <?php
    header("Location: dashboard.php");
}

?>
<a href="dashboard.php">Back to Dashboard</a>