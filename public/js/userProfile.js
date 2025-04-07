function previewImage(event, previewId) {
    const reader = new FileReader();
    reader.onload = function () {
        const output = document.getElementById(previewId);
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

document.addEventListener("DOMContentLoaded", function() {
    // Kép előnézeti funkció
    function previewImage(event, previewId) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById(previewId);
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    // Törlés gomb megjelenítésének kezelése a bérlés dátuma alapján
    const deleteForms = document.querySelectorAll('.delete-order-form');

    deleteForms.forEach(form => {
        const rentalDate = form.getAttribute('data-rental-date');
        const deleteButton = form.querySelector('.delete-btn');

        const rentalDateObj = new Date(rentalDate);
        const currentDate = new Date();
        
        // Különbség számítása napokban
        const timeDifference = (rentalDateObj - currentDate) / (1000 * 60 * 60 * 24);
        console.log('Dátum különbség (napokban):', timeDifference);

        // Ha több mint 1 nap van hátra, mutassuk a törlés gombot
        if (timeDifference > 1) {
            deleteButton.style.display = 'inline-block';
        } else {
            deleteButton.style.display = 'none';
        }
    });

    // Módosítjuk a modális ablak formját a törlés gomb megnyomásakor
    const deleteButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const orderId = button.getAttribute('data-order-id');
            const deleteForm = document.getElementById('deleteOrderForm');
            deleteForm.action = `/delete-order/${orderId}`; // Törlés URL-jének beállítása
        });
    });
});

