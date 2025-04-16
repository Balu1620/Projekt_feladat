@extends('layouts.header')

@section('content')

    

        <div class="ms-10 mt-5">
            <a href="/motors" class="btn btn-dark vissza"><i class="bi bi-arrow-left"></i> Vissza a
               motorokhoz</a>
        </div>

        <div id="order-steps" class="w-full h-auto flex flex-col md:flex-row items-center justify-center py-10">
            <div class="flex flex-col items-center mx-3">
                <div class="step-circle">
                    ✓
                </div>
                <span class="mt-2 step-title">1. lépés</span>
                <p class="step-description">Motor kiválasztása</p>
            </div>

            <!-- Vonal -->
            <div class="hidden md:block w-20 step-line mx-3"></div>

            <div class="flex flex-col items-center mx-3">
                <div class="step-circle-no">
                    ?
                </div>
                <span class="mt-2 step-title">2. lépés</span>
                <p class="step-description">Motor adatok</p>
            </div>

            <div class="hidden md:block w-20 step-line mx-3"></div>

            <div class="flex flex-col items-center mx-3">
                <div class="step-circle-no">
                    ?
                </div>
                <span class="mt-2 step-title">3. lépés</span>
                <p class="step-description">Eszközök és időpont</p>
            </div>

            <!-- Vonal -->
            <div class="hidden md:block w-20 step-line mx-3"></div>

            <div class="flex flex-col items-center mx-3">
                <div class="step-circle-no">
                    ?
                </div>
                <span class="mt-2 step-title">3. lépés</span>
                <p class="step-description">Összesítés</p>
            </div>
        </div>
        <br>

        <div class="motor-card">
            <!-- Motor neve és típusa -->
            <h2 class="motor-title">{{ $motor->brand }} - {{ $motor->type }}</h2>

            <div class="row">
                <!-- Motor kép -->
                <div class="col-md-8 motor-image-container">
                    <img src="{{ asset('storage/img/' . str_replace(' ', '', $motor->type) . '.jpg') }}" alt="Motor image" />
                    <p class="reservation-info">
                        <small>*Foglalás értelmezése: a bérlés időtartama 24 órára vonatkozik. Tehát ha egy adott napon 9
                            órakor átveszed a motort, a bérlés a következő nap 9 óráig érvényes.</small>
                    </p>
                </div>

                <!-- Motor részletek és árlista -->
                <div class="col-md-4 motor-details-container">
                    <!-- Motor részletek -->
                    <div class="details-section">
                        <h4>Motor Részletek</h4>
                        <ul>
                            <li><i class="fa fa-motorcycle "></i> V2-es {{ $motor->brand }} motor</li>
                            <li><i class="fa fa-plug "></i> {{ $motor->powerLe }} LE és {{ $motor->powerkW }} kW</li>
                            <li><i class="fa fa-calendar-alt "></i> Évjárat: {{ $motor->year }}</li>
                            <li><i class="fa fa-cogs "></i> {{ $motor->gearbox }} sebességes váltó</li>
                            <li><i class="fa fa-users "></i> {{ $motor->places }} személyes</li>
                            <li><i class="fa fa-map-marker-alt "></i> Lokáció: {{ $motor->location }}</li>
                        </ul>
                    </div>

                    <!-- Árlista -->
                    <div class="pricing-section">
                        <h4>Árlista</h4>
                        <p class="discount-info">Minél tovább bérelsz, annál többet spórolsz!</p>
                        <ul>
                            <li><b>1 nap </b> <span>: {{ number_format($motor->price, 0, '.', ' ') }} Ft</span></li>
                            <li><b>3 nap </b> <span>: {{ number_format(floor($motor->price * 0.8), 0, '.', ' ') }} Ft</span>
                                (-20%)</li>
                            <li><b>7 nap </b> <span>: {{ number_format(floor($motor->price * 0.7), 0, '.', ' ') }} Ft</span>
                                (-30%)</li>
                        </ul>
                    </div>

                    <!-- Foglalás szekció -->
                    <div class="pricing-buttons">
                        @auth
                            @if (auth()->user()->email_verified_at)
                                @if (auth()->user()->drivingLicenceReal == 0)
                                    <!-- Ha nincs érvényes jogosítvány -->
                                    <button class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#noLicenceModal">
                                        Bérlés
                                    </button>
                                @else
                                    <a href="{{ route('tools.index', ['motor' => $motor->id]) }}">
                                        <button class="btn btn-dark w-100">Bérlés</button>
                                    </a>
                                @endif
                            @else
                                <button class="btn btn-dark w-100" data-bs-toggle="modal"
                                    data-bs-target="#verifyEmailModal">Bérlés</button>
                            @endif
                        @else
                            <button class="btn btn-dark w-100" data-bs-toggle="modal"
                                data-bs-target="#loginModal">Bérlés</button>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Modális ablak a hibaüzenethez -->
        <div class="modal fade" id="noLicenceModal" tabindex="-1" aria-labelledby="noLicenceModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="noLicenceModalLabel">Hiba</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Kérjük várd meg amíg le ellenőrizzük a jogosítványodat.</p>
                        <p><small>Ez legfeljebb 5 percet vehet igénybe.</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hibaüzenet ha nincs megerősítve az email-->
        <div class="modal fade" id="verifyEmailModal" tabindex="-1" aria-labelledby="verifyEmailModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verifyEmailModalLabel">Email-cím megerősítése</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Kérjük, erősítse meg az email-címét a további használathoz!</p>
                        <p>Amennyiben nem kapta meg az emailt, kattintson az alábbi gombra az újraküldéshez.</p>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Email újraküldése</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégse</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hibaüzenet ha nincs bejelentkezve a felhasználó -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: white; color: white;">
                        <h5 class="modal-title" id="loginModalLabel" style="color: black">Bejelentkezés szükséges</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="font-size: 16px;">
                        <p>Kérjük, jelentkezzen be a bérléshez!</p>
                        <a href="{{ route('login') }}" class="btn btn-success"
                            style="width: 50%; margin-bottom: 10px">Bejelentkezés</a>

                    </div>

                    <div class="modal-footer">
                        <p style="text-align: left; margin: 0;">Ha még nincs fiókod,
                            <a href="{{ route('register') }}" style="color: #007bff; text-decoration: none;">regisztrálj
                                itt</a>.
                        </p>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégse</button>
                    </div>
                </div>
            </div>
        </div>

@endsection