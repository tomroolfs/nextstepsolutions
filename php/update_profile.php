<?php
include 'db.php';
session_start();

$userId = $_SESSION['userid'];

// check of het formulier is verstuurd via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check of alle velden zijn binnen gekomen en zet ze in variabels.
    if (isset($_POST['username'], $_POST['email'], $_POST['phonenumber'], $_POST['description'])) {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $phonenumber = trim($_POST['phonenumber']);
        $description = trim($_POST['description']);

        // Email validatie voor incorrect ingevoerde email adres.
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // fout melding, het is geen geldig email adres.
            $_SESSION['error_melding'] = "Ongeldig e-mailadres!";
            // herleid de gebruiker terug naar de registratie pagina.
            header("Location: ../includes/profile.inc.php");
            exit;
        }

        // validatie voor telefoonnummer, mag maximaal 11 nummers bevatten.
        if (!preg_match('/^\d{1,11}$/', $phonenumber)) {
            // fout melding, maximaal 11 nummers.
            $_SESSION['error_melding'] = "Ongeldig telefoonnummer! Het moet maximaal 11 cijfers bevatten.";
            // herleid de gebruiker terug naar de registratie pagina.
            header("Location: ../includes/profile.inc.php");
            exit;
        }

        // update de gegevens als gebruiker door de validatie komt.
        $updateProfileSql = "UPDATE users SET username=?, email=?, phonenumber=?, description=? WHERE id=?";
        $stmt = $conn->prepare($updateProfileSql);
        // verbind de ingevoerde gegevens met de database tabel.
        $stmt->bind_param("ssssi", $username, $email, $phonenumber, $description, $userId);

        if ($stmt->execute()) {
            // profiel is bijgewerkt.
            $_SESSION['success_melding'] = "Profiel is bijgewerkt";
            // herleid de gebruiker terug naar de registratie pagina.
            header("Location: ../includes/profile.inc.php");
            exit;
        } else {
            // er is iets fout gegaan. error melding.
            $_SESSION['error_melding'] = "Profiel kon niet worden bijgewerkt";
            // herleid de gebruiker terug naar de registratie pagina.
            header("Location: ../includes/profile.inc.php");
            exit;
        }

        $stmt->close();
    }

    // Handle profile picture update
    if (isset($_POST['update_picture']) && isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == UPLOAD_ERR_OK) {
        $targetDirectory = "../uploads/";
        $fileName = basename($_FILES["profile_picture"]["name"]);
        $targetFilePath = $targetDirectory . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array(strtolower($fileType), $allowedTypes)) {
            // Move the uploaded file to the server
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFilePath)) {
                // Update the profile picture path in the database
                $updatePictureSql = "UPDATE users SET profilepicture=? WHERE id=?";
                $pictureStmt = $conn->prepare($updatePictureSql);
                $pictureStmt->bind_param("si", $fileName, $userId);

                if ($pictureStmt->execute()) {
                    $_SESSION['success_melding'] = "Profiel foto gewijzigd";
                    // herleid de gebruiker terug naar de registratie pagina.
                    header("Location: ../includes/profile.inc.php");
                    exit;
                } else {
                    $_SESSION['error_melding'] = "Er was een fout met het wijzigen van de foto";
                    // herleid de gebruiker terug naar de registratie pagina.
                    header("Location: ../includes/profile.inc.php");
                    exit;
                }

                $pictureStmt->close();
            } else {
                $_SESSION['error_melding'] = "Er was een fout met het uploaden van de foto";
                // herleid de gebruiker terug naar de registratie pagina.
                header("Location: ../includes/profile.inc.php");
                exit;
            }
        } else {
            // er is geen JPG, PNG of GIF bestand geselecteerd.
            $_SESSION['error_melding'] = "Sorry, alleen JPG, PNG & GIF bestanden zijn toegestaan.";
            // herleid de gebruiker terug naar de registratie pagina.
            header("Location: ../includes/profile.inc.php");
            exit;
        }
    }

    // verwijder de profiel foto functie
    if (isset($_POST['delete_picture'])) {
        // haal de huidige profielfoto van de gebruiker op van de database.
        $fetchPictureSql = "SELECT profilepicture FROM users WHERE id=?";
        $fetchStmt = $conn->prepare($fetchPictureSql);
        $fetchStmt->bind_param("i", $userId);
        $fetchStmt->execute();
        $fetchStmt->bind_result($profilePicture);
        $fetchStmt->fetch();
        $fetchStmt->close();

        // als er een foto bestaat, verwijder deze. 
        if ($profilePicture && file_exists("../uploads/" . $profilePicture)) {
            // haalt de foto weg van de uploads folder in het project.
            unlink("../uploads/" . $profilePicture);
        }

        // zet het profiel foto tabel van de database op NULL
        $deletePictureSql = "UPDATE users SET profilepicture=NULL WHERE id=?";
        $deleteStmt = $conn->prepare($deletePictureSql);
        $deleteStmt->bind_param("i", $userId);

        if ($deleteStmt->execute()) {
            $_SESSION['success_melding'] = "Profiel foto verwijderd";
            // herleid de gebruiker terug naar de registratie pagina.
            header("Location: ../includes/profile.inc.php");
            exit;
        } else {
            $_SESSION['error_melding'] = "Er was een fout met het verwijderen van de profiel foto";
            // herleid de gebruiker terug naar de registratie pagina.
            header("Location: ../includes/profile.inc.php");
            exit;
        }

        $deleteStmt->close();
    }
}

$conn->close();
exit;
