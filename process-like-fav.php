<?php 
//update-like-fav.php 
//(ONLY for favourites.php, so no redirect to dashboard.php) 
include("includes/session-check.php");
//include("includes/header.php");

// if(isset($_GET["id"]) == true){
// 	$id = $_GET["id"];
// 	include("includes/header.php");
// }    
?>

<?php 
$userId = $_SESSION["id"];
$postId = $_GET["postId"];
$ifLike = $_GET["like"];

//connect
include("includes/db-connect.php"); 

if ($ifLike == 1) {
    //prepare
    $stmt = $pdo->prepare("INSERT INTO `users-posts` (`id`, `userId`, `postId`) VALUES (NULL, '$userId', '$postId');");

    if($stmt->execute() == true){
        ?> 
        <?php
        header("Location: favourites.php");
    } else {
        ?>
        <p>Error</p>
        <a href="favourites.php">Back To Favourites</a>
        <?php
    }
} 
else {
        //prepare
        $stmt = $pdo->prepare("DELETE FROM `users-posts` WHERE `users-posts`.`postId` = $postId AND `users-posts`.`userId` = $userId");
        
        if($stmt->execute() == true){
            echo("<p>Deleted</p>");
            header("Location: favourites.php");
        } else {
            ?>
            <p>Error</p>
            <a href="favourites.php">Back To Favourites</a>
            <?php
        }
    }

// if($stmt->execute() == true){
// 	?> 
//     <?php
//     header("Location: admin-dashboard.php");
// }

?>
<a href="dashboard.php">Back to Dashboard</a>
