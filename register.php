<?php 
//register-form.php
include("includes/header.php");
?>
<title>Registration Form</title>
<h1>A journey of a thousand miles begins with a single step :</h1>

<section id="regForm">
    <form action="process-register.php" method="POST"> 
    <input type="text" name="username" placeholder="username">
    <input type="text" name="password" placeholder="password">
    <input type="text" name="nickname" placeholder="firstName">
    <input type="text" name="email" placeholder="lastName">
    <input type="text" name="dob" placeholder="dob">
    <input type="submit" name="submit">
    </form>
</section>

<?php
include("includes/footer.php");
?>