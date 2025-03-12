@extends('layouts.header')

@section('content')

    <div class="ms-10 mt-5">
        <a href="{{ url()->previous() }}" class="btn btn-primary vissza"><i class="bi bi-arrow-left"></i> View Back All
            Categories</a>
    </div>
    <div class="motor-details">
        <div class="motor-image">
            <img src="{{ asset('storage/img/apriliamana_013.jpg') }}" alt="Motor image" />
        </div>

        <div class="details-text">
            <h2>{{ $motor->brand }} - {{ $motor->type }}</h2>
            <ul>
                <li><i class="fa fa-motorcycle"></i> V2-es {{ $motor->brand }} motor</li>
                <li><i class="fa fa-plug"></i> {{ $motor->powerLe }} LE és {{ $motor->powerkW }} kW</li>
                <!-- A 'fa-plug' ikon -->
                <li><i class="fa fa-calendar-alt"></i> Évjárat: {{ $motor->year }}</li>
                <li><i class="fa fa-cogs"></i> {{ $motor->gearbox }} sebességes váltó</li>
                <li><i class="fa fa-users"></i> A Jármű {{ $motor->places }} személyes</li>
                <li><i class="fa fa-map-marker-alt"></i> Location {{ $motor->location }}</li>
            </ul>
            <hr>
            <div class="pricing-buttons">
                @auth
                    <a href="{{ route('tools.index', ['motor' => $motor->id]) }}">
                        <button class="btn btn-dark">Bérlés</button>
                    </a>
                @else
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#loginModal">Bérlés</button>
                @endauth
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

        <div class="money-list">
            <ul>
                <p class="kicsi">🏍️ Minél tovább bérelsz, annál többet spórolsz! 🏍️</p>
                <li><b>1 nap ~ <span>{{ number_format($motor->price, 0, '.', ' ') }} Ft</b></li>
                <li><b>3 nap ~ <span>{{ number_format(floor($motor->price * 0.8), 0, '.', ' ') }} Ft</b>(-20%)</li>
                <li><b>7 nap ~ <span>{{ number_format(FLOOR($motor->price * 0.7), 0, '.', ' ') }} Ft</b>(-30%)</li>
            </ul>
        </div>



    </div>




@endsection