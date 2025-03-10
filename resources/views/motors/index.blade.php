@extends('layouts.header')

@section('content')

    <div class="mcontent" id="filter">
        <h2 class="text-center fs-2">A Motorok</h2>

        <div class="flex flex-row gap-10">

            <button class="open-btn btn btn-primary m-4" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                Szűrés <i class="bi bi-sliders"></i>
            </button>

            <div class="content-center self-center">


            </div>
        </div>
        <div class="filter offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
            aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h4 class="offcanvas-title fw-bold" id="offcanvasWithBothOptionsLabel">Szűrés</h4>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form method="GET">
                    <div class="row container-fluid">
                        <div class="col-12 mb-3">
                            <p class="fw-medium">Márka:</p>
                            <select class="form-control" name="brand">
                                <option value="">Nincs kiválasztva</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->brand }}" {{ request('brand', old('brand')) == $brand->brand ? 'selected' : '' }}>{{ $brand->brand }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <p class="fw-medium">Kerület:</p>
                            <select class="form-control" name="location">
                                <option value="">Nincs kiválasztva</option>
                                @foreach($locations as $location)
                                    <option value="{{ $location->location }}" {{ request('location', old('location')) == $location->location ? 'selected' : '' }}>{{ $location->location }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <p class="fw-medium">Kor:</p>
                            <select class="form-control" name="year">
                                <option value="">Nincs kiválasztva</option>
                                @foreach($years as $year)
                                    <option value="{{ $year->year }}" {{ request('year', old('year')) == $year->year ? 'selected' : '' }}>{{ $year->year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <p class="fw-medium">Sebesség váltó:</p>
                            <select class="form-control" name="gearbox">
                                <option value="">Nincs kiválasztva</option>
                                @foreach($gearboxes as $gearbox)
                                    <option value="{{ $gearbox->gearbox }}" {{ request('gearbox', old('gearbox')) == $gearbox->gearbox ? 'selected' : '' }}>{{ $gearbox->gearbox }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="radio" class="mt-3">
                            <div class="form-check form-switch form-check-reverse text-left">
                                <label for="B" class="fw-medium">Benzin:</label>
                                <input class="form-check-input" type="checkbox" name="fuel" value="B" {{ request('fuel', old('fuel')) == 'B' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check form-switch form-check-reverse">
                                <label for="E" class="fw-medium">Elektromos:</label>
                                <input class="form-check-input" type="checkbox" name="fuel" value="E" {{ request('fuel', old('fuel')) == 'E' ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class="my-3 w-full text-center">
                            <div class="mb-2 ">
                                <span>Kölcsönzés kezdete: </span><input type="date" value="def" id="dateStart">
                            </div>
                            
                            <div>
                                <span>Kölcsönzés vége: </span> <input type="date" id="dateEnd">
                            </div>
                            
                        </div>
                        <div class="col-12 mt-2">
                            <button class="btn btn-secondary w-100" onclick="date()">Szűrés</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="motorGrid" id="margin">
            @foreach($motorcycles as $motorcycle)
                <div class="mb-5 mCard">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/img/placeholder.png') }}" class="card-img-top" alt="Motor képe">
                        <div class="card-body">
                            <h5 class="card-title">
                                <span class="brand">{{ $motorcycle->brand }}</span> - {{ number_format($motorcycle->price) }}
                                Ft/nap
                            </h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $motorcycle->brand }} {{ $motorcycle->type }}</li>
                                <li class="list-group-item">{{ $motorcycle->powerLe }} LE és {{ $motorcycle->powerkW }} kW</li>
                                <li class="list-group-item">{{ $motorcycle->gearbox }}</li>
                                <li class="list-group-item">{{ $motorcycle->location }}</li>
                            </ul>
                            <div class="card-body">
                                <a href="{{ route('motors.show', $motorcycle->id) }}"
                                    class="btn btn-outline-secondary">Részletek</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('layouts.footer')