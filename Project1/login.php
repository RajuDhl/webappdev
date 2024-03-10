<!--
Student Name: Raju Dahal
Student ID: 104055570

This file is used to log in a user and save the info in SESSION.
-->
<?php
session_start();

$email = $_GET['user'];
$admin = $_GET['admin'];
echo $email;

$_SESSION['id'] = 1;
$_SESSION['email'] = $email;
$_SESSION['admin'] = $admin;

header('location:booking.php');
?>