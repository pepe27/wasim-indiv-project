<?php 
// index.php
// login-in form 
include("includes/header.php");
?>
<title>Wisp Login</title>

<h1>Brevity is the soul of wit</h1>
<section id="loginForm">
<form action="process-login.php" method="POST">
<label for="username">Username:</label><br>
<input type="text" name="username" /> <br>
<label for="password">Password:</label><br>
<input type="text" name="password" /> <br>
<input type="submit" />   
</form>
</section>

<h2>Don't have a place to vent? <a href="register.php">Register</a></h2>
<?php
include("includes/footer.php");
?>