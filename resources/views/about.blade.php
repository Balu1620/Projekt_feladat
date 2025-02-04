@extends('layouts.header')

@section('content')
<!-- Main Content Div után-->

<div class="responsive-container-block bigContainer">
        <div class="responsive-container-block Container">
          <div class="imgContainer">
            <img class="blueDots" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/aw3.svg">
            <img class="mainImg" src="{{ asset('storage/img/motor_about.webp') }}" alt="Mesi fater motor">
          </div>
          <div class="responsive-container-block textSide">
            <p class="text-blk heading">
              A Motorkirálya
            </p>
            <p class="text-blk subHeading">
            Szenvedélyünk a motorozás és a szabad mozgás! A Motorkirálya egy innovatív motorkölcsönző szolgáltatás, amelyet azoknak hoztunk létre, akik szeretik a kétkerekűek nyújtotta élményt, de nem akarnak saját motort fenntartani. Nálunk a bérlés épp olyan egyszerű, mint egy Lime vagy Bubi esetében – nincs szükség fix leadási pontra, bármelyik telephelyünkön visszaadhatod a járművet!
<br><br>
🌍 Miért válassz minket?</p>
            <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
              <div class="cardImgContainer">
                <div class="cardImg"><i class=" bi bi-speedometer2"></i></div>
              </div>
              <div class="cardText">
                <p class="text-blk cardHeading">
                  Teljesítmény
                </p>
                <p class="text-blk cardSubHeading">
                Csak kiváló minőségű, rendszeresen karbantartott motorokat kínálunk, hogy a lehető legjobb élményt biztosítsuk számodra. Akár városi közlekedéshez, akár hosszabb túrákhoz keresel járművet, nálunk garantált a megbízható teljesítmény.
                </p>
              </div>
            </div>
            <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
              <div class="cardImgContainer">
              <div class="cardImg"><i class="bi bi-wrench-adjustable-circle"></i></div>
              </div>
              <div class="cardText">
                <p class="text-blk cardHeading">
                  Megbízhatóság
                </p>
                <p class="text-blk cardSubHeading">
                Fontos számunkra, hogy motorjaink mindig biztonságosak és kifogástalan állapotúak legyenek. Rendszeres karbantartással és szervizzel gondoskodunk arról, hogy gondtalanul élvezhesd az utazást
                </p>
              </div>
            </div>
            <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
              <div class="cardImgContainer">
              <div class="cardImg"><i class="bi bi-gear-wide-connected"></i></div>
              </div>
              <div class="cardText">
                <p class="text-blk cardHeading">
                  Fejlesztés
                </p>
                <p class="text-blk cardSubHeading">
                Folyamatosan bővítjük és modernizáljuk flottánkat, hogy mindig a legújabb technológiát és kényelmet biztosítsuk ügyfeleinknek. Elektromos és hagyományos motorok széles választékával várunk!
                </p>
              </div>
            </div>
            <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
              <div class="cardImgContainer">
              <div class="cardImg"><i class="bi bi-headset"></i></div>
              </div>
              <div class="cardText">
                <p class="text-blk cardHeading">
                  Segítőkészség
                </p>
                <p class="text-blk cardSubHeading">
                  Ügyfélszolgálatunk bármikor rendelkezésedre áll, ha kérdésed vagy problémád merülne fel. Legyen szó foglalásról, műszaki segítségről vagy útvonaljavaslatokról, ránk mindig számíthatsz!⚡ <br><br>
                  Nincs többé gond a parkolással, a tankolással vagy a hosszú távú kötelezettségekkel! Válaszd ki a számodra megfelelő motort, pattanj fel, és élvezd a gondtalan közlekedést. A Motorkirályával mindig szabadon mozoghatsz! 🏍️
                </p>
              </div>
            </div>
          </div>
          <img class="redDots" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/cw3.svg">
        </div>
      </div>

<!-- END Main Content Div lezárás előtt-->
@endsection

@extends('layouts.footer')