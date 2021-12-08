<?php 
//about.php
include("includes/header.php");?>

<title>About Wisp</title>

<h1>Brevity is the soul of wit</h1>
<!-- <section id="about">
<p>Need a place to jot out all the thoughts in your Head? Too stressed but don’t want to off-load your
problems to someone else? Do it here, this is your quiet place. Not too long, not too short. Just right.</p>
</section> -->

<?php
//retrieve and display about page
//connect
include("includes/db-connect.php"); 

//prepare
$stmt = $pdo->prepare("SELECT * FROM `about` WHERE `about`.`id` = 1");

//execute
$stmt->execute();

//display results
while($row = $stmt->fetch()) { 
	?><section id="about"><p><?php    
	echo($row["text"]);
	//echo("<br/>");
	?> 

    </section></p><?php    
}
?>

<h2>Don't have a place to vent? <a href="register.php">Register</a></h2>
<?php
include("includes/footer.php");
?>

