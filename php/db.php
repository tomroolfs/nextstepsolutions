<?php
// naam van de database app (mysql)
$host = 'localhost';
// naam van de database
$db = 'nextstepsolutions';
// inlognaam van de database
$user = 'root';
// wachtwoord van de database
$pass = '';

// leg de bovenstaande gegevens vast in 1 variable: $conn
$conn = new mysqli($host, $user, $pass, $db);

// als de database connectie niet vast gesteld kan worden
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>