<?php 
//add-post.php
?>

<?php

//include("includes/session-check.php");

include("includes/header.php");
?>



<form method="POST" action="process-add-post.php">
	<input type="text" name="articleTitle" placeholder="articleTitle">
    <input type="text" name="articleDate" placeholder="articleDate">
    <input type="text" name="articleAuthor" placeholder="articleAuthor">
    <input type="textbox" name="articleText" placeholder="articleText">
    <input type="radio" id="isFeatured" name="isFeatured" value="1">
    <label for="isFeatured">isFeatured</label>
	<input type="submit">
</form>

<?php
include("includes/footer.php");
?>