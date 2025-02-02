@extends('layouts.header')

@section('content')

<div class="container">
    <h2 class="text-center">Motorok</h2>

    <!-- Szűrő -->
    <button class="btn btn-primary mb-4 ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#filterCanvas"
        aria-controls="filterCanvas"> Szűrés <i class="bi bi-sliders"></i>
    </button>

    <div id="filter">
        <div class="offcanvas offcanvas-start filter" tabindex="-1" id="filterCanvas"
            aria-labelledby="filterCanvasLabel">
            <div class="offcanvas-header">
                <h4 class="offcanvas-title" id="filterCanvasLabel">Szűrés</h4>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form method="GET" action="{{ route('motors.index') }}">
                    <div class="mb-3">
                        <select name="Marka" class="form-select">
                            <option value="" disabled selected>Márka</option>
                            @foreach($motors as $item)
                                <option value="{{ $item->brand }}">{{ $item->brand }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <select name="Kor" class="form-select">
                            <option value="" disabled selected>Kor</option>
                            @foreach($motors as $item)
                                <option value="{{ $item->year }}">{{ $item->year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <select name="Sebessegvalto" class="form-select">
                            <option value="" disabled selected>Sebességváltó</option>
                            @foreach($motors as $item)
                                <option value="{{ $item->gearbox }}">{{ $item->gearbox }}</option>
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

                    <div class="text-end mt-4">
                        <button type="submit" name="submit" class="btn btn-primary ">Szűrés</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Motorok listája -->
    <div class="row">
        @foreach($motors as $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->brand }}</h5>
                        <p class="card-text">Kor: {{ $item->year }}</p>
                        <p class="card-text">Sebességváltó: {{ $item->gearbox }}</p>
                        <p class="card-text">Üzemanyag: 

                        @if ($item->fuel === "B")
                            Benzines
                        @elseif($item->fuel === "E")
                            Elektromos
                        @else
                        @endif
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

@extends('layouts.footer')