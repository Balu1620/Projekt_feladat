function sisakmeret() {
    let sdb = parseInt(document.getElementById("sisakdb").value) || 0;
    let list = document.getElementById("Ssize");
    list.innerHTML = "";
    if (sdb === 0) {
        list.style.display = "none";
    } else {
        list.style.display = "flex";
    }
    for (let index = 0; index < sdb; index++) {
        const select = document.createElement("select");
        select.name = `sisakmeret[${index}]`;

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
    list.innerHTML = "";
    if (sdb === 0) {
        list.style.display = "none";
    } else {
        list.style.display = "flex";
    }
    for (let index = 0; index < sdb; index++) {
        const select = document.createElement("select");
        select.name = `ruhameret[${index}]`;

        ["S", "M", "L", "XL", "2XL"].forEach(size => {
            let option = document.createElement("option");
            option.value = size;
            option.textContent = size;
            select.appendChild(option);
        });

        list.appendChild(select);
    }
}


function cipomeret() {
    let sdb = parseInt(document.getElementById("cipodb").value) || 0;
    let list = document.getElementById("Csize");
    list.innerHTML = "";
    if (sdb === 0) {
        list.style.display = "none";
    } else {
        list.style.display = "flex";
    }
    for (let index = 0; index < sdb; index++) {
        const select = document.createElement("select");
        select.name = `cipomeret[${index}]`;

        ["39", "40", "41", "42", "43", "44", "45", "46"].forEach(size => {
            let option = document.createElement("option");
            option.value = size;
            option.textContent = size;
            select.appendChild(option);
        });

        list.appendChild(select);
    }
}
