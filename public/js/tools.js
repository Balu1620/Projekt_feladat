function updateSisakMeret() {
    var sisakdb = document.getElementById("sisakdb").value;
    var sisakInputs = document.querySelectorAll("select[name^='sisakmeret']");
    sisakInputs.forEach((input, index) => {
        if (index < sisakdb) {
            input.disabled = false;
            input.classList.remove("disabled");
        } else {
            input.disabled = true;
            input.classList.add("disabled");
        }
    });
}

function updateRuhaMeret() {
    var ruhadb = document.getElementById("ruhadb").value;
    var ruhaInputs = document.querySelectorAll("select[name^='ruhameret']");
    ruhaInputs.forEach((input, index) => {
        if (index < ruhadb) {
            input.disabled = false;
            input.classList.remove("disabled");
        } else {
            input.disabled = true;
            input.classList.add("disabled");
        }
    });
}

function updateCipoMeret() {
    var cipodb = document.getElementById("cipodb").value;
    var cipoInputs = document.querySelectorAll("select[name^='cipomeret']");
    cipoInputs.forEach((input, index) => {
        if (index < cipodb) {
            input.disabled = false;
            input.classList.remove("disabled");
        } else {
            input.disabled = true;
            input.classList.add("disabled");
        }
    });
}