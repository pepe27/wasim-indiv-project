<?php 
//about.php
//include("includes/header.php");?>

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
    <link rel="stylesheet" media="screen" href="css/about.css">
    <link rel="stylesheet" media="screen" href="css/nav.css">
    <link rel="stylesheet" media="screen" href="css/footer.css">
    <!-- <link rel="stylesheet" media="screen" href="css/form.css">
    <link rel="stylesheet" media="screen and (max-width:480px)" href="css/mobile.css">
    <link rel="stylesheet" media="screen and (min-width:480px)" href="css/desktop.css"> -->
    <title>About Wisp</title>

</head>
<body>
    <?php
    include("includes/nav.php");
    include("includes/toggle.php"); //!!!!!!! THIS ISN"T ON EVERY PAGE YET
    ?>
    <main class="bg">
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
            <h2>Don't have a place to vent? <a href="register.php">Register</a></h2>

            </section></p><?php    
        }
        ?>


    </main>

<?php
include("includes/footer.php");
?>

