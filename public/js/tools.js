function sisakmeret() {
    let sdb = parseInt(document.getElementById("sisakdb").value) || 0;
    console.log(sdb);

    let list = document.getElementById("Ssize"); // Győződj meg róla, hogy az ID létezik!
    
    if (!list) {
        console.error("Hiba: 'Ssize' ID-jű elem nem található!");
        return;
    }

    list.innerHTML = ""; // Régi elemek törlése

    for (let index = 0; index < sdb; index++) {
        const select = document.createElement("select");

        ["M", "L", "XL"].forEach(size => {
            let option = document.createElement("option");
            option.value = size;
            option.textContent = size;
            select.appendChild(option);
        });

        list.appendChild(select);
        list.appendChild(document.createElement("br")); // Sortörés
    }
}
