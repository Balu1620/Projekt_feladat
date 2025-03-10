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

document.querySelectorAll('.dropdown-toggle').forEach(item => {
  item.addEventListener('click', event => {
 
    if(event.target.classList.contains('dropdown-toggle') ){
      event.target.classList.toggle('toggle-change');
    }
    else if(event.target.parentElement.classList.contains('dropdown-toggle')){
      event.target.parentElement.classList.toggle('toggle-change');
    }
  })
});


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



  const slider = document.getElementById("slider");
  let isAnimating = false; // Animációs állapot figyelése

  slider.addEventListener("mouseenter", function () {
    if (isAnimating) return; // Ha már fut az animáció, ne induljon újra
    isAnimating = true;

    slider.classList.add("animate");

    setTimeout(() => {
      slider.classList.remove("animate");
      isAnimating = false; // Engedélyezzük az új animációt
    }, 500); // 0.5 másodperces animáció
  });
  
/*
  const slider = document.getElementById("slider");

  slider.addEventListener("mouseenter", function () {
    if (!slider.classList.contains("animate")) {
      slider.classList.add("animate");

      setTimeout(() => {
        slider.classList.remove("animate"); // Visszaállítás
      }, 500); // 0.5 másodperces animáció után
    }
  }, { once: true }); // Egyszeri végrehajtás
*/
