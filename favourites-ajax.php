<?php //favourites-ajax.php ?>
<?php 
//favourites.php //not this one,just copied the code
include("includes/session-check.php");
// include("includes/header.php");
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

    <!-- AJAX THINGS@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <h2><a id="showData" href="javascript:;">Load Posts</a></h2>
    <section id="output"></section>

    <!-- <section></section> -->
    <!-- HOW TO IMPLEMENT? LOOK AT THE A1/A2 CODE FOR LIKES / SET FEATURED ARTICLE (except CAN have multiple favourite? How to design the DB??) -->

    <?php
    //retrieve and display posts
    //connect
    // include("includes/db-connect.php"); 

    // //prepare
    // //only show the Posts the Current User has Liked
    // $stmt = $pdo->prepare("SELECT `posts`.* FROM `posts` , `users-posts` WHERE `posts`.`id` = `users-posts`.`postId`;"); 

    // //////////////////////////////////
    // // $currentUser = $pdo->prepare("SELECT * FROM `users-posts` WHERE userId='$id'");

    // //execute
    // $stmt->execute();
    
    // $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $json = json_encode($results);
    
    // echo($json);
    ?>

    </main>
    <script src="js/favourites-ajax.js"></script>    
<?php
include("includes/footer.php");
?>