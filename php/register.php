<?php
session_start();

include 'db.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $birthdate = trim($_POST['birthdate']);

    if (empty($username)) {
        $errors[] = "Username is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email address is required";
    }
    if (empty($phone) || !preg_match('/^[0-9]{10,15}$/', $phone)) {
        $errors[] = "Valid phone number is required";
    }
    if (empty($birthdate) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $birthdate)) {
        $errors[] = "Valid date of birth is required (YYYY-MM-DD)";
    }

    if (empty($errors)) {

        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare an SQL statement to insert the data into the users table
        $stmt = $conn->prepare("INSERT INTO users (username, password, email, phone, birthdate) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $hashedPassword, $email, $phone, $birthdate);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to the login page or display a success message
            header("Location: login.inc.php");
            exit;
        } else {
            $errors[] = "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}
