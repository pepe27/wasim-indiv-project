<?php 
//update-like.php 
include("includes/session-check.php");
include("includes/header.php");
// if(isset($_GET["personId"]) == true){
// 	$personId = $_GET["personId"];
// 	include("includes/header.php");
// }    
?>

<?php 
//AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
// $personId = $_POST["personId"];
// $userArticleId = $_POST["userArticleId"];

// $userId = $_POST["userId"];
$userId = $_SESSION["id"];

$articleId = $_GET["postId"];
//$articleId = $row["personId"];

$ifLike = $_GET["like"];
// $userLiked = $_POST["userLiked"];
//$hasEdited = $_POST["hasEdited"];

//connect
include("includes/db-connect.php"); 

if ($ifLike == 1) {
    //prepare
    $stmt = $pdo->prepare("INSERT INTO `users-posts` (`id`, `userId`, `postId`) VALUES (NULL, '$userId', '$articleId');");

    // INSERT INTO `immnews-user-article` (`userArticleId`, `userId`, `articleId`) VALUES (NULL, '$userId', '$articleId');

    if($stmt->execute() == true){
        ?> 
        <?php
        header("Location: dashboard.php");
    } else {
        ?>
        <p>Error</p>
        <a href="dashboard.php">Back To Dashboard</a>
        <?php
    }
} 
else {
        //prepare
        $stmt = $pdo->prepare("DELETE FROM `users-posts` WHERE `users-posts`.`postId` = $articleId AND `users-posts`.`userId` = $userId");

        // $stmt = $pdo->prepare("DELETE FROM `immnews-user-article` WHERE `immnews-user-article`.`userArticleId` = $userArticleId");
        
        if($stmt->execute() == true){
            echo("<p>Deleted</p>");
            header("Location: dashboard.php");
        } else {
            ?>
            <p>Error</p>
            <a href="dashboard.php">Back To Dashboard</a>
            <?php
        }
    }


// $stmt = $pdo->prepare("INSERT INTO `immnews-user-article` (`userArticleId`, `userId`, `articleId`) VALUES (NULL, '$userId', '$articleId');");


// if($stmt->execute() == true){
// 	?> 
//     <?php
//     header("Location: admin-dashboard.php");
// }

?>
<a href="dashboard.php">Back to Dashboard</a>
