<?php
session_start(); // start de sessie om variabels vast te zetten.

//voeg de database toe aan het php bestand
include 'db.php';

// zet de error meldingen vast.
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // haal de data op van het formulier van de login.inc.php file.
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    //checken of de gebruiker bestaat in de database.
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // hier word gecheckt of de gebruiker al bestaat.
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // chech het ingevoerde wachtwoord
        if (password_verify($password, $row['password'])) {
            // wachtwoord is goed. de sessie voor het userid word nu vast gelegd en de gebruiker word herleid naar de home pagina.
            $_SESSION['userid'] = $row['id'];
            header("Location: ../includes/home.inc.php");
            exit;
        } else {
            // fout ingevoerde wachtwoord
            $_SESSION['error_melding'] = "Fout wachtwoord";
            header("Location: ../includes/login.inc.php");
            exit;
        }
    } else {
        // gebruiker bestaat niet.
        $_SESSION['error_melding'] = "Gebruiker bestaat niet";
        header("Location: ../includes/login.inc.php");
        exit;
    }

    $stmt->close(); // sluit de sql statement.
    $conn->close(); // sluit de database connectie
}
