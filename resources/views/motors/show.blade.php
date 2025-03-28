@extends('layouts.header')

@section('content')

    <div class="ms-10 mt-5">
        <a href="{{ url()->previous() }}" class="btn btn-primary vissza"><i class="bi bi-arrow-left"></i> Vissza az előző
            oldalra</a>
    </div>
    <div class="motor-details">
        <div class="motor-image-page">
             <img src="{{ asset('img/' . str_replace(' ', '', $motor->type) . '.jpg') }}" alt="Motor image" />
        </div>

        <div class="details-text-page">
            <h2>{{ $motor->brand }} - {{ $motor->type }}</h2>
            <ul>
                <li><i class="fa fa-motorcycle"></i> V2-es {{ $motor->brand }} motor</li>
                <li><i class="fa fa-plug"></i> {{ $motor->powerLe }} LE és {{ $motor->powerkW }} kW</li>
                <li><i class="fa fa-calendar-alt"></i> Évjárat: {{ $motor->year }}</li>
                <li><i class="fa fa-cogs"></i> {{ $motor->gearbox }} sebességes váltó</li>
                <li><i class="fa fa-users"></i> A Jármű {{ $motor->places }} személyes</li>
                <li><i class="fa fa-map-marker-alt"></i> Location {{ $motor->location }}</li>
            </ul>
            <hr>
            <br>
            <div class="pricing-buttons">
                @auth
                    @if (auth()->user()->email_verified_at)
                        <a href="{{ route('tools.index', ['motor' => $motor->id]) }}">
                            <button class="btn btn-dark">Bérlés</button>
                        </a>
                    @else
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#verifyEmailModal">Bérlés</button>
                    @endif
                @else
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#loginModal">Bérlés</button>
                @endauth
                <p><small>*Foglalás értelmezése: a bérlés időtartama 24 órára vonatkozik. Tehát ha egy adott napon 9 órakor átveszed a motort a bérlés a következő nap 9 óráig érvényes.</small></p>
            </div>
        </div>


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

        <div class="money-list-page">
            <ul>
                <p class="kicsi">🏍️ Minél tovább bérelsz, annál többet spórolsz! 🏍️</p>
                <li><b>1 nap ~ <span>{{ number_format($motor->price, 0, '.', ' ') }} Ft</b></li>
                <li><b>3 nap ~ <span>{{ number_format(floor($motor->price * 0.8), 0, '.', ' ') }} Ft</b>(-20%)</li>
                <li><b>7 nap ~ <span>{{ number_format(FLOOR($motor->price * 0.7), 0, '.', ' ') }} Ft</b>(-30%)</li>
            </ul>
        </div>
    </div>

@endsection