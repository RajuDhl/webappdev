<?php
const DB_SERVER = 'localhost';
const DB_USER = 'root';
const DB_PASS = 'Kathmandu@1';
const DB_NAME = 'cabsOnline';
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>