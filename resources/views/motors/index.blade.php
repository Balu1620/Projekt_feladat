@extends('layouts.header')

@section('content')

    <body>
        <div class="mcontent" id="filter">
            <h2 class="text-center fs-2">A Motorok</h2>

            <div id="order-steps"
                class="w-full h-auto flex flex-col md:flex-row items-center justify-center py-10">
                <div class="flex flex-col items-center mx-3">
                    <div class="step-circle-no">
                        ?
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

            <div class="flex flex-col md:flex-row gap-4 md:gap-10 items-center">
                <!-- Szűrés gomb -->
                <button class="open-btn btn btn-dark m-4 md:m-0" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    Szűrés <i class="bi bi-sliders"></i>
                </button>
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
                                        <option value="{{ $gearbox->gearbox }}" {{ request('gearbox', old('gearbox')) == $gearbox->gearbox ? 'selected' : '' }}>{{ $gearbox->gearbox }}
                                        </option>
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

                            <!-- Dátum szűrő hozzáadása -->
                            <div class="col-12 mb-3">
                                <p class="fw-medium">Kölcsönzés kezdete:</p>
                                <input type="date" name="dateStart" value="{{ request('dateStart', old('dateStart')) }}"
                                    class="form-control">
                            </div>
                            <div class="col-12 mb-3">
                                <p class="fw-medium">Kölcsönzés vége:</p>
                                <input type="date" name="dateEnd" value="{{ request('dateEnd', old('dateEnd')) }}"
                                    class="form-control">
                            </div>

                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-secondary w-100">Szűrés</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        <div class="motorGrid" id="margin">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach($motorcycles as $motorcycle)
                    <div class="col">
                        <div class="card h-100">
                            <img class="card-img-top"
                                src="{{ asset('img/' . str_replace(' ', '', $motorcycle->type) . '.jpg') }}"
                                alt="Motor image" />
                            <div class="card-body">
                                <h5 class="card-title">
                                    <span class="brand">{{ $motorcycle->brand }}</span> -
                                    {{ number_format($motorcycle->price) }} Ft/nap
                                </h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ $motorcycle->brand }} {{ $motorcycle->type }}</li>
                                    <li class="list-group-item">{{ $motorcycle->powerLe }} LE és {{ $motorcycle->powerkW }} kW
                                    </li>
                                    <li class="list-group-item">{{ $motorcycle->gearbox }}</li>
                                    <li class="list-group-item">{{ $motorcycle->location }}</li>
                                </ul>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ route('motors.show', $motorcycle->id) }}"
                                    class="btn btn-outline-secondary w-100">Részletek</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        </div>
    </body>
@endsection

@extends('layouts.footer')