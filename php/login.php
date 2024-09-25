<?php
session_start();

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
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // verbind het resultaat van de ingevoerde gegevens naar variabels.
        $stmt->bind_result($id, $dbUsername, $hashedPassword);
        $stmt->fetch();

        // check het wachtwoord en hash het
        if (password_verify($password, $hashedPassword)) {
            // zet de session variabels.
            $_SESSION['userid'] = $id;
            $_SESSION['username'] = $dbUsername;

            //redirect naar home pagina, gebruikersnaam en wachtwoord zijn correct.
            header("Location: ../includes/home.inc.php");
            exit;
        } else {
            //foute gebruikersnaam en/of wachtwoord ingevoerd
            $errors[] = "Incorrect password.";
            header("Location: ../includes/login.inc.php");
        }
    } else {
        $errors[] = "User not found.";
    }

    $stmt->close();
}

// sluit de database connectie.
$conn->close();