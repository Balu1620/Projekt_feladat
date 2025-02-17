function sisakmeret() {
    let sdb = parseInt(document.getElementById("sisakdb").value) || 0;

    let list = document.getElementById("Ssize");


    list.innerHTML = ""; // Régi elemek törlése

    for (let index = 0; index < sdb; index++) {
        const select = document.createElement("select");

        ["M", "L", "XL", "2XL", "3XL"].forEach(size => {
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

    for (let index = 0; index < sdb; index++) {
        const select = document.createElement("select");

        ["M", "L", "XL", "2XL", "3XL"].forEach(size => {
            let option = document.createElement("option");
            option.value = size;
            option.textContent = size;
            select.appendChild(option);
        });

        list.appendChild(select);
    }
}