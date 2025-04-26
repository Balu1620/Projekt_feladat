@extends('layouts.header')

@section('content')
    <div class=" mx-4 mt-2">
        <div class="justify-content-center ">
            <div id="MainTitle">
                <h1><strong>Motorkölcsönzés csak nálunk!</strong></h1>
            </div>
            <br>
            
            <div id="uppictures">
                <img src="{{ asset('storage/img/HomePage.jpg') }}" alt="Nature" id="onePhoto">
            </div>
            <div class="discount-banner">
                <p>3 nap bérlésnél -20% kedvezmény!</p>
                <p>7 nap bérlésnél -30% kedvezmény!</p>
            </div>
            <hr>
            <section id="custom-flip-cards">
                <div id="cards-container">
                    <div class="custom-flip-card">
                        <div class="custom-flip-card-inner">
                            <div class="custom-flip-card-front">
                                <h2><i class="bi bi-globe2"></i></h2>
                                <h3>Globális elérhetőség</h3>
                            </div>
                            <div class="custom-flip-card-back">
                                <p>Több mint 20 állomás Budapest szerte</p>
                            </div>
                        </div>
                    </div>
                    <div class="custom-flip-card">
                        <div class="custom-flip-card-inner">
                            <div class="custom-flip-card-front">
                                <h2>&#x1F3CD;</h2>
                                <h3>Különleges flotta</h3>
                            </div>
                            <div class="custom-flip-card-back">
                                <p>Nagy teljesítményű sportmotoroktól a kényelmes túrázókig.</p>
                            </div>
                        </div>
                    </div>
                    <div class="custom-flip-card">
                        <div class="custom-flip-card-inner">
                            <div class="custom-flip-card-front">
                                <h2><i class="bi bi-person-hearts"></i></h2>
                                <h3>Kivételes szolgáltatás</h3>
                            </div>
                            <div class="custom-flip-card-back">
                                <p>Stresszmentes, megbízható, nincsenek rejtett költségek</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="pt-4 bg-white">
                <div id="pw">
                    <div class="d-flex justify-content-around align-items-center mb-3">
                        <div class="" id="mkep">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/img/Motorshow1.jpg') }}" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('storage/img/Motorshow2.jpg') }}" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('storage/img/Motorshow3.jpg') }}" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div id="msz">
                            <h2>Miért minket válasszon?</h2>
                            <ul>
                                <li>
                                    <p> Ragyogó állapotú motorok: Minden motorkerékpárunk kiváló műszaki állapotban van, és
                                        alapos
                                        karbantartáson esik át a bérbeadás előtt.</p>
                                </li>
                                <li>
                                    <p>Extra felszerelések: Telefontartó, töltő és túradobozok biztosítják a kényelmes és
                                        praktikus
                                        utazást.
                                    </p>
                                </li>
                                <li>
                                    <p>Biztosítás: Minden motorkerékpárunkra kötött biztosítás, így Ön nyugodtan élvezheti a
                                        túrázást.</p>
                                </li>
                                <li>
                                    <p>Ingyenes parkolás: Biztonságos, ingyenes parkolási lehetőséget biztosítunk éjjeli
                                        őrrel és
                                        kamerával.
                                    </p>
                                </li>
                                <li>
                                    <p>Szakértő csapat: Tapasztalt csapatunk örömmel segít a választásban és a tervezésben.
                                    </p>
                                </li>
                                <li>
                                    <p>Rugalmas bérlési feltételek: Különböző bérleti konstrukciók közül választhat, az Ön
                                        igényeinek
                                        megfelelően.</p>
                                </li>
                                <li>
                                    <p>Kilométer korlátozás nélkül: Nálunk nem kell számolgatni, izgulni hogy mennyi km fér
                                        aznap
                                        még bele.
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!--         /Kép&Szöveg       -->
            <!--         TimeLine       -->
            <section id="timeline_alap">
                <h1 style="text-align: center; font-size: 200%; padding-top: 10px; ">A motorbérlés menete</h1>
                <div class="slidecontainer ">
                    <input class="slider" id="slider" list="markers" type="range" min="0" max="3" step="1" value="0"
                        onchange="shadow()">
                </div>
                <div class="timeline">
                    <div class="container left">
                        <div class="content" id="c1">
                            <h5 class="timeright" id="c1_h5">Első Lépés</h5>
                            <hr class="line" id="line1">
                            <h2>Regisztráció vagy bejelentkezés</h2><br>
                            <p>A bérlés előtt először regisztrálnod kell a weboldalon,
                                ha még nem rendelkezel fiókkal. A regisztráció során add
                                meg a szükséges adatokat, mint pl:. neved, e-mail címed,
                                valamint a jogosítványod azonosítóját és kategóriáját.
                                Ha már van fiókod, egyszerűen bejelentkezhetsz.
                            </p>
                        </div>
                    </div>
                    <div class="container right">
                        <div class="content" id="c2">
                            <h5 id="c2_h5">Második Lépés</h5>
                            <hr class="line" id="line2">
                            <h2>Motor kiválasztása és bérlési időpont</h2><br>
                            <p>A bérlés folyamata rugalmas, így először kiválaszthatod a
                                motor márkáját, majd a kívánt bérlési időpontot.
                                Az időpontot később is módosíthatod, ha a motor
                                kiválasztása után szeretnél időpontot állítani. Fontos,
                                hogy figyelj a motor <b>teljesítményére, kényelmére</b> és a saját
                                <b>vezetési tapasztalatodra</b>.
                            </p>
                        </div>
                    </div>
                    <div class="container left">
                        <div class="content " id="c3">
                            <h5 id="c3_h5">Harmadik Lépés</h5>
                            <hr class="line" id="line3">
                            <h2>Ruházat kölcsönzése</h2><br>
                            <p>A biztonság érdekében motoros ruházatot is kölcsönözhetsz.
                                Válaszd ki a megfelelő méretet a szükséges védőfelszerelésekhez,
                                például bukósisakhoz, motoros ruhához és csizmához. Bár nem
                                kötelező, de erősen ajánlott, ha nincs saját motoros ruházatod.
                            </p>
                        </div>
                    </div>
                    <div class="container right">
                        <div class="content " id="c4">
                            <h5 id="c4_h5">Utolsó Lépés</h5>
                            <hr class="line" id="line4">
                            <h2>Számla ellenőrzése és fizetés</h2><br>
                            <p>A bérlés véglegesítése előtt ellenőrizd a kiválasztott motor és
                                időpont részleteit. A fizetés <b>online történik</b>, bankkártyás vagy
                                átutalásos lehetőséggel. A sikeres tranzakció után visszaigazolást
                                kapsz, amely tartalmazza az átvételi helyszínt és időpontot. Ezzel
                                már fel is veheted a motort, és élvezheted a motorozást! 🏍️
                            </p>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </div>
@endsection

@extends('layouts.footer')