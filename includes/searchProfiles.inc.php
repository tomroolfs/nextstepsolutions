<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Profiel Zoeken</title>
  </head>
  <body>
  <?php include 'navbar.inc.php'; ?>
    <div class="container">
      <div class="headerInner">
        <div class="profielTitelBox"><p>Profielen</p></div>
        <div class="zoekProfielBox">
          <img src="../images/searchIcon.png" />
          <input
            class="zoekInput"
            type="text"
            onkeyup="zoekProfielen()"
            placeholder="Zoeken"
          />
        </div>
      </div>
      <div class="profielenLijst">
        <p id="geenResultaten" style="display: none">
          Geen resultaten gevonden
        </p>
      </div>
    </div>

    <script>
      const profielen = [
        { naam: "Alice" },
        { naam: "Bob" },
        { naam: "Charlie" },
        { naam: "David" },
        { naam: "Eve" },
      ];

      const container = document.querySelector(".profielenLijst");
      const geenResultatenTekst = document.getElementById("geenResultaten");

      profielen.forEach(function (profiel) {
        container.innerHTML += `
                <div class="profiel">
                    <div class="profielCirkel"></div>
                    <p>${profiel.naam}</p>
                </div>
            `;
      });

      // Functie om te zoeken in de profielen
      function zoekProfielen() {
        const zoekTerm = document
          .querySelector(".zoekInput")
          .value.toUpperCase();
        container.innerHTML = ""; // Maak de container eerst leeg

        let resultatenGevonden = false; // Houdt bij of er resultaten zijn

        profielen.forEach(function (profiel) {
          if (profiel.naam.toUpperCase().includes(zoekTerm)) {
            container.innerHTML += `
                        <div class="profiel">
                            <div class="profielCirkel"></div>
                            <p>${profiel.naam}</p>
                        </div>
                    `;
            resultatenGevonden = true; // Er is ten minste één resultaat
          }
        });

        // Toon of verberg de "Geen resultaten" melding
        if (!resultatenGevonden) {
          container.innerHTML = `<p id="geenResultaten">Geen resultaten gevonden</p>`;
        } else {
          geenResultatenTekst.style.display = "none"; // Verberg de "Geen resultaten" tekst
        }
      }
    </script>
        <?php include 'footer.inc.php'; ?>
  </body>
</html>
