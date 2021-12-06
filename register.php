<?php 
//register-form.php
include("includes/header.php");
?>
<link rel="stylesheet" media="screen" href="css/form.css">
<title>Registration Form</title>
<h1>A journey of a thousand miles begins with a single step :</h1>

<!-- <section id="regForm">
    <form action="process-register.php" method="POST"> 
    <label for="username">Username</label><br>
    <input type="text" name="username" required> <br>
    <label for="password">Password</label><br>
    <input type="text" name="password" required> <br>
    <label for="nickname">Nickname</label><br>
    <input type="text" name="nickname"> <br>
    <label for="email">Email</label><br>
    <input type="text" name="email" required> <br>
    <label for="dob">Dob</label><br>
    <input type="text" name="dob" required> <br>
    <input type="submit" name="submit">
    </form>
</section> -->

<section id="regForm">
    <form action="process-register.php" method="POST"> 
    <label for="username">Username</label>
    <input type="text" name="username" required> 
    <label for="password">Password</label>
    <input type="text" name="password" required>
    <label for="nickname">Nickname</label>
    <input type="text" name="nickname">
    <label for="email">Email</label>
    <input type="text" name="email" required>
    <label for="dob">Dob</label>
    <input type="text" name="dob" required>
    <button type="submit">Register</button>
    </form>
</section>

<?php
include("includes/footer.php");
?>