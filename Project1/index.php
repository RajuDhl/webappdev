<!--
Student Name: Raju Dahal
Student ID: 104055570

This file is only used to re-route the user and acts as a base URL. It routes user to login page if user not logged in.
If user is logged in, they get redirected to booking page.
-->
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once ('Includes/formValidation.php');
if (strlen($_SESSION['id']) == 0){
    header('location:logout.php');
}
header('location:../../Project1/booking.php');
?>

