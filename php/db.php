<?php
// Database connection parameters
$host = 'localhost'; // Database host (usually 'localhost')
$db = 'nextstepsolutions'; // Database name
$user = 'root'; // Database username
$pass = ''; // Database password

// Establish a connection to the database using mysqli
$conn = new mysqli($host, $user, $pass, $db);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Uncomment the line below for debugging purposes
// echo "Connected successfully to the database";
?>