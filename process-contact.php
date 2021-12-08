<?php 
//process-contact.php
?>

<?php
//receive variables 
$name1 = $_POST["name1"]; 
$email = $_POST["email"];
$message = $_POST["message"]; 
//insert data into the database table

//connect
include("includes/db-connect.php"); 

//prepare

$stmt = $pdo->prepare("INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES (NULL, '$name1', '$email', '$message');");


//execute
if($stmt->execute() == true){
	echo('{"success":"true"}');
}else{
	echo('{"success":"false"}');
}
//insert doesn't need to display data, it just needs to echo
?>