<?php
session_start();
if (!isset($_SESSION['userid'])) {
  // Redirect to login page if not logged in
  header("Location: login.inc.php");
  exit;
}

include '../php/db.php';
$userId = $_SESSION['userid'];
?>

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
      <div class="profielTitelBox">
        <p>Profielen</p>
      </div>
      <div class="zoekProfielBox">
        <img src="../images/searchIcon.png" />
        <input
          class="zoekInput"
          type="text"
          onkeyup="zoekProfielen()"
          placeholder="Zoeken" />
      </div>
    </div>
    <div class="profielenLijst">
      <p id="geenResultaten" style="display: none">
        Geen resultaten gevonden
      </p>
    </div>
  </div>

  <!-- User Modal -->
  <div id="userModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2 id="modalUsername" class="font-bold text-lg"></h2>
        <span id="closeModal" class="close">&times;</span>
      </div>
      <div class="modal-body">
        <div class="left-section">
          <img id="modalProfileImage" src="" alt="Profile Image" class="profile-image" />
          <p>Email: <span id="modalEmail"></span></p>
          <p>Telefoonnummer: <span id="modalPhone"></span></p>
          <p>Geboortedatum: <span id="modalDOB"></span></p>
        </div>
        <div class="right-section">
          <h3 class="font-bold">Persoonlijke bio</h3>
          <p id="modalBio"></p>
        </div>
      </div>
    </div>
  </div>



  <script>
    const profielen = [];

    <?php
    // Query to get all profiles
    $sql = "SELECT * FROM users WHERE id != $userId ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output the data into JavaScript
      while ($row = $result->fetch_assoc()) {
        $profilePicturePath = $row['profilepicture'];
        // Check if the profile picture path is not empty or null
        $imagePath = !empty($profilePicturePath) ? $profilePicturePath : 'default.png';
        echo "profielen.push({ naam: '" . $row['username'] . "', image: '" . $imagePath . "', email: '" . $row['email'] . "', phone: '" . $row['phonenumber'] . "', dob: '" . $row['dateofbirth'] . "', bio: '" . $row['description'] . "' });\n";
      }
    }

    // Close connection
    $conn->close();
    ?>

    const container = document.querySelector(".profielenLijst");
    const geenResultatenTekst = document.getElementById("geenResultaten");

    // Fetch all user profiles and append them to the container
    profielen.forEach(function(profiel, index) {
      container.innerHTML += `
            <div class="profiel" onclick="showUserModal(${index})">
                <div class="profielCirkel"><img src="../uploads/${profiel.image}" /></div>
                <p>${profiel.naam}</p>
            </div>
        `;
    });

    // Function to show the user modal with the clicked user's data
    function showUserModal(index) {
      const profiel = profielen[index];

      // Set modal data
      document.getElementById('modalUsername').textContent = profiel.naam;
      document.getElementById('modalProfileImage').src = "../uploads/" + profiel.image;

      // Populate modal with detailed info
      document.getElementById('modalEmail').textContent = profiel.email || "Niet beschikbaar";
      document.getElementById('modalPhone').textContent = profiel.phone || "Niet beschikbaar";
      document.getElementById('modalDOB').textContent = profiel.dob || "Niet beschikbaar";
      document.getElementById('modalBio').textContent = profiel.bio || "Niet beschikbaar"; // Display the personal bio

      // Display the modal
      document.getElementById('userModal').style.display = 'block';
    }

    // Close modal when clicking on the "close" span
    document.getElementById('closeModal').onclick = function() {
      document.getElementById('userModal').style.display = 'none';
    };

    // Close modal when clicking anywhere outside of the modal content
    window.onclick = function(event) {
      if (event.target == document.getElementById('userModal')) {
        document.getElementById('userModal').style.display = 'none';
      }
    };

    // Function to search in profiles
    function zoekProfielen() {
      const zoekTerm = document.querySelector(".zoekInput").value.toUpperCase();
      container.innerHTML = ""; // Clear the container first

      let resultatenGevonden = false; // Track if there are results

      profielen.forEach(function(profiel) {
        if (profiel.naam.toUpperCase().includes(zoekTerm)) {
          container.innerHTML += `
                    <div class="profiel" onclick="showUserModal(${profielen.indexOf(profiel)})">
                        <div class="profielCirkel"><img src="../uploads/${profiel.image}" /></div>
                        <p>${profiel.naam}</p>
                    </div>
                `;
          resultatenGevonden = true; // At least one result found
        }
      });

      // Show or hide the "No results" message
      if (!resultatenGevonden) {
        container.innerHTML = `<p id="geenResultaten">Geen resultaten gevonden</p>`;
      } else {
        geenResultatenTekst.style.display = "none"; // Hide the "No results" text
      }
    }
  </script>




  <?php include 'footer.inc.php'; ?>
</body>

</html>