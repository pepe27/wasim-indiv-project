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
<!-- Random slogan generator -->
<?php
    $f_contents = file ("includes/slogans.txt");
    $line = $f_contents[array_rand ($f_contents)];
    echo ("<h2>$line</h2>");
?>

<!-- do an onclick event -->
<h2><a id="showPosts" href="javascript:;">Click to show more posts</a></h2> 
<h2><a href="add-post.php">Add Post</a></h2>
<h2><a href="favourites.php">Favourites/Likes</a></h2>
<section> </section>


<?php
//retrieve and display posts
//connect
include("includes/db-connect.php"); 

//prepare
//for the Admin Account only
// $stmt = $pdo->prepare("SELECT * FROM `posts`");

//only show the Posts the Current User Makes
$stmt = $pdo->prepare("SELECT * FROM `posts` WHERE userId='$id'"); 

//////////////////////////////////
$currentUser = $pdo->prepare("SELECT * FROM `users-posts` WHERE userId='$id'");

//execute
$stmt->execute();
$currentUser->execute();

//display results

while($row = $stmt->fetch()) { 

    $postId = $row["id"]; ////////////This is the LIKE functionality code.
    
    //count number of likes on post(???)   userId   postId 	
    $st = $pdo->prepare("SELECT * FROM `users-posts` WHERE `users-posts`.`postId` = $postId;");
    $st->execute();
    $like = $st -> fetchAll();
    $likes = count($like);

    $user = $pdo->prepare("SELECT * FROM `users-posts` WHERE `users-posts`.`userId` = $id AND `users-posts`.`postId` = $postId");
    $user->execute();
    $userLike = $user->fetch();

    //show either like or unlike button, with counter of number of current likes
    if ($userLike){
        ?> 
        <a href="process-like.php?userId=<?= $_SESSION["id"]; ?>&postId=<?= $row["id"]; ?> &like=0">Unlike(<?php echo("number of like: $likes") ?>)</a>
        <?php
    } else {
        ?>
        <a href="process-like.php?userId=<?= $_SESSION["id"]; ?>&postId=<?= $row["id"]; ?> &like=1">Like(<?php echo("number of like: $likes") ?>)</a>
        <?php 
    }


    //////////////////////////////////
    ?> 
    <!-- <p> -->
    <section class="dbOutput">
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
    </section>
    <!-- </p> -->
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