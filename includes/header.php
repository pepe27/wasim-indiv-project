<?php
//header.php
//need a nav bar, add enteries, Favorited entries, logout 

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
    <link rel="shortcut icon" type="image/jpg" href="assets/logo.jpg"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="https://use.typekit.net/cqi5tsz.css"> 
    <!-- dazzle unicase font -->
    <link rel="stylesheet" media="screen" href="css/form.css">
    <link rel="stylesheet" media="screen" href="css/base.css">
    <link rel="stylesheet" media="screen and (max-width:480px)" href="css/mobile.css">
    <link rel="stylesheet" media="screen and (min-width:480px)" href="css/desktop.css">

</head>
<body>
<!-- style = "padding: 15em 2em 10em;"     -->
    <header>
        <img src="assets/logo.jpg" alt="wisp logo">
        <nav>
            <ul>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>

                <!-- <li><a href="admin-dashboard.php">Dashboard</a></li>
			    <li><a href="logout.php">logout</a></li> -->
                <?php //this below is NOT working
                // if(isset($_GET["personId"]) == true){
                //     $personId = $_GET["personId"];
                //     echo ("<li><a href='admin-dashboard.php'>Dashboard</a></li>");
                //     echo("<li><a href='logout.php'>logout</a></li>");
                // }
                //session_start();
                if(isset($_SESSION["personId"])){
                    echo ("<li><a href='dashboard.php'>Dashboard</a></li>");
                    echo("<li><a href='logout.php'>logout</a></li>");
            
                }
                ?>
            </ul>
        </nav>
    </header>

<!-- <button id="toggle">Reading Assistance</button> -->
