<?php //fav-ajax-only.php
?>
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
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    
    echo($json);
    ?>