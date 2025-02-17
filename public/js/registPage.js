const passwordField = document.getElementById("password");
const strengthBar = document.getElementById("strength-bar");
const strengthText = document.getElementById("strength-text");


if (!passwordField || !strengthBar || !strengthText) {
    console.log("Nem található az egyik szükséges elem. Ellenőrizd az ID-ket.");

}

// Jelszó erősség ellenőrzés 
passwordField.addEventListener("input", () => {
    const passwordValue = passwordField.value;

    let strength = 0;

    // Kritériumok ellenőrzése
    if (passwordValue.length >= 6) strength++;
    if (/[A-Z]/.test(passwordValue)) strength++;
    if (/[a-z]/.test(passwordValue)) strength++;
    if (/[0-9]/.test(passwordValue)) strength++;
    if (/[^A-Za-z0-9]/.test(passwordValue)) strength++;

    updateStrengthBar(strength);
});

// Frissíti a jelszó erősség sávot
function updateStrengthBar(strength) {
    switch (strength) {
        case 0:
        case 1:
            strengthBar.className = "bar weak"; // CSS osztály 'weak'
            strengthText.textContent = "Gyenge a jelszó";
            break;
        case 2:
        case 3:
            strengthBar.className = "bar medium"; // CSS osztály 'medium'
            strengthText.textContent = "Közepes a jelszó";
            break;
        case 4:
        case 5:
            strengthBar.className = "bar strong"; // CSS osztály 'strong'
            strengthText.textContent = "Erős a jelszó";
            break;
        default:
            strengthBar.className = "bar"; // Alapértelmezett stílus
            strengthText.textContent = "";
    }
}


const emailInput = document.getElementById("email");
const atError = document.getElementById("atError");
const domainError = document.getElementById("domainError");

function validateEmail() {
    const emailValue = emailInput.value;

    if (!emailValue.includes('@')) {
        atError.style.display = 'block';
    } else {
        atError.style.display = 'none';
    }

    if (!emailValue.endsWith('.com') && !emailValue.endsWith('.hu')) {
        domainError.style.display = 'block';
    } else {
        domainError.style.display = 'none';
    }
}