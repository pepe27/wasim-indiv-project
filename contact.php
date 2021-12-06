<?php
//contact.php

//contactText, contactInfo
include("includes/header.php");
?>

<title>Contact Form</title>
    <h1>Contact Us</h1>
    <section id="formStatus"> </section> 

    <p id="message">Please fill out the form below!</p>
    <form id="ajaxForm" action="process-contactNEW.php" method="POST">
    <label for="name1">Name</label>
    <input id="name1" type="text" name="name1" placeholder="Spongebob" required>
    <label for="email">Email</label>
    <input id="email" type="email" name="email" placeholder="pineapple@thesea.com" required>
    <label for="message">Message</label>
    <input id="message" type="textarea">
    <button type="submit">Send</button>
    </form>
    <script src="js/contact-ajax.js"></script>


<?php
include("includes/footer.php");
?>

