// Profielfoto uploaden
const uploadPhotoBtn = document.getElementById('uploadPhotoBtn');
const fileInput = document.getElementById('fileInput');
const profileImg = document.getElementById('profileImg');

uploadPhotoBtn.onclick = () => {
    fileInput.click();
};

fileInput.onchange = (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            profileImg.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};

// Beschrijving opslaan
const saveDescriptionBtn = document.getElementById('saveDescriptionBtn');
const descriptionInput = document.getElementById('descriptionInput');

saveDescriptionBtn.onclick = () => {
    alert('Beschrijving opgeslagen: ' + descriptionInput.value);
};

// Pop-up profielkaart
const profilePopup = document.getElementById("profilePopup");
const closeBtn = document.querySelector(".close-btn");

closeBtn.onclick = function() {
    profilePopup.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == profilePopup) {
        profilePopup.style.display = "none";
    }
}
