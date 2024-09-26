<?php
include 'db.php';

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Prepare the SQL statement to fetch user details
    $stmt = $conn->prepare("SELECT username, email, phonenumber, dateofbirth, description FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userDetails = $result->fetch_assoc();
        echo json_encode($userDetails);
    } else {
        echo json_encode([]);
    }

    $stmt->close();
    $conn->close();
}