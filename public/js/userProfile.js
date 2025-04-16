function previewImage(event, previewId) {
    const reader = new FileReader();
    reader.onload = function () {
        const output = document.getElementById(previewId);
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

document.addEventListener("DOMContentLoaded", function () {
    // Kép előnézeti funkció
    function previewImage(event, previewId) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById(previewId);
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    const deleteForms = document.querySelectorAll('.delete-order-form');
    const deleteToolForms = document.querySelectorAll('.delete-tool-form');
    const addToolForms = document.querySelectorAll('.add-tool-form');

    

    // 1. Átvisszük a data-rental-date-et a deleteToolForms-ra ÉS az addToolForms-ra
    deleteForms.forEach((orderForm, index) => {
        const rentalDate = orderForm.getAttribute('data-rental-date');
        if (deleteToolForms[index] && rentalDate) {
            deleteToolForms[index].setAttribute('data-rental-date', rentalDate);
        }
            if (addToolForms[index] && rentalDate) {
            addToolForms[index].setAttribute('data-rental-date', rentalDate);
        }
    });


    //2. Törlés gombok megjelenítése a rendelés formoknál
    deleteForms.forEach(form => {
        const deleteButton = form.querySelector('.delete-btn');
        const rentalDate = form.getAttribute('data-rental-date');
        if (!deleteButton || !rentalDate) return;

        const rentalDateObj = new Date(rentalDate);
        const currentDate = new Date();

        const timeDifference = (rentalDateObj - currentDate) / (1000 * 60 * 60 * 24);

        deleteButton.style.display = (timeDifference > 1) ? 'inline-block' : 'none';
    });

    //3. Törlés gombok megjelenítése az eszköz formoknál
    deleteToolForms.forEach(form => {
        const deleteButton = form.querySelector('.delete-tool-btn');
        const rentalDate = form.getAttribute('data-rental-date');
        if (!deleteButton || !rentalDate) return;

        const rentalDateObj = new Date(rentalDate);
        const currentDate = new Date();

        //Különbség számítása napokban
        const timeDifference = (rentalDateObj - currentDate) / (1000 * 60 * 60 * 24);

        //Ha több mint 1 nap van hátra, mutassuk a törlés gombot
        deleteButton.style.display = (timeDifference > 1) ? 'inline-block' : 'none';
    });

    //4. Eszköz hozzáadása gomb megjelenítése
    addToolForms.forEach(form => {
        const addButton = form.querySelector('.add-tool-btn');
        const rentalDate = form.getAttribute('data-rental-date');
        if (!addButton || !rentalDate) return;

        const rentalDateObj = new Date(rentalDate);
        const currentDate = new Date();

        //Különbség számítása napokban
        const timeDifference = (rentalDateObj - currentDate) / (1000 * 60 * 60 * 24);

        //Ha több mint 1 nap van hátra, mutassuk a hozzáadás gombot
        addButton.style.display = (timeDifference > 1) ? 'inline-block' : 'none';
    });

    // A modális gomb megnyomásakor nem kell JS-ben átállítani az action-t,
    // mert minden modal formnak már külön actionje van Blade-ben.
    // Ezt a részt tehát elhagyhatod.

    // Ha viszont később közös modalra váltanál, ez az alap logika:
    /*
    const deleteButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const orderId = button.getAttribute('data-order-id');
            const deleteForm = document.getElementById(`deleteOrderForm${orderId}`);
            if (deleteForm) {
                deleteForm.action = `/delete-order/${orderId}`;
            }
        });
    });
    */
});

document.addEventListener("DOMContentLoaded", function () {
    const toolSelect = document.getElementById("toolSelect");
    const toolsList = document.getElementById("toolsList");
    const errorMessage = document.getElementById("errorMessage");
    const addToolForm = document.getElementById("addToolForm");

    // Jelenlegi eszközök (képzelt adatbázis)
    let currentTools = [
        { name: "Cipő", size: "42", id: 1 },
        { name: "Sisak", size: "M", id: 2 },
        { name: "Cipő", size: "43", id: 3 },
    ];

    // Frissíti az eszközök listáját
    function updateToolsList() {
        toolsList.innerHTML = "";
        currentTools.forEach(tool => {
            const listItem = document.createElement("li");
            listItem.textContent = `${tool.name} (${tool.size})`;
            toolsList.appendChild(listItem);
        });
    }

    // Frissíti az eszközök listáját kezdetben
    updateToolsList();

    // Eszközkiválasztás ellenőrzése a form beküldése előtt
    addToolForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const selectedTool = toolSelect.value; // Kiválasztott eszköz neve
        const toolLimit = 2; // Limitált darabszám
        let toolCount = 0;

        // Megszámoljuk, hány darab eszköz van az adott típusból
        currentTools.forEach(tool => {
            if (tool.name === selectedTool) {
                toolCount++;
            }
        });

        // Ha több mint 2 eszköze van, nem engedjük hozzáadni
        if (toolCount >= toolLimit) {
            errorMessage.style.display = "block";
        } else {
            errorMessage.style.display = "none";

            // Új eszköz hozzáadása
            const newTool = { name: selectedTool, size: "M", id: currentTools.length + 1 };
            currentTools.push(newTool);

            // Eszköz hozzáadása a listához
            updateToolsList();

            // Itt történhet a form tényleges elküldése a szerver felé, például AJAX hívással
            console.log("Eszköz hozzáadva:", newTool);
        }
    });
});

    


