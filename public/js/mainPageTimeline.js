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

const slider = document.querySelector(".slider");

slider.addEventListener("input", () => {
    slider.classList.add("bouncing");

    setTimeout(() => {
        slider.classList.remove("bouncing");
    }, 3000); // 0.3 másodperc után eltűnik az animáció
});


// Burger menus
document.addEventListener('DOMContentLoaded', function() {
    // open
    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll('.navbar-close');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }
});
