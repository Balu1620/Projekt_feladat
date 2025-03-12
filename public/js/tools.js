function sisakmeret() {
    let sdb = parseInt(document.getElementById("sisakdb").value) || 0;
    let list = document.getElementById("Ssize");
    list.innerHTML = ""; // Régi elemek törlése
    if (sdb === 0) {
        list.style.display = "none";
    }
    else {
        list.style.display = "flex";
    }
    for (let index = 0; index < sdb; index++) {

        const select = document.createElement("select");
        ["S", "M", "L", "XL", "2XL"].forEach(size => {
            let option = document.createElement("option");

            option.value = size;
            option.textContent = size;
            select.appendChild(option);
        });

        list.appendChild(select);
    }
}

function ruhameret() {
    let sdb = parseInt(document.getElementById("ruhadb").value) || 0;

    let list = document.getElementById("Rsize");

    list.innerHTML = ""; // Régi elemek törlése

    if (sdb === 0) {
        list.style.display = "none";
    }
    else {
        list.style.display = "flex";
    }

    for (let index = 0; index < sdb; index++) {
        const select = document.createElement("select");

        ["S", "M", "L", "XL", "2XL"].forEach(size => {
            let option = document.createElement("option");
            option.value = size;
            option.textContent = size;
            select.appendChild(option);
        });

        list.appendChild(select);
    }
}