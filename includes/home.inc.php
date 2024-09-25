<?php
session_start();

if (!isset($_SESSION['userid'])) {
    // Redirect to login page if not logged in
    header("Location: login.inc.php");
    exit;
}
?>

<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Next Step Solutions</title>
    <link rel="stylesheet" href="../css/style.css" />
    <style>
        html{
            scroll-behavior: smooth;
        }
    </style>
  </head>
  <body>
  <?php include 'navbar.inc.php'; ?>
    <section id="home" class="hero">
      <div class="hero-content">
        <img src="../images/image.png" class="homelogo">
        <h2>Jouw partner voor digitale vooruitgang</h2>
        <p>
          Wij bieden innovatieve IT-oplossingen voor bedrijven van elke grootte.
        </p>
        <a href="#diensten" class="cta-button">Wat biedt de HBO-ICT?</a>
      </div>
    </section>

    <!-- Diensten sectie -->
    <section id="diensten" class="diensten-section">
      <h2>HBO ICT</h2>
      <div class="diensten-container">
        <div class="dienst">
          <h3>Wat is HBO-ICT en Wat Leer Je?</h3>
          <p>
            De HBO-ICT opleiding is een praktijkgerichte studie waarin je leert om technologie en IT-oplossingen te ontwikkelen en toe te passen in de echte wereld. Studenten krijgen vakken in softwareontwikkeling, netwerken, security, datamanagement en digitale innovatie. Je leert zowel technische vaardigheden als projectmanagement, waardoor je complexe ICT-projecten kunt uitvoeren.
          </p>
        </div>
        <div class="dienst">
          <h3>Praktijkervaring en Specialisaties</h3>
          <p>
            Binnen HBO-ICT krijg je veel mogelijkheden om je te specialiseren, bijvoorbeeld in software engineering, cybersecurity, business IT, of technische informatica. De opleiding is sterk praktijkgericht, met stages en projecten bij bedrijven. Dit helpt studenten om direct ervaring op te doen en klaar te zijn voor de snel veranderende ICT-wereld.
          </p>
        </div>
        <div class="dienst">
          <h3>Carrièremogelijkheden Na Afstuderen</h3>
          <p>
            Na het afronden van de HBO-ICT opleiding heb je een breed scala aan carrièremogelijkheden. Afgestudeerden kunnen werken als softwareontwikkelaar, IT-consultant, netwerkbeheerder, data-analist, of security-expert. Door de voortdurende vraag naar ICT-professionals zijn er veel banen beschikbaar en is de kans op een succesvolle carrière groot.
          </p>
        </div>
      </div>
    </section>

    <!-- Over ons sectie -->
    <?php include 'footer.inc.php'; ?>
  </body>
</html>
