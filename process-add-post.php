<?php 
//process-add-post.php
include("includes/session-check.php");
?>

<?php 

//receive variables
$title = $_POST["title"];
$date = $_POST["date"];
$imageUrl = $_POST["imageUrl"];
$textBox = $_POST["textBox"];
$userId = $_POST["userId"]; ////
//$isFeatured = $_POST["isFeatured"];


//insert data into the database table

//connect
include("includes/db-connect.php"); 

//prepare
// $stmt = $pdo->prepare("INSERT INTO `immnews-article` (`personId`, `articleTitle`, `articleDate`, `articleAuthor`, `articleText`, `isFeatured`) VALUES (NULL, '$articleTitle', '$articleDate', '$articleAuthor', '$articleText', '$isFeatured');");

$stmt = $pdo->prepare("INSERT INTO `posts` (`id`, `title`, `date`, `imageUrl`, `textBox`,`userId`) VALUES (NULL, '$title', '$date', '$imageUrl', '$textBox', '$userId');");



//execute
if($stmt->execute() == true){
	header("Location: dashboard.php");
    ?>
	<?php
}else{
	echo("Oops. Something went wrong");
	?>
	<a href="dashboard.php">Back to Dashboard</a>
	<?php
}
?>
