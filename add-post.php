<?php 
//add-post.php
?>

<?php

include("includes/session-check.php");

include("includes/header.php");
?>
<title>Add Post</title>
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
   
	<button type="submit">Post</button>
    <button type="reset">Reset</button> 
</form>
</section>

<?php
include("includes/footer.php");
?>