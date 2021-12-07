<?php 
//edit-post.php
?>

<?php

include("includes/session-check.php");

include("includes/header.php");
?>
<title>Edit Post</title>
<h1>Change is good</h1>

<section id="addPostForm">
<form method="POST" action="process-edit-post.php">
    <label for="Title">Title</label>
	<input type="text" name="Title" placeholder="Untitled">

    <label for="imageUrl">Image URL</label>
    <input type="text" name="imageUrl" placeholder="url">

    <label for="name1">Text</label>
    <textarea name="text" id="text" cols="30" rows="10" placeholder="How's your day going?"></textarea> <br>
   
	<button type="submit">Edit</button>
</form>
</section>

<?php
include("includes/footer.php");
?>