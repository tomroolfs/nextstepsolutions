<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Zo niet, omleiden naar de login pagina
    header("Location: includes/login.inc.php");
    exit;
} else {
    // zet de variable vast als correct is ingelogd: $loggedin
    $loggedin = $_SESSION['loggedin'];
}
?>