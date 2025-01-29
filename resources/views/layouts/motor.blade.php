@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Motorok</h2>

    <!-- Szűrő -->
    <button class="btn btn-primary mb-4" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#filterCanvas" aria-controls="filterCanvas">
        Szűrés <i class="fa-solid fa-sliders"></i>
    </button>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="filterCanvas" aria-labelledby="filterCanvasLabel">
        <div class="offcanvas-header">
            <h4 class="offcanvas-title" id="filterCanvasLabel">Szűrés</h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form method="GET" action="{{ route('motors.index') }}">
                <div class="mb-3">
                    <select name="Marka" class="form-select">
                        <option value="" disabled selected>Márka</option>
                        @foreach($markak as $marka)
                            <option value="{{ $marka }}">{{ $marka }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <select name="Kor" class="form-select">
                        <option value="" disabled selected>Kor</option>
                        @foreach($korok as $kor)
                            <option value="{{ $kor }}">{{ $kor }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <select name="Sebessegvalto" class="form-select">
                        <option value="" disabled selected>Sebességváltó</option>
                        @foreach($valtok as $valto)
                            <option value="{{ $valto }}">{{ $valto }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <select name="Uzemanyag" class="form-select">
                        <option value="" disabled selected>Üzemanyag</option>
                        <option value="Elektromos">Elektromos</option>
                        <!-- Egyéb üzemanyagok -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Szűrés</button>
            </form>
        </div>
    </div>

    <!-- Motorok listája -->
    <div class="row">
        @foreach($motors as $motor)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $motor->Marka }}</h5>
                    <p class="card-text">Kor: {{ $motor->Kor }}</p>
                    <p class="card-text">Sebességváltó: {{ $motor->Sebessegvalto }}</p>
                    <p class="card-text">Üzemanyag: {{ $motor->Uzemanyag }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
