@extends('layouts.header')

@section('content')
<div class=" mx-4 mt-2">
    <div class="justify-content-center ">
        <div id="uppictures">
            <img src="img_nature.jpg" alt="Nature" class="img-fluid">
        </div>
        <hr>
        <section>
            <div class="row justify-content-center ">
                <div class="col p-0 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <h2><i class="bi bi-globe2"></i></h2>
                                <h2>blah blah elérhetőség</h2>
                                <p>&#10555;</p>
                            </div>
                            <div class="flip-card-back">
                                <p>Több mint 2.000 SIXT állomás több mint 105 országban</p>
                                <p>&#10554;</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col p-0 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <h2>&#x1F3CD;</h2>
                                <h2>Különleges flotta</h2>
                                <p>&#10555;</p>
                            </div>
                            <div class="flip-card-back">
                                <p>Magas minőségű kabrióktól a prémium SUV-okig</p>
                                <p>&#10554;</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col p-0 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <h2><i class="bi bi-person-hearts"></i></h2>
                                <h2>Kivételes szolgáltatás</h2>
                                <p>&#10555;</p>
                            </div>
                            <div class="flip-card-back">
                                <p>Stresszmentes, megbízható, nincsenek rejtett költségek</p>
                                <p>&#10554;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section>
            <div id="miert">
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
                                    <img src="../kepek/placeholder.png" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="../kepek/placeholder.png" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="../kepek/placeholder.png" alt="...">
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
        <hr>
        <!--         TimeLine       -->
        <section id="timeline_alap">
            <h3 style="text-align: center;">A motorbérlés menete</h3>
            <div class="slidecontainer">
                <input class="slider" id="slider" list="markers" type="range" min="0" max="3" step="1" value="0"
                    onchange="shadow()">
            </div>
            <div class="timeline">
                <div class="container left">
                    <div class="content" id="c1">
                        <h5 class="timeright" id="c1_h5">Első Lépés</h5>
                        <hr class="line" id="line1">
                        <h2>Foglás</h2>
                        <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum,
                            vim ea
                            mazim
                            fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo
                            iusto primis
                            ea eam.
                        </p>
                    </div>
                </div>
                <div class="container right">
                    <div class="content" id="c2">
                        <h5 id="c2_h5">Második Lépés</h5>
                        <hr class="line" id="line2">
                        <h2>2016</h2>
                        <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum,
                            vim ea
                            mazim
                            fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo
                            iusto primis
                            ea eam.
                        </p>
                    </div>
                </div>
                <div class="container left">
                    <div class="content " id="c3">
                        <h5 id="c3_h5">Harmadik Lépés</h5>
                        <hr class="line" id="line3">
                        <h2>2015</h2>
                        <p>Lorem ipsum dolor sit amet, quo ei55555555654656 656 456 6456 456 262626255555555555555555
                            simul
                            congue
                            exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret
                            expetendis his,
                            te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
                    </div>
                </div>
                <div class="container right">
                    <div class="content " id="c4">
                        <h5 id="c4_h5">Utolsó Lépés</h5>
                        <hr class="line" id="line4">
                        <h2>2012</h2>
                        <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum,
                            vim ea
                            mazim
                            fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo
                            iusto primis
                            ea eam.
                        </p>
                    </div>
                </div>
            </div>

        </section>

    </div>
</div>
@endsection

@extends('layouts.footer')