<?php 
//dashboard.php
include("includes/session-check.php");
//include("includes/header.php");
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
    <link rel="stylesheet" media="screen" href="css/dashboard.css">
    <link rel="stylesheet" media="screen" href="css/nav.css">
    <link rel="stylesheet" media="screen" href="css/footer.css">
    <!-- <link rel="stylesheet" media="screen" href="css/form.css">
    <link rel="stylesheet" media="screen and (max-width:480px)" href="css/mobile.css">
    <link rel="stylesheet" media="screen and (min-width:480px)" href="css/desktop.css"> -->
    <title>Dashboard</title>
</head>
<body>
    <?php
    include("includes/nav.php");
    ?>
    <main class="bg">


        <?php
        $id = $_SESSION["id"];
        $isAdmin = $_SESSION["isAdmin"];
        ?>

        <h1>Your Latest Posts</h1>
        <!-- Random slogan generator -->
        <?php
            $f_contents = file ("includes/slogans.txt");
            $line = $f_contents[array_rand ($f_contents)];
            echo ("<h2>$line</h2>");
        ?>

        <!-- do an onclick event -->
        <!-- <h2><a id="showPosts" href="javascript:;">Click to show more posts</a></h2>  -->
        <h2><a href="add-post.php">Add Post</a></h2>
        <h2><a id="favA"href="favourites.php">Favourites Page</a></h2>
        <!-- <section> </section> -->


        <?php
        //retrieve and display posts
        //connect
        include("includes/db-connect.php"); 

        //prepare
        //for the Admin Account only
        // $stmt = $pdo->prepare("SELECT * FROM `posts`");

        //only show the Posts the Current User Makes
        $stmt = $pdo->prepare("SELECT * FROM `posts` WHERE userId='$id'"); 

        //////////////////////////////////
        $currentUser = $pdo->prepare("SELECT * FROM `users-posts` WHERE userId='$id'");

        //execute
        $stmt->execute();
        $currentUser->execute();

        //display results

        while($row = $stmt->fetch()) { 

            $postId = $row["id"]; ////////////This is the LIKE functionality code.
            
            //count number of likes on post(???)   userId   postId 	
            $st = $pdo->prepare("SELECT * FROM `users-posts` WHERE `users-posts`.`postId` = $postId;");
            $st->execute();
            $like = $st -> fetchAll();
            $likes = count($like);

            $user = $pdo->prepare("SELECT * FROM `users-posts` WHERE `users-posts`.`userId` = $id AND `users-posts`.`postId` = $postId");
            $user->execute();
            $userLike = $user->fetch();

            //show either like or unlike button, with counter of number of current likes
            if ($userLike){
                ?> 
                <a class="likeButtons" href="process-like.php?userId=<?= $_SESSION["id"]; ?>&postId=<?= $row["id"]; ?> &like=0">Unlike(<?php echo("number of like: $likes") ?>)</a>
                <?php
            } else {
                ?>
                <a class="likeButtons" href="process-like.php?userId=<?= $_SESSION["id"]; ?>&postId=<?= $row["id"]; ?> &like=1">Like(<?php echo("number of like: $likes") ?>)</a>
                <?php 
            }


            //////////////////////////////////
            ?> 
            <!-- <p> -->
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
            <!-- </p> -->
            <!-- EDIT -->
            <a href="edit-post.php?id=<?php echo($row["id"]); ?>">Edit Entry</a>

            <!-- one-button click DELETE post -->
            <form method="POST" action="delete-post.php">
            <input type="hidden" name="id" value="<?= $row["id"] ?>">
            <input type="submit" id="deleteArticle" name="deleteArticle" value="Delete Article">
            </form>

            <?php    
        }
        ?>

        <hr>
        <aside>
        <div id="visitors">
                <h2>Site Vistors for Past 6 Months</h2>
                <table id="siteVisitors">
                </table>
        </div>
        </aside>
    </main>
<?php
include("includes/footer.php");
?>