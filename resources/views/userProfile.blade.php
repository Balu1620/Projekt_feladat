@extends('layouts.header')

@section('content')


    <div class="user-profile-container">
        <h1 class="profile-header">Felhasználói Adatlap</h1>
        <div class="user-data-section">
            <h2 class="section-title">Felhasználó adatai:</h2>
            <br>
            <ul class="user-info-list">
                <li class="info-item"><strong>Név: </strong> {{ auth()->user()->name }}</li>
                <li class="info-item"><strong>Azonosító: </strong> {{ auth()->user()->id }}</li>
                <li class="info-item"><strong>Email cím: </strong> {{ auth()->user()->email }}</li>
                <li class="info-item"><strong>Telafonszám: </strong> +{{ auth()->user()->phoneNumber }}</li>
            </ul>
        </div>
        <div class="license-images-section">
            <h2 class="section-title">Jogosítvány:</h2>
            <div class="image-container">
                <img src="{{ asset('storage/' . auth()->user()->drivingLicenceImage) }}"alt="Driving Licence" class="license-image">
                <img src="{{ asset('storage/' . auth()->user()->drivingLicenceImageBack) }}" alt="Jogosítvány hátsó oldala" class="license-image">
            </div>
        </div>
    </div>

@endsection

@extends('layouts.footer')