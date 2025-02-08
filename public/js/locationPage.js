let kerulet = document.getElementById("keruletek");

let terkep = document.getElementById("terkep");

const district = [];

function arraydistrict() {
  for (let index = 1; index < 24; index++) {
    district.push(index);
  }
}

arraydistrict();
function valaszt() {

  switch (kerulet.value) {
    case '1':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3!2d19.07595960131078!3d47.50355714879181!2m3!1f11.298374184598794!2f75.39266016822391!3f0!3m2!1i1024!2i768!4f75!3m3!1m2!1s0x4741dc222bc9e119%3A0xcf07f45aae1774b!2sBudapest%2C%20Logodi%20u.%2034%2C%201012!5e0!3m2!1shu!2shu!4v1731178631045!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[1].disabled = true;
      break;
    case '2':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2693.868027459364!2d19.015190077915857!3d47.53143229316305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741d9499f2a1f57%3A0x1ca287a445276e9c!2zQnVkYXBlc3QsIFN6w6lwdsO2bGd5aSDDunQgMTA5LCAxMDM3!5e0!3m2!1shu!2shu!4v1731178646395!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[2].disabled = true;
      break;
    case '3':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2692.4217265810157!2d19.02927027791649!3d47.55958249122114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741d90b6b1863fd%3A0xbb397f32c37b67bf!2sBudapest%2C%20Bojt%C3%A1r%20u.%2043%2C%201037!5e0!3m2!1shu!2shu!4v1731178658762!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[3].disabled = true;
      break;
    case '4':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2691.3451567553398!2d19.08582507791694!3d47.58052818977563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741da1bb80726bf%3A0xc2ecffa1c8da7d0!2sBudapest%2C%20Megyeri%20%C3%BAt%2020%2C%201044!5e0!3m2!1shu!2shu!4v1731178776643!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[4].disabled = true;
      break;
    case '5':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2696.083679363187!2d19.057685877914967!3d47.488283196138205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dc5abc40edb5%3A0x7431133ea3dc1759!2zQnVkYXBlc3QsIFbDoW1ow6F6IGtydC4gMTUsIDEwOTM!5e0!3m2!1shu!2shu!4v1731178798699!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[5].disabled = true;
      break;
    case '6':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2695.2383924418436!2d19.06649027791529!3d47.504748395003276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dc6f9241a5bf%3A0x1fc0b69aa1caa8c3!2sBudapest%2C%20V%C3%B6r%C3%B6smarty%20u.%2018%2C%201074!5e0!3m2!1shu!2shu!4v1731178857377!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[6].disabled = true;
      break;
    case '7':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2695.2383924418436!2d19.06649027791529!3d47.504748395003276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dc6498a65495%3A0x6997f3f44635a74d!2sBudapest%2C%20Rottenbiller%20u.%2025%2C%201077!5e0!3m2!1shu!2shu!4v1731178879533!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[7].disabled = true;
      break;
    case '8':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2696.5341955394347!2d19.09866007791483!3d47.479505896743284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dcdcda2b5987%3A0x3b648592c59d74af!2zQnVkYXBlc3QsIEvDtm55dmVzIEvDoWxtw6FuIGtydC4gNTIsIDEwODc!5e0!3m2!1shu!2shu!4v1731178903177!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[8].disabled = true;
      break;
    case '9':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2696.571266518007!2d19.08581467791482!3d47.478783596793065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dce4224f5d2f%3A0x126b8174e6412987!2sBudapest%2C%20Haller%20u.%2089%2C%201096!5e0!3m2!1shu!2shu!4v1731178971488!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[9].disabled = true;
      break;
    case '10':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m17!1m11!1m3!1d3!2d19.14455215450534!3d47.47022756065691!2m2!1f23.518696669882612!2f90!3m2!1i1024!2i768!4f75!3m3!1m2!1s0x4741c3230ac41d77%3A0x41f8cb9f6299142!2zQnVkYXBlc3QsIEd5w7ZtcsWRaSDDunQgNTUsIDExMDM!5e0!3m2!1shu!2shu!4v1731179085128!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[10].disabled = true;
      break;
    case '11':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2698.140663276008!2d19.038483491489504!3d47.44819742458982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dd82ea2eb12b%3A0x840628462ecadd9e!2zQnVkYXBlc3QsIFN6ZXLDqW1pIMO6dCA2NywgMTExNw!5e0!3m2!1shu!2shu!4v1739031990329!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[11].disabled = true;
      break;
    case '12':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2695.904395612999!2d19.014040176717145!3d47.49177579589906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741de827812db8b%3A0x70dda1a3d8f7238a!2zQnVkYXBlc3QsIELDtnN6w7ZybcOpbnlpIMO6dCAzOCwgMTEyNg!5e0!3m2!1shu!2shu!4v1739032168657!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[12].disabled = true;
      break;
    case '13':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2693.5089970349286!2d19.066194976719302!3d47.5384214926827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dbc24470d329%3A0x9aa26c9c972e3e0c!2zQnVkYXBlc3QsIFbDoWNpIMO6dCAxNTIsIDExMzg!5e0!3m2!1shu!2shu!4v1739032248476!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[13].disabled = true;
      break;
    case '14':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2695.1272706520763!2d19.12378147671778!3d47.506912594855606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741db589b45fcf1%3A0xa6fe730d6367c598!2sBudapest%2C%20Fogarasi%20%C3%BAt%2045%2C%201148!5e0!3m2!1shu!2shu!4v1739032326753!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[14].disabled = true;
      break;
    case '15':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2691.5386663947506!2d19.121405576720917!3d47.576763790036935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741da64e1d274fb%3A0xd41decd23ed37160!2zQnVkYXBlc3QsIEvDoXJvbHlpIFPDoW5kb3Igw7p0IDc2LCAxMTUx!5e0!3m2!1shu!2shu!4v1739032372207!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[15].disabled = true;
      break;
    case '16':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2694.4773555712554!2d19.16098497671843!3d47.51956879398288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741c4b61136708d%3A0x46d7d481bf171f0f!2zQnVkYXBlc3QsIFLDoWtvc2kgw7p0IDg4LCAxMTYx!5e0!3m2!1shu!2shu!4v1739032575295!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[16].disabled = true;
      break;
    case '17':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2696.858511067426!2d19.269392176891316!3d47.473186571177926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741c14eb24d6ecb%3A0x674247c1d697c286!2sBudapest%2C%20Pesti%20%C3%BAt%20237%2C%201173!5e0!3m2!1shu!2shu!4v1739032642069!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[17].disabled = true;
      break;
    case '18':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2699.328699179315!2d19.227830476889118!3d47.42503367117381!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741c1eb78e74249%3A0x109203dfbf450674!2zQnVkYXBlc3QsIMOcbGzFkWkgw7p0IDc4MCwgMTE4NQ!5e0!3m2!1shu!2shu!4v1739032682613!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[18].disabled = true;
      break;
    case '19':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2697.981273736359!2d19.14237357689031!3d47.45130447117614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741c2ef4900dcb3%3A0xff9803b485b66a4b!2sBudapest%2C%20Ady%20Endre%20%C3%BAt%20134%2C%201195!5e0!3m2!1shu!2shu!4v1739032722509!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[19].disabled = true;
      break;
    case '20':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2698.61076828218!2d19.135684376889646!3d47.439032571174856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741c293cea6bc9f%3A0x926821895a2f9cb4!2zQnVkYXBlc3QsIE5hZ3lrxZFyw7ZzaSDDunQgMTEwLCAxMTk0!5e0!3m2!1shu!2shu!4v1739032825905!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[20].disabled = true;
      break;
    case '21':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21585.14656514098!2d19.075596425249298!3d47.44814562212636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dd453ac1bfbf%3A0x9f5d1d43a64d7282!2zQnVkYXBlc3QsIFN6w6FsbMOtdMOzIHUuIDYsIDEyMTE!5e0!3m2!1shu!2shu!4v1739032874144!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[21].disabled = true;
      break;
    case '22':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2700.253398539331!2d19.009078776888146!3d47.40699837117215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741e70174ce52f9%3A0x69fc83b77859d25e!2zQnVkYXBlc3QsIE5hZ3l0w6l0w6lueWkgw7p0IDE5MCwgMTIyMw!5e0!3m2!1shu!2shu!4v1739032918266!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[22].disabled = true;
      break;
    case '23':
      terkep.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2701.558800651316!2d19.108833494916833!3d47.3815289711701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741e8fa4858e2bb%3A0xfcf415de488018b2!2sBudapest%2C%20Haraszti%20%C3%BAt%2042%2C%201239!5e0!3m2!1shu!2shu!4v1739032955992!5m2!1shu!2shu";
      district.forEach(element => {
        element.options.disabled = false;
        console.log(element);
      });
      kerulet.options[23].disabled = true;
      break;
  }
}


