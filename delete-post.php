<?php
//delete-post.php
include("includes/session-check.php");
//include("includes/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="wisp-journal-app">
    <meta name="keywords" content="wisp,journal,daily-journal">
    <link rel="author" content="Wisp" href="http://www.wisp-journal.com/" />
    <link rel="canonical" href="http://www.wisp-journal.com/" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="assets/wisp-favicon.png"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="https://use.typekit.net/cqi5tsz.css"> 
    <!-- Dazzle Unicase font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Work Sans font -->
    <link rel="stylesheet" media="screen" href="css/initialize.css">
    <link rel="stylesheet" media="screen" href="css/base.css">
    <link rel="stylesheet" media="screen" href="css/nav.css">
    <link rel="stylesheet" media="screen" href="css/form.css">
    <link rel="stylesheet" media="screen and (max-width:480px)" href="css/mobile.css">
    <link rel="stylesheet" media="screen and (min-width:480px)" href="css/desktop.css">
    <title>Delete Post</title>
</head>
<body>
    <?php
    include("includes/nav.php");
    ?>
	<main class="bg">
		<?php
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
		}?>
	</main>

<?php
include("includes/footer.php");
?>