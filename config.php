<?php
// Database configuration
$host = 'localhost'; // Replace with your database host
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$database = 'dbdetails'; // Replace with your database name

// Establish database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die('Database connection error: ' . mysqli_connect_error());
}
?>
