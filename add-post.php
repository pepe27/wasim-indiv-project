<?php 
//add-post.php
?>

<?php

//include("includes/session-check.php");

include("includes/header.php");
?>



<form method="POST" action="process-add-post.php">
    <label for="Title">Title</label>
	<input type="text" name="Title" placeholder="Untitled">

    <label for="Date">Date</label>
    <input type="text" name="Date">

    <label for="name1">Name</label>
    <input type="text" name="articleAuthor" placeholder="articleAuthor">

    <label for="name1">Name</label>
    <input type="textbox" name="articleText" placeholder="articleText">
   
	<button type="submit">Post</button>
    <button type="reset">Reset</button> 
</form>

<?php
include("includes/footer.php");
?>