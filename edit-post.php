<?php 
//edit-post.php
include("includes/session-check.php");
include("includes/header.php");
$id = $_GET["id"];
// $id = $_POST["id"];

?>

<title>Edit Post</title>
<h1>Update record #<?= $id ?></h1>
<h2>Change is good</h2>

<section id="editPostForm">
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
//Preview of record
//(id,etc.... of a specific article)

//connect
include("includes/db-connect.php"); 

//prepare
$stmt = $pdo->prepare("SELECT * FROM `immnews-article` 
	WHERE `id` = $id");

//execute
$stmt->execute();

//display the record
$row = $stmt->fetch();
?>

<section id="editPostForm">
<form method="POST" action="process-edit-post.php">
    <input type="hidden" name="id" 
	value="<?= $row["id"] ?>">

    <label for="title">Title</label>
    <input type="text" name="title" value="<?= $row["title"] ?>">

    <label for="imageUrl">Image URL</label>
    <input type="text" name="imageUrl" value="<?= $row["imageUrl"] ?>">

    <!-- <input type="text" name="articleTitle" value="<?= $row["text"] ?>"> -->

    <label for="text">Text</label>
    <textarea name="text" id="text" cols="30" rows="10" value="<?= $row["text"] ?>"></textarea> <br>
   
	<button type="submit">Edit</button>
</form>
</section>

<?php
include("includes/footer.php");
?>