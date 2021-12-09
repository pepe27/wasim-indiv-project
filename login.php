<?php 
// login.php
// login-in form 
include("includes/header.php");
?>
<title>Wisp Login</title>
<h1>Login</h1>
<!-- Random slogan generator -->
<?php
    $f_contents = file ("includes/slogans.txt");
    $line = $f_contents[array_rand ($f_contents)];
    echo ("<h2>$line</h2>");
?>

<section id="loginForm">
<form action="process-login.php" method="POST">
<label for="username">Username</label>
<input type="text" name="username" /> 
<label for="password">Password</label>
<input type="text" name="password" /> 
<button type="submit">Login</button>
</form>
</section>

<h2>Don't have a place to vent? <a href="register.php">Register</a></h2>
<?php
include("includes/footer.php");
?>