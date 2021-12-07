<?php //process-register-form.php


//receive variables
$username = $_POST["username"];
$password = $_POST["password"];
$nickname = $_POST["nickname"];
$email = $_POST["email"];
$dob = $_POST["dob"];

//insert data into the database table

//connect
include("includes/db-connect.php"); 

//prepare
$stmt = $pdo->prepare("INSERT INTO `users` (`personId`, `username`, `password`, `nickname`, `email`, `dob`) VALUES (NULL, '$username', '$password', '$nickname', '$email', '$dob');");


//execute
if($stmt->execute() == true){
	header("Location: dashboard.php");
}else{
	echo("Oops. Something went wrong");
	?>
	<a href="register.php">Back to Registration.</a>
	<?php
}
?>
