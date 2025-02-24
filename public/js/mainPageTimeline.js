function shadow() {
    let a = document.getElementById("slider").value;
    
  if (a == 0) {
    document.getElementById("c1").style.textShadow = "0 0 0px rgb(0, 0, 0)"
    document.getElementById("c1_h5").style.textShadow = "0 0 0px rgb(218, 165, 32)"
  
    document.getElementById("c2").style.textShadow = "0 0 14px rgb(0, 0, 0)"
    document.getElementById("c2_h5").style.textShadow = "0 0 14px rgb(218, 165, 32)"
  
    document.getElementById("c3").style.textShadow = "0 0 14px rgb(0, 0, 0)"
    document.getElementById("c3_h5").style.textShadow = "0 0 14px rgb(218, 165, 32)"
  
    document.getElementById("c4").style.textShadow = "0 0 14px rgb(0, 0, 0)"
    document.getElementById("c4_h5").style.textShadow = "0 0 14px rgb(218, 165, 32)"
  }
  else if (a == 1) {
    document.getElementById("c1").style.textShadow = "0 0 14px rgb(0, 0, 0)"
    document.getElementById("c1_h5").style.textShadow = "0 0 14px rgb(218, 165, 32)"
  
    document.getElementById("c2").style.textShadow = "0 0 0px rgb(0, 0, 0)"
    document.getElementById("c2_h5").style.textShadow = "0 0 0px rgb(218, 165, 32)"
  
    document.getElementById("c3").style.textShadow = "0 0 14px rgb(0, 0, 0)"
    document.getElementById("c3_h5").style.textShadow = "0 0 14px rgb(218, 165, 32)"
  
    document.getElementById("c4").style.textShadow = "0 0 14px rgb(0, 0, 0)"
    document.getElementById("c4_h5").style.textShadow = "0 0 14px rgb(218, 165, 32)"
  }
  else if (a == 2) {
    document.getElementById("c1").style.textShadow = "0 0 14px rgb(0, 0, 0)"
    document.getElementById("c1_h5").style.textShadow = "0 0 14px rgb(218, 165, 32)"
  
    document.getElementById("c2").style.textShadow = "0 0 14px rgb(0, 0, 0)"
    document.getElementById("c2_h5").style.textShadow = "0 0 14px rgb(218, 165, 32)"
  
    document.getElementById("c3").style.textShadow = "0 0 0px rgb(0, 0, 0)"
    document.getElementById("c3_h5").style.textShadow = "0 0 0px rgb(218, 165, 32)"
  
    document.getElementById("c4").style.textShadow = "0 0 14px rgb(0, 0, 0)"
    document.getElementById("c4_h5").style.textShadow = "0 0 14px rgb(218, 165, 32)"
  }
  else{
    document.getElementById("c1").style.textShadow = "0 0 14px rgb(0, 0, 0)"
    document.getElementById("c1_h5").style.textShadow = "0 0 14px rgb(218, 165, 32)"
  
    document.getElementById("c2").style.textShadow = "0 0 14px rgb(0, 0, 0)"
    document.getElementById("c2_h5").style.textShadow = "0 0 14px rgb(218, 165, 32)"
  
    document.getElementById("c3").style.textShadow = "0 0 14px rgb(0, 0, 0)"
    document.getElementById("c3_h5").style.textShadow = "0 0 14px rgb(218, 165, 32)"
  
    document.getElementById("c4").style.textShadow = "0 0 0px rgb(0, 0, 0)"
    document.getElementById("c4_h5").style.textShadow = "0 0 0px rgb(218, 165, 32)"
  }
}
/*
const slider = document.querySelector(".slider");

slider.addEventListener("input", () => {
    slider.classList.add("bouncing");

    setTimeout(() => {
        slider.classList.remove("bouncing");
    }, 3000); // 0.3 másodperc után eltűnik az animáció
});
*/

//menus
function setupProfileDropdown(toggleButtonId, menuSelector) {
   
}



function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    const isMenuHidden = menu.classList.contains('hidden');
    const menuIcons = document.querySelectorAll('.menu-closed, .menu-open');

    // Menü láthatóság váltása
    if (isMenuHidden) {
        menu.classList.remove('hidden');
        menu.classList.add('block');
    } else {
        menu.classList.remove('block');
        menu.classList.add('hidden');
    }

    // Ikon váltása
    menuIcons.forEach((icon) => {
        icon.classList.toggle('hidden');
        icon.classList.toggle('block');
    });
}
