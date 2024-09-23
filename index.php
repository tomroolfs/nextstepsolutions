<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Zo niet, omleiden naar de login pagina
    header("Location: includes/login.inc.php");
    exit;
} else {
    $loggedin = $_SESSION['loggedin'];
}
?>