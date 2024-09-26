<?php
session_start();

if (!isset($_SESSION['userid'])) {
  // Redirect to login page if not logged in
  header("Location: login.inc.php");
  exit;
}
include '../php/db.php';

$userId = $_SESSION['userid'];

$sql = "SELECT username, email, phonenumber, dateofbirth, role, profilepicture, description FROM users WHERE id = $userId";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();



// Create a DateTime object
$date = new DateTime($dateFromDB);

// Format it to "DD-MM-YYYY"
$formattedDate = $date->format('d-m-Y');
echo $formattedDate; // Output: 25-09-2024

?>


<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Profiel Pagina</title>
</head>

<body>
  <?php include 'navbar.inc.php'; ?>
  <div class="profielPaginaContainer">
    <div class="innerHeader">
      <div class="left">
        <div class="profielFoto">
          <?php if (!empty($row['profilepicture'])): ?>
            <img src="../uploads/<?php echo htmlspecialchars($row['profilepicture']); ?>" alt="Profile Picture" />
          <?php else: ?>
            <img src="../uploads/default.png" alt="Profile Picture" />
          <?php endif; ?>
        </div>
        <p><?php echo htmlspecialchars($row['role']); ?></p>
      </div>
      <div class="profielButtons">
        <form action="../php/update_profile.php" method="POST" enctype="multipart/form-data">
          <!-- Hidden file input -->
          <input type="file" id="profile_picture_input" name="profile_picture" accept="image/*" style="display: none;" />

          <!-- Button to trigger file input -->
          <button type="button" id="triggerFileInput" class="veranderFoto" style="display: block; margin-bottom: 10px;">Verander profielfoto</button>

          <!-- Hidden submit button -->
          <button type="submit" id="submitPicture" name="update_picture" style="display: none;"></button>

          <?php if (!empty($row['profilepicture'])): ?>
            <button type="submit" name="delete_picture" class="verwijderFoto" style="display: block;">Verwijder profielfoto</button>
          <?php endif; ?>
        </form>
      </div>

    </div>

    <?php
    // als er een success melding is voor het wijzigen van gegevens, word die hier neer gezet in het groen.
    if (isset($_SESSION['success_melding'])) {
      echo '<div style="max-width: 500px;margin: 10px auto;" class="alert alert-success" role="alert">' . $_SESSION['success_melding'] . '</div>';
      $_SESSION['success_melding'] = null;
    }
    // als er een error melding is voor het wijzigen van gegevens, word die hier neer gezet in het rood.
    if (isset($_SESSION['error_melding'])) {
      echo '<div style="max-width: 600px;margin: 10px auto;" class="alert alert-danger" role="alert">' . $_SESSION['error_melding'] . '</div>';
      $_SESSION['error_melding'] = null;
    }
    ?>


    <form action="../php/update_profile.php" method="POST" enctype="multipart/form-data">
      <div class="profielGegevensContainer">
        <div class="left">
          <div class="profielInput">
            <p>Gebruikersnaam:</p>
            <input type="text" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" required />
          </div>
          <div class="profielInput">
            <p>Email:</p>
            <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required />
          </div>
          <div class="profielInput">
            <p>Telefoonnummer:</p>
            <input type="text" name="phonenumber" value="<?php echo htmlspecialchars($row['phonenumber']); ?>" required />
          </div>
        </div>
        <div class="right">
          <div class="profielInput">
            <p>Persoonlijke informatie:</p>
            <textarea name="description"><?php echo htmlspecialchars($row['description']); ?></textarea>
          </div>
          <div class="profielInput">
            <p>Geboortedatum:</p>
            <input style="cursor: not-allowed;" type="text" value="<?php echo htmlspecialchars($formattedDate); ?>" disabled />
          </div>
        </div>
      </div>
      <div class="profielFooter">
        <button type="submit">Sla gegevens op</button>
      </div>
    </form>
  </div>
  <?php include 'footer.inc.php'; ?>
</body>

<script>
  // JavaScript to handle the file input trigger
  document.getElementById('triggerFileInput').addEventListener('click', function() {
    document.getElementById('profile_picture_input').click();
  });

  // When a file is selected, submit the form
  document.getElementById('profile_picture_input').addEventListener('change', function() {
    if (this.files.length > 0) {
      document.getElementById('submitPicture').click();
    }
  });
</script>

</html>