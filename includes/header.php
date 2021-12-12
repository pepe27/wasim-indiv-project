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
    <link rel="shortcut icon" type="image/jpg" href="assets/wisp-favicon.png"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="https://use.typekit.net/cqi5tsz.css"> 
    <!-- Dazzle Unicase font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Work Sans font -->
    <link rel="stylesheet" media="screen" href="css/initialize.css">
    <link rel="stylesheet" media="screen" href="css/form.css">
    <link rel="stylesheet" media="screen" href="css/base.css">
    <link rel="stylesheet" media="screen" href="css/nav.css">

    <link rel="stylesheet" media="screen and (max-width:480px)" href="css/mobile.css">
    <link rel="stylesheet" media="screen and (min-width:480px)" href="css/desktop.css">

</head>
<body>
<!-- style = "padding: 15em 2em 10em;"     -->
    <header>
        <nav>
            <ul>

                <!-- <li><a href="admin-dashboard.php">Dashboard</a></li>
			    <li><a href="logout.php">logout</a></li> -->
                <?php //this below is NOT working
                // if(isset($_GET["personId"]) == true){
                //     $personId = $_GET["personId"];
                //     echo ("<li><a href='admin-dashboard.php'>Dashboard</a></li>");
                //     echo("<li><a href='logout.php'>logout</a></li>");
                // }
                //session_start();
                if(!isset($_SESSION["id"])){
                    echo("<li><img src='assets/wisp-favicon.png' alt='wisp logo' id='logo'></li>");
                    echo ("<li><a href='about.php'>About</a></li>");
                    echo ("<li><a href='contact.php'>Contact</a><li>");
                    echo ("<li><a href='login.php'>Login</a></li>");
                    echo ("<li><a href='register.php'>Register</a></li>");
                } else {
                    echo("<li><img src='assets/wisp-favicon.png' alt='wisp logo' id='logo'></li>");
                    echo ("<li><a href='about.php'>About</a></li>");
                    echo ("<li><a href='contact.php'>Contact</a><li>");
                    echo ("<li><a href='dashboard.php'>Dashboard</a></li>");
                    echo("<li><a href='favourites.php'>Favourites</a></li>");
                    echo("<li><a href='logout.php'>Logout</a></li>");
                }


                ?>
            </ul>
        </nav>
    </header>

<!-- <button id="toggle">Reading Assistance</button> -->

