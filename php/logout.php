<?php
session_start();

session_unset();
session_destroy();

header('Location: ../includes/login.inc.php');

exit;// Destroy the session