<?php 
//favourites.php
include("includes/session-check.php");
// include("includes/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/metadata.php"); ?>
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
    <!-- <link rel="stylesheet" media="screen" href="css/base.css"> -->
    <link rel="stylesheet" media="screen" href="css/favourites.css">
    <link rel="stylesheet" media="screen" href="css/nav.css">
    <link rel="stylesheet" media="screen" href="css/footer.css">
    <!-- <link rel="stylesheet" media="screen" href="css/form.css"> -->
    <!-- <link rel="stylesheet" media="screen and (max-width:480px)" href="css/mobile.css">
    <link rel="stylesheet" media="screen and (min-width:480px)" href="css/desktop.css"> -->
    <title>Your Favourite Posts</title>
</head>
<body>
    <?php
    include("includes/nav.php");
    include("includes/toggle.php"); //!!!!!!! THIS ISN"T ON EVERY PAGE YET
    ?>
<main class="bg">

    <?php
    $id = $_SESSION["id"];
    $isAdmin = $_SESSION["isAdmin"];
    ?>

    <h1>Your Favourite Posts</h1>
    <!-- <h2>Total Count: aNumber</h2> -->

    <!-- Random slogan generator -->
    <?php
        $f_contents = file ("includes/slogans.txt");
        $line = $f_contents[array_rand ($f_contents)];
        echo ("<h2>$line</h2>");
    ?>

    <!-- <section></section> -->
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
            <a href="process-like-fav.php?userId=<?= $_SESSION["id"]; ?>&postId=<?= $row["id"]; ?> &like=0">Unfavourite(<?php echo("number of favs: $likes") ?>)</a>
            <?php
        } else {
            ?>
            <a href="process-like-fav.php?userId=<?= $_SESSION["id"]; ?>&postId=<?= $row["id"]; ?> &like=1">Favourite(<?php echo("number of favs: $likes") ?>)</a>
            <?php 
        }


        //////////////////////////////////
        ?> 
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
        <?php    
    }
    ?>
    </main>
    <script src="js/favourites-ajax.js"></script>    
<?php
include("includes/footer.php");
?>