<se?php session_start(); if (!isset($_SESSION['userid'])) { // Redirect to login page if not logged in header("Location:
  login.inc.php"); exit; } ?>

  <html lang="nl">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Next Step Solutions</title>
    <link rel="stylesheet" href="../css/style.css" />
    <style>
      html {
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

    <section id="diensten" class="diensten-section">
      <h2>Beroepsrollen Nextstepsolutions</h2>
      <div class="diensten-container">
        <div class="dienst">
          <h3>Softwareontwikkelaar (Developer)</h3>
          <p>
            De softwareontwikkelaar is verantwoordelijk voor het ontwerpen, ontwikkelen en implementeren van
            softwareoplossingen die aansluiten bij de behoeften van de klant. Ze werken nauw samen met andere teams om
            hoogwaardige softwareproducten te bouwen en testen. Hun taken omvatten het schrijven van code, het oplossen
            van technische problemen, en het toepassen van nieuwe technologieën om innovatieve oplossingen te leveren.
          </p>
        </div>
        <div class="dienst">
          <h3>Projectmanager (Scrum Master/Agile Coach)</h3>
          <p>
            De projectmanager zorgt voor de coördinatie en uitvoering van IT-projecten binnen Next Step Solutions. Vaak
            werkt deze rol als een Scrum Master of Agile Coach, die ervoor zorgt dat projecten binnen de tijd en het
            budget worden voltooid, volgens de behoeften van de klant. Deze persoon beheert teams, bewaakt de voortgang
            en
            lost obstakels op om een soepele samenwerking te garanderen.
          </p>
        </div>
        <div class="dienst">
          <h3>IT-consultant</h3>
          <p>
            De IT-consultant adviseert klanten over hoe ze hun technologie en bedrijfsprocessen kunnen verbeteren. Ze
            analyseren de huidige systemen van klanten, identificeren kansen voor optimalisatie, en bieden oplossingen
            die
            efficiëntie en productiviteit verhogen. Ze spelen ook een rol bij de implementatie van nieuwe IT-strategieën
            en helpen bedrijven met digitale transformatie.
          </p>
        </div>
      </div>
    </section>

    <section id="diensten" class="diensten-section">
      <h2>Scrum</h2>
      <div class="diensten-container">
        <div class="dienst">
          <h3>Wat is Scrum?</h3>
          <p>
            Scrum is een agile framework voor projectmanagement, met name voor softwareontwikkeling. Het is gericht op
            het
            leveren van werkbare producten in korte, gestructureerde werkperiodes, genaamd sprints. Scrum helpt teams om
            flexibel en snel te reageren op veranderende vereisten en prioriteiten, terwijl het de focus legt op
            samenwerking, klanttevredenheid, en voortdurende verbetering.
          </p>
        </div>
        <div class="dienst">
          <h3>Scrum Rollen en Verantwoordelijkheden</h3>
          <p>
            Er zijn drie hoofdrollen in Scrum:
          </p>
          <p>Product Owner: Verantwoordelijk voor het maximaliseren van de waarde van het product, het beheren van de
            product backlog, en het communiceren van de prioriteiten aan het team.</p>
          <p>Scrum Master: Faciliteert het proces, verwijdert obstakels voor het team en zorgt ervoor dat
            Scrum-principes
            worden gevolgd.</p>
          <p>Development Team: Zelfsturend team dat verantwoordelijk is voor het leveren van de werkende producten aan
            het
            einde van elke sprint.</p>
        </div>
        <div class="dienst">
          <h3>Scrum Events en Artefacten</h3>
          <p>Scrum kent vier belangrijke events:</p>
          <p>Sprint Planning: Hier wordt bepaald wat er in de komende sprint moet worden gedaan.</p>
          <p>Daily Scrum: Korte dagelijkse meeting waar teamleden hun voortgang en obstakels bespreken.</p>
          <p>Sprint Review: Na afloop van een sprint presenteert het team het voltooide werk aan de stakeholders.</p>
          <p>Sprint Retrospective: Het team bespreekt hoe ze hun proces kunnen verbeteren voor de volgende sprint.</p>
        </div>
      </div>
    </section>

    <!-- Diensten sectie -->
    <section id="diensten" class="diensten-section">
      <h2>HBO ICT</h2>
      <div class="diensten-container">
        <div class="dienst">
          <h3>Wat is HBO-ICT en Wat Leer Je?</h3>
          <p>
            De HBO-ICT opleiding is een praktijkgerichte studie waarin je leert om technologie en IT-oplossingen te
            ontwikkelen en toe te passen in de echte wereld. Studenten krijgen vakken in softwareontwikkeling,
            netwerken,
            security, datamanagement en digitale innovatie. Je leert zowel technische vaardigheden als
            projectmanagement,
            waardoor je complexe ICT-projecten kunt uitvoeren.
          </p>
        </div>
        <div class="dienst">
          <h3>Praktijkervaring en Specialisaties</h3>
          <p>
            Binnen HBO-ICT krijg je veel mogelijkheden om je te specialiseren, bijvoorbeeld in software engineering,
            cybersecurity, business IT, of technische informatica. De opleiding is sterk praktijkgericht, met stages en
            projecten bij bedrijven. Dit helpt studenten om direct ervaring op te doen en klaar te zijn voor de snel
            veranderende ICT-wereld.
          </p>
        </div>
        <div class="dienst">
          <h3>Carrièremogelijkheden Na Afstuderen</h3>
          <p>
            Na het afronden van de HBO-ICT opleiding heb je een breed scala aan carrièremogelijkheden. Afgestudeerden
            kunnen werken als softwareontwikkelaar, IT-consultant, netwerkbeheerder, data-analist, of security-expert.
            Door de voortdurende vraag naar ICT-professionals zijn er veel banen beschikbaar en is de kans op een
            succesvolle carrière groot.
          </p>
        </div>
      </div>
    </section>

    <section id="diensten" class="diensten-section">
      <h2>HBO Open ICT</h2>
      <div class="diensten-container">
        <div class="dienst">
          <h3>Zelf je leerroute bepalen: Flexibel studeren met HBO Open ICT</h3>
          <p>
            De HBO-opleiding Open ICT biedt studenten de vrijheid om hun eigen leertraject te bepalen. In plaats van een
            vast curriculum volg je een gepersonaliseerde leerroute die aansluit bij jouw interesses en
            carrièreambities.
            Je hebt de mogelijkheid om te kiezen uit verschillende onderwerpen, zoals softwareontwikkeling,
            netwerktechnologie, cybersecurity of data-analyse. Deze flexibele aanpak stelt je in staat om jouw
            vaardigheden op jouw eigen tempo te ontwikkelen, met ondersteuning van docenten en professionals uit het
            werkveld. Dit maakt Open ICT een ideale keuze voor studenten die hun studie willen afstemmen op hun unieke
            doelen.
          </p>
        </div>
        <div class="dienst">
          <h3>Multidisciplinair en praktijkgericht</h3>
          <p>
            HBO Open ICT is ontworpen om je voor te bereiden op de uitdagingen in de dynamische wereld van IT. De
            opleiding heeft een multidisciplinair karakter, wat betekent dat je kennis maakt met diverse domeinen binnen
            de ICT, zoals programmeren, cloud computing, netwerkbeheer, en IT-beveiliging. Door de praktijkgerichte
            aanpak
            werk je direct aan realistische projecten, vaak in samenwerking met bedrijven uit de regio. Dit zorgt ervoor
            dat je niet alleen theoretische kennis opdoet, maar ook praktische ervaring opbouwt die direct toepasbaar is
            in de beroepswereld. Je werkt in teams aan oplossingen voor actuele vraagstukken, wat je leert om creatief
            en
            probleemoplossend te denken.
          </p>
        </div>
        <div class="dienst">
          <h3>Voorbereid op de toekomst</h3>
          <p>
            De wereld van IT verandert snel, en de vraag naar goed opgeleide professionals groeit gestaag. HBO Open ICT
            aan de Hogeschool Utrecht is afgestemd op de laatste ontwikkelingen binnen de IT-sector. Dit betekent dat je
            als student up-to-date blijft met de nieuwste technologieën en tools die in de praktijk worden gebruikt. De
            opleiding werkt nauw samen met bedrijven en organisaties, waardoor je tijdens je studie al waardevolle
            contacten kunt opbouwen in het werkveld. Daarnaast kun je je specialiseren in vakgebieden die gewild zijn op
            de arbeidsmarkt, zoals cybersecurity, data science en cloud computing, waardoor je goed voorbereid bent op
            een
            succesvolle carrière in de IT.
          </p>
        </div>
      </div>
    </section>



    <!-- Over ons sectie -->
    <?php include 'footer.inc.php'; ?>
  </body>

  </html>