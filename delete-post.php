<?php
//delete-post.php
include("includes/session-check.php");
include("includes/header.php");

if(isset($_POST["id"]) == false){
	?> <p>We do not have the correct variables for this file to run</p><?php
}else{

//receive variables
$id = $_POST["id"];

//delete a specific record
//connect
include("includes/db-connect.php"); 

//prepare
$stmt = $pdo->prepare("DELETE FROM `posts` 
	WHERE `id` = $id");

if($stmt->execute() == true){
	?> <?php 
    header("Location: dashboard.php");
}

?>
<a href="dashboard.php">Back to Dashboard</a>

<?php
}

include("includes/footer.php");
?>