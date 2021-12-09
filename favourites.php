<?php 
//favourites.php
include("includes/session-check.php");
include("includes/header.php");
?>

<?php
$id = $_SESSION["id"];
$isAdmin = $_SESSION["isAdmin"];
?>

<title>Your Favourite Posts</title>
<h1>Your Favourite Posts</h1>
<!-- <h2>Total Count: aNumber</h2> -->

<!-- Random slogan generator -->
<?php
    $f_contents = file ("includes/slogans.txt");
    $line = $f_contents[array_rand ($f_contents)];
    echo ("<h2>$line</h2>");
?>

<section></section>
<!-- HOW TO IMPLEMENT? LOOK AT THE A1/A2 CODE FOR LIKES / SET FEATURED ARTICLE (except CAN have multiple favourite? How to design the DB??) -->

<?php
//retrieve and display posts
//connect
include("includes/db-connect.php"); 

//prepare
//only show the Posts the Current User has Liked
$stmt = $pdo->prepare("SELECT `posts`.* FROM `posts` , `users-posts` WHERE `posts`.`id` = `users-posts`.`postId`;"); 

//////////////////////////////////
// $currentUser = $pdo->prepare("SELECT * FROM `users-posts` WHERE userId='$id'");

//execute
$stmt->execute();
// $currentUser->execute();

//display results

while($row = $stmt->fetch()) { 

    $postId = $row["id"]; ////////////This is the LIKE functionality code.
    
    //count number of likes on post   userId   postId 	
    $st = $pdo->prepare("SELECT * FROM `users-posts` WHERE `users-posts`.`postId` = $postId;");
    $st->execute();
    $like = $st -> fetchAll();
    $likes = count($like);

    $user = $pdo->prepare("SELECT * FROM `users-posts` WHERE `users-posts`.`userId` = $id AND `users-posts`.`postId` = $postId");
    $user->execute();
    $userLike = $user->fetch();

    //show either like or unlike button, with counter of number of current likes. Note: update-like-fav.php does not redirect to dashboard.php
    if ($userLike){
        ?> 
        <a href="process-like-fav.php?userId=<?= $_SESSION["id"]; ?>&postId=<?= $row["id"]; ?> &like=0">Unlike(<?php echo("number of like: $likes") ?>)</a>
        <?php
    } else {
        ?>
        <a href="process-like-fav.php?userId=<?= $_SESSION["id"]; ?>&postId=<?= $row["id"]; ?> &like=1">Like(<?php echo("number of like: $likes") ?>)</a>
        <?php 
    }


    //////////////////////////////////
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
	<?php    
}
?>

<?php
include("includes/footer.php");
?>