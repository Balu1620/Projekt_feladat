document.addEventListener('DOMContentLoaded', function () {
    const acceptTermsCheckbox = document.getElementById('accept-terms');
    const confirmOrderButton = document.getElementById('confirm-order');
    const termsErrorMessage = document.getElementById('terms-error');

    // Kezdeti állapot: hibaüzenet látható, rendelés gomb letiltva
    termsErrorMessage.style.display = 'block';
    confirmOrderButton.disabled = true;

    // Checkbox állapotának változása
    acceptTermsCheckbox.addEventListener('change', function () {
        if (acceptTermsCheckbox.checked) {
            confirmOrderButton.disabled = false;  // Engedélyezi a rendelés gombot
            termsErrorMessage.style.display = 'none';  // Elrejti a hibaüzenetet
        } else {
            confirmOrderButton.disabled = true;  // Letiltja a rendelés gombot
            termsErrorMessage.style.display = 'block';  // Hibaüzenet megjelenítése
        }
    });

    // Rendelés megerősítése gomb kattintása
    confirmOrderButton.addEventListener('click', function (event) {
        if (!acceptTermsCheckbox.checked) {
            event.preventDefault();  // Megakadályozza a rendelés leadását
            termsErrorMessage.style.display = 'block';  // Hibaüzenet megjelenítése, ha nincs bepipálva
        }
    });
});
