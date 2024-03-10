<!--
Student Name: Raju Dahal
Student ID: 104055570

This file is used to clear the SESSION cache and sign out the user.
-->

<?php
session_start();
session_destroy();
header("location:signin.php");
?>
