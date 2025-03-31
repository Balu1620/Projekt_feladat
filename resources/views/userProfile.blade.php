@extends('layouts.header')

@section('content')

    <div class="container my-5">
        <div class="row">
            <!-- Felhasználói adatlap szakasz -->
            <div class="col-12 col-md-6 mb-4 mb-md-0">
                <div class="user-profile-container position-relative">
                    <!-- Gomb a jobb felső sarokban (csak nagyobb képernyőn) -->
                    <div class="d-none d-md-block position-absolute top-0 end-0 mt-2 me-2">
                        <button type="button" id="EditBtn" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editUserModal">
                            Adatok módosítása
                        </button>
                    </div>

                    <h1 class="profile-header"><strong>Felhasználói Adatlap</strong></h1>

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

                    <div class="license-images-section pe-5">
                        <h2 class="section-title ps-3">Jogosítvány:</h2>
                        <div class="image-container">
                            <img src="{{ asset(auth()->user()->drivingLicenceImage) }}" alt="Driving Licence"
                                class="license-image img-fluid">
                            <img src="{{ asset(auth()->user()->drivingLicenceImageBack) }}" alt="Jogosítvány hátsó oldala"
                                class="license-image img-fluid">
                        </div>
                    </div>

                    <!--Gomb kisebb képernyőn középre igazítva-->
                    <div class="d-md-none text-center mt-3">
                        <button type="button" id="EditBtn" class="btn btn-primary w-100" data-bs-toggle="modal"
                            data-bs-target="#editUserModal">
                            Adatok módosítása
                        </button>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel">Felhasználói adatok módosítása</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Bezárás"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('updateUserData') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Név</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ auth()->user()->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email cím</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ auth()->user()->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phoneNumber" class="form-label">Telefonszám</label>
                                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                        value="{{ auth()->user()->phoneNumber }}" required>
                                </div>

                                <!-- Jogosítvány első oldala -->
                                <div class="mb-3 text-center">
                                    <label for="drivingLicenceImage" class="form-label">Jogosítvány (elöl)</label>
                                    <input type="file" class="form-control" id="drivingLicenceImage"
                                        name="drivingLicenceImage" accept="image/*"
                                        onchange="previewImage(event, 'previewFront')">
                                    <div class="d-flex justify-content-center mt-2">
                                        <img id="previewFront" src="{{ asset(auth()->user()->drivingLicenceImage) }}"
                                            alt="Jogosítvány elöl" class="img-fluid rounded shadow" width="150">
                                    </div>
                                </div>

                                <!-- Jogosítvány hátsó oldala -->
                                <div class="mb-3 text-center">
                                    <label for="drivingLicenceImageBack" class="form-label">Jogosítvány (hátul)</label>
                                    <input type="file" class="form-control" id="drivingLicenceImageBack"
                                        name="drivingLicenceImageBack" accept="image/*"
                                        onchange="previewImage(event, 'previewBack')">
                                    <div class="d-flex justify-content-center mt-2">
                                        <img id="previewBack" src="{{ asset(auth()->user()->drivingLicenceImageBack) }}"
                                            alt="Jogosítvány hátul" class="img-fluid rounded shadow" width="150">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success w-100">Mentés</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bérlések szakasz -->
            <div class="col-12 col-md-6">
                <h1 class="text-center mb-7 text-black" id="LoansUser"><Strong>Bérlések</Strong></h1>
                <div class="menu-container my-5 rounded-2 bg-gray-300">
                    <div class="row">
                        @if(count($loans) > 0)
                            @foreach($loans as $loan)
                                <div class="col-12 mb-4">
                                    <div class="card shadow-sm rounded h-auto">
                                        <div class="card-header bg-red-900 text-white">
                                            <div class="d-flex justify-content-between">
                                                <h5>Rendelési azonosító: {{ $loan['orders_id'] }}</h5>
                                                <span class="text-muted-primary">{{ $loan['rental_period']['rentalDate'] }} -
                                                    {{ $loan['rental_period']['returnDate'] }}</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h6><strong>Bérlő neve:</strong> {{ $loan['user_name'] }}</h6>
                                            <h5 class="mb-0"><strong> Motor:</strong> {{ $loan['motorcycle']['brand'] }}
                                                {{ $loan['motorcycle']['type'] }}
                                            </h5>

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