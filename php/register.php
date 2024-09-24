<<<<<<< Updated upstream
=======
<?php

include 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using $_POST
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dateofbirth = $_POST['dateofbirth'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL query to insert the data
    $sql = "INSERT INTO users (username, password, email, phonenumber, dateofbirth) VALUES ('$username', '$hashedPassword', '$email', '$phone', '$dateofbirth')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
>>>>>>> Stashed changes
