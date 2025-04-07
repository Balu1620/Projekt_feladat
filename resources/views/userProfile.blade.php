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

            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <h1 class="text-center mb-7 text-black" id="LoansUser"><strong>Bérlések</strong></h1>
                <div class="menu-container my-5 rounded-2 bg-gray-300">
                    <div class="row">
                        @if(count($loans) > 0)
                            @foreach($loans as $loan)
                                <div class="col-12 mb-4">
                                    <div class="card shadow-sm rounded h-auto position-relative">
                                        <div class="card-header bg-red-900 text-white">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="fs-6 fs-md-5">Rendelési azonosító: {{ $loan['orders_id'] }}</h5>
                                                <span class="text-muted-primary fs-6">{{ $loan['rental_period']['rentalDate'] }} -
                                                    {{ $loan['rental_period']['returnDate'] }}</span>
                                            </div>
                                        </div>
                                        <!-- Törlés gomb -->
                                        <div class="position-absolute bottom-0 end-0">
                                            <form class="delete-order-form" method="POST"
                                                action="{{ route('deleteOrder', $loan['orders_id']) }}"
                                                data-rental-date="{{ \Carbon\Carbon::parse($loan['rental_period']['rentalDate'])->toIso8601String() }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="delete-btn btn" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $loan['orders_id'] }}"
                                                    style="margin-left: 10px;">
                                                    <i class="bi bi-trash text-danger" style="font-size: 1.5rem;"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="mb-0"><strong>Motor:</strong> {{ $loan['motorcycle']['brand'] }}
                                                {{ $loan['motorcycle']['type'] }}
                                            </h5>

                                            <div class="mt-3">
                                                @if(count($loan['tools']) > 0)
                                                    <h6 class="text-success">Kapcsolt eszközök:</h6>
                                                    <ul class="list-unstyled">
                                                        @foreach($loan['tools'] as $tool)
                                                            <li>
                                                                <i class="bi bi-tools me-2 text-secondary"></i>
                                                                <strong>{{ $tool['tool_name'] }} ({{ $tool['tool_size'] }})</strong> -
                                                                Kapcsolva:
                                                                {{ $tool['connected_at'] }}
                                                                <form action="{{ route('deleteTool', $tool['tool_id']) }}" method="POST"
                                                                    style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm ms-2">
                                                                        <i class="bi bi-trash"></i> Törlés
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <form action="{{ route('addToolToOrder', $loan['orders_id']) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#addToolModal{{ $loan['orders_id'] }}">
                                                            Új eszköz hozzáadása
                                                        </button>

                                                    </form>
                                                @else
                                                    <p class="text-muted">Nincsenek kapcsolt eszközök.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Törlés megerősítő ablak -->
                                <div class="modal fade" id="deleteModal{{ $loan['orders_id'] }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel{{ $loan['orders_id'] }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered w-100" style="max-width: 600px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $loan['orders_id'] }}">Rendelés
                                                    törlése</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Biztosan törölni akarja ezt a rendelést? Ez a művelet nem visszavonható.
                                            </div>
                                            <div class="modal-footer d-flex justify-content-between w-100">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Mégse</button>
                                                <!-- A form az 'action' és a 'DELETE' metódus most itt megerősíti a törlést -->
                                                <form method="POST" action="{{ route('deleteOrder', $loan['orders_id']) }}"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger w-100 w-sm-auto">Törlés
                                                        megerősítése</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Tool Hozzáadás Ablak -->
                                <div class="modal fade" id="addToolModal{{ $loan['orders_id'] }}" tabindex="-1"
                                    aria-labelledby="addToolModalLabel{{ $loan['orders_id'] }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('addToolToOrder', $loan['orders_id']) }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addToolModalLabel{{ $loan['orders_id'] }}">Eszköz
                                                        hozzáadása rendeléshez</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Bezárás"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="tool_id" class="form-label">Válassz eszközt</label>
                                                        <select class="form-select" name="tool_id" required>
                                                            <option value="" disabled selected>-- Válassz egy eszközt --</option>
                                                            @foreach ($availableTools as $tool)
                                                                <option value="{{ $tool->id }}">{{ $tool->toolName }}
                                                                    ({{ $tool->size }})</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Hozzáadás</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Mégse</button>
                                                </div>
                                            </form>
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