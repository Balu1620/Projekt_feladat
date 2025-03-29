@extends('layouts.header')

@section('content')

    <div class="container my-5">
        <div class="row">
            <!-- Felhasználói adatlap szakasz -->
            <div class="col-12 col-md-6 mb-4 mb-md-0">
                <div class="user-profile-container">
                    <h1 class="profile-header">Felhasználói Adatlap</h1>
                    <div class="user-data-section">
                        <h2 class="section-title">Felhasználó adatai:</h2>
                        <br>
                        <ul class="user-info-list">
                            <li class="info-item"><strong>Név: </strong> {{ auth()->user()->name }}</li>
                            <li class="info-item"><strong>Azonosító: </strong> {{ auth()->user()->id }}</li>
                            <li class="info-item"><strong>Email cím: </strong> {{ auth()->user()->email }}</li>
                            <li class="info-item"><strong>Telefonszám: </strong> +{{ auth()->user()->phoneNumber }}</li>
                        </ul>
                    </div>
                    <div class="license-images-section">
                        <h2 class="section-title">Jogosítvány:</h2>
                        <div class="image-container">
                            <img src="{{ asset('' . auth()->user()->drivingLicenceImage) }}" alt="Driving Licence"
                                class="license-image img-fluid">
                            <img src="{{ asset('' . auth()->user()->drivingLicenceImageBack) }}"
                                alt="Jogosítvány hátsó oldala" class="license-image img-fluid">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bérlések szakasz -->
            <div class="col-12 col-md-6">
                <h1 class="text-center mb-7 text-black">Bérlések</h1>
                <div class="menu-container my-5 rounded-2">
                    <div class="row bg-gray-300">
                        @if(count($loans) > 0)
                            @foreach($loans as $loan)
                                <div class="col-12 mb-4">
                                    <div class="card shadow-sm border-light rounded">
                                        <div class="card-header bg-orange-400 text-white">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="mb-0">{{ $loan['motorcycle']['brand'] }}
                                                    {{ $loan['motorcycle']['type'] }}</h5>
                                                <span class="text-muted">{{ $loan['rental_period']['rentalDate'] }} -
                                                    {{ $loan['rental_period']['returnDate'] }}</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h6><strong>Bérlő neve:</strong> {{ $loan['user_name'] }}</h6>

                                            <div class="mt-3">
                                                @if(count($loan['tools']) > 0)
                                                    <h6 class="text-success">Kapcsolt eszközök:</h6>
                                                    <ul class="list-unstyled">
                                                        @foreach($loan['tools'] as $tool)
                                                            <li>
                                                                <i class="bi bi-tools me-2 text-secondary"></i>
                                                                <strong>{{ $tool['tool_name'] }}</strong> - Kapcsolva:
                                                                {{ $tool['connected_at'] }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <p class="text-muted">Nincsenek kapcsolt eszközök.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <p class="text-center text-muted">Nincs még rendelés.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@extends('layouts.footer')