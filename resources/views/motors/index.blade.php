@extends('layouts.header')

@section('content')

<div class="mcontent" id="filter">
    <h2 class="text-center fs-2">A Motorok</h2>

    <button class="open-btn btn btn-primary m-4" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
        Szűrés <i class="bi bi-sliders"></i>
    </button>

    <div class="filter offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h4 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Szűrés</h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form method="GET">
                <div class="row container-fluid">
                    <div class="col-12 mb-2">
                        <select class="form-control" name="brand">
                            <option value="" disabled selected>Márka</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->brand }}">{{ $brand->brand }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-2">
                        <select class="form-control" name="location">
                            <option value="" disabled selected>Kerület</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->location }}">{{ $location->location }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-2">
                        <select class="form-control" name="year">
                            <option value="" disabled selected>Kor</option>
                            @foreach($years as $year)
                                <option value="{{ $year->year }}">{{ $year->year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-2">
                        <select class="form-control" name="gearbox">
                            <option value="" disabled selected>Sebesség váltó</option>
                            @foreach($gearboxes as $gearbox)
                                <option value="{{ $gearbox->gearbox }}">{{ $gearbox->gearbox }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="radio" class="mt-3" >
                        <div class="form-check form-switch form-check-reverse text-left">
                            <label for="B">Benzin:</label>
                            <input class="form-check-input" type="checkbox" name="fuel" value="B">
                        </div>
                        <div class="form-check form-switch form-check-reverse">
                            <label for="E">Elektromos:</label>
                            <input class="form-check-input" type="checkbox" name="fuel" value="E">
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <button class="btn btn-secondary w-100">Szűrés</button>
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
                            <span class="brand">{{ $motorcycle->brand }}</span> - {{ number_format($motorcycle->price) }} Ft/nap
                        </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $motorcycle->brand }} {{ $motorcycle->type }}</li>
                            <li class="list-group-item">{{ $motorcycle->power }}</li>
                            <li class="list-group-item">{{ $motorcycle->gearbox }}</li>
                            <li class="list-group-item">{{ $motorcycle->location }}</li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('motors.show', $motorcycle->id) }}" class="btn btn-outline-secondary">Részletek</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@extends('layouts.footer')