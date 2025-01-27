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