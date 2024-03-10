<!--
Student Name: Raju Dahal
Student ID: 104055570

This file is used to make a connection to the database
-->


<?php

// Change these values to your database settings
$server = 'localhost';
$user = 'root';
$password = 'Kathmandu@1';
$database = 'cabsOnline';

$con = mysqli_connect($server,$user,$password,$database);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>