<?php 
//dashboard.php
//after login, user can see dashboard/links to favourited enteries
?>

<?php

include("includes/session-check.php");

include("includes/header.php");
?>

<h1>Your Latest Posts</h1>
<h2><a href="add-post.php">Add Post</a></h2>

<h2><a id="showPosts" href="javascript:;">Click to show more posts</a></h2> 
<!-- do an onclick event -->

<section>

</section>


<?php
include("includes/footer.php");
?>