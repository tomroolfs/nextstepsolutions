<?php

// voeg database connectie toe.
include 'db.php';

// zet de error meldingen vast.
$errors = [];

// check of het formulier is verstuurd.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using $_POST
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $dateofbirth = trim($_POST['dateofbirth']);

    // has het wachtwoord.
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // zet de gebruiker in de database met SQL.
    $sql = "INSERT INTO users (username, password, email, phonenumber, dateofbirth) VALUES ('$username', '$hashedPassword', '$email', '$phone', '$dateofbirth')";

    // als de sql word uitgevoerd, word je herleid naar de login pagina om in te loggen.
    if ($conn->query($sql) === TRUE) {
        header("Location: ../includes/login.inc.php");
    } else {
        // anders krijg je een foutmelding.
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // sluit de database connectie.
    $conn->close();
}
