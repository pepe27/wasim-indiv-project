<?php 
//add-post.php
// include("includes/header.php");
include("includes/session-check.php");
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
    <link rel="stylesheet" media="screen" href="css/add-post.css">
    <link rel="stylesheet" media="screen" href="css/nav.css">
    <link rel="stylesheet" media="screen" href="css/footer.css">
    <!-- <link rel="stylesheet" media="screen" href="css/form.css"> -->
    <!-- <link rel="stylesheet" media="screen and (max-width:480px)" href="css/mobile.css">
    <link rel="stylesheet" media="screen and (min-width:480px)" href="css/desktop.css"> -->
    <title>Add Post</title>
</head>
<body>
    <?php
    include("includes/nav.php");
    ?>
    <main class="bg">


        <h1>New day, New post</h1>

        <section id="addPostForm">
        <form method="POST" action="process-add-post.php">
            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Untitled">

            <label for="date">Date</label>
            <input type="date" name="date">

            <label for="imageUrl">Image URL</label>
            <input type="text" name="imageUrl" placeholder="url">

            <label for="textBox">Text</label>
            <textarea name="textBox" id="textBox" cols="30" rows="10" placeholder="How's your day going?"></textarea> <br>
        <!-- hidden userId value -->
            <input type="hidden" name="userId" value="<?= $_SESSION["id"] ?>">
            <div id="addButtons">
            <button type="submit">Post</button>
            <button type="reset">Reset</button>
            </div> 
        </form>
        </section>

    </main>

<?php
include("includes/footer.php");
?>