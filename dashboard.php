<?php 
//dashboard.php
include("includes/session-check.php");
include("includes/header.php");
?>

<?php
$id = $_SESSION["id"];
$isAdmin = $_SESSION["isAdmin"];
?>

<title>Dashboard</title>
<h1>Your Latest Posts</h1>
<h2><a href="add-post.php">Add Post</a></h2>

<h2><a id="showPosts" href="javascript:;">Click to show more posts</a></h2> 
<!-- do an onclick event -->

<section> </section>


<?php
//retrieve and display posts
//connect
include("includes/db-connect.php"); 

//prepare
$stmt = $pdo->prepare("SELECT * FROM `posts`");
//////////////////////////////////
$currentUser = $pdo->prepare("SELECT * FROM `users-posts` WHERE userId='$id'");

//execute
$stmt->execute();
$currentUser->execute();


//display results

while($row = $stmt->fetch()) { 

    $articleId = $row["id"]; //////////////
    
    ?> 
    <p>
    <?php

	echo($row["id"]);
	echo("<br/>");
	echo($row["title"]);
	echo("<br/>");
	echo($row["date"]);
	echo("<br/>");
	echo($row["imageUrl"]);
	echo("<br/>");
    echo($row["textBox"]);
    echo("<br/>");
	?>
    </p>
    <!-- EDIT -->
    <a href="edit-post.php?id=<?php echo($row["id"]); ?>">Edit Entry</a>

    <!-- one-button click DELETE post -->
    <form method="POST" action="delete-post.php">
    <input type="hidden" name="id" value="<?= $row["id"] ?>">
    <input type="submit" name="deleteArticle" value="Delete Article">
    </form>

	<?php    
}
?>

<hr>
<div id="visitors">
        <h2>Site Vistors for Past 6 Months</h2>
        <table id="siteVisitors">
        </table>
</div>

<?php
include("includes/footer.php");
?>