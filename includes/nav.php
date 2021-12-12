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