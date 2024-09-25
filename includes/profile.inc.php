<?php
session_start();

if (!isset($_SESSION['userid'])) {
    // Redirect to login page if not logged in
    header("Location: login.inc.php");
    exit;
}
?>  

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Profiel Pagina</title>
  </head>
  <body>
  <?php include 'navbar.inc.php'; ?>
    <div class="profielPaginaContainer">
      <div class="innerHeader">
        <div class="left">
          <div class="profielFoto"></div>
          <p>Klant</p>
        </div>
        <div class="profielButtons">
          <button class="veranderFoto">Verander profielfoto</button>
          <button class="verwijderFoto">Verwijder profielfoto</button>
        </div>
      </div>

      <div class="profielGegevensContainer">
        <div class="left">
          <div class="profielInput">
            <p>Gebruikersnaam:</p>
            <input />
          </div>
          <div class="profielInput">
            <p>Wachtwoord:</p>
            <input />
          </div>
          <div class="profielInput">
            <p>Email:</p>
            <input />
          </div>
          <div class="profielInput">
            <p>Telefoonnummer:</p>
            <input />
          </div>
        </div>
        <div class="right">
          <div class="profielInput">
            <p>Persoonlijke informatie:</p>
            <textarea></textarea>
          </div>
          <div class="profielInput">
            <p>Geboortedatum:</p>
            <input type="date" disabled />
            <p style="color: gray">Niet mogelijk om te wijzigen</p>
          </div>
        </div>
      </div>

      <div class="profielFooter"><button>Sla gegevens op</button></div>
    </div>
    <?php include 'footer.inc.php'; ?>
  </body>
</html>
