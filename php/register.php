<?php
session_start(); // start de sessie om variabels vast te zetten.

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

    // check of de gebruiker al bestaat. eerst de data ophalen.
    $sqlUsernameCheck = "SELECT id FROM users WHERE username = ?";
    $stmtUsername = $conn->prepare($sqlUsernameCheck);
    $stmtUsername->bind_param("s", $username);
    $stmtUsername->execute();
    $stmtUsername->store_result();

    // daarna met de data de check doen.
    if ($stmtUsername->num_rows > 0) {
        // fout melding omdat gebruiker bestaat.
        $_SESSION['error_melding'] = "Gebruiker bestaat al";
        // herleid de gebruiker terug naar de registratie pagina.
        header("Location: ../includes/register.inc.php");
        exit;
    }

    // haalt de data op om later te kijken of het email adres al bestaat.
    $sqlEmailCheck = "SELECT id FROM users WHERE email = ?";
    $stmtEmail = $conn->prepare($sqlEmailCheck);
    $stmtEmail->bind_param("s", $email);
    $stmtEmail->execute();
    $stmtEmail->store_result();

    // als het email al bestaat
    if ($stmtEmail->num_rows > 0) {
        // fout melding omdat email adres bestaat.
        $_SESSION['error_melding'] = "Email adres is al in gebruik";
        // herleid de gebruiker terug naar de registratie pagina.
        header("Location: ../includes/register.inc.php");
        exit;
    }

    // validatie voor alle ingevoerde velden
    if (empty($username) || empty($password) || empty($email) || empty($phone) || empty($dateofbirth)) {
        // foutmelding als de velden niet worden opgegeven.
        $_SESSION['error_melding'] = "Alle velden zijn verplicht!";
        // herleid de gebruiker terug naar de register pagina.
        header("Location: ../includes/register.inc.php");
        exit;
    }

    // Email validatie
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // fout melding, het is geen geldig email adres.
        $_SESSION['error_melding'] = "Ongeldig e-mailadres!";
        // herleid de gebruiker terug naar de registratie pagina.
        header("Location: ../includes/register.inc.php");
        exit;
    }

    // validatie voor telefoonnummer, mag maximaal 11 nummers bevatten.
    if (!preg_match('/^\d{1,11}$/', $phone)) {
        // fout melding, maximaal 11 nummers.
        $_SESSION['error_melding'] = "Ongeldig telefoonnummer! Het moet maximaal 11 cijfers bevatten.";
        // herleid de gebruiker terug naar de registratie pagina.
        header("Location: ../includes/register.inc.php");
        exit;
    }

    // hash het wachtwoord. leg het ingevoerde $password vast in een nieuw variable: $hashedPassword. dit gebruiken we later.
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // de query om de nieuwe gebruiker vast te leggen in de database met SQL.
    $sql = "INSERT INTO users (username, password, email, phonenumber, dateofbirth) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    // hier binden we de ingevoerde velden aan de tabellen in de database. bind_param verbinde ze hierboven^ aan de VALUES.
    $stmt->bind_param("sssss", $username, $hashedPassword, $email, $phone, $dateofbirth);

    if ($stmt->execute()) {
        // het is gelukt. gebruiker word herleid naar de login pagina om in te loggen.
        $_SESSION['success_melding'] = "Registratie succesvol!";
        header("Location: ../includes/login.inc.php");
    } else {
        // er is iets fout gegaan met het registreren met de database. voor nu word de gebruiker terug herleid naar de registratie pagina.
        $_SESSION['error_melding'] = "Fout bij registratie: " . $stmt->error;
        header("Location: ../includes/register.inc.php");
    }

    $stmt->close(); // sluit de SQL statement
    $conn->close(); // sluit de database connectie
}
