@extends('layouts.header')

@section('content')

<div class="mcontent">
    <h2 style="text-align: center;">Motorok</h2>

    <div class="ms-5" id="">
        <button class="open-btn btn btn-primary mb-4" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
            Szűrés <i class="bi bi-sliders"></i>
        </button>
    </div>

    <div id="filter">
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

                        <div id="radio" class="mt-3 ">
                            <div class="form-switch form-check form-check-reverse text-start">
                                <label for="petrol">Benzin:</label>
                                <input id="petrol" class="form-check-input" type="checkbox" name="fuel" value="B">
                            </div>
                            <div class="form-check form-switch form-check-reverse text-start">
                                <label for="electro">Elektromos:</label>
                                <input id="electro" class="form-check-input" type="checkbox" name="fuel" value="E">
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-secondary w-100">Szűrés</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row justify-content-center" id="margin" >
        @foreach($motorcycles as $motorcycle)
            <div class="col-sm-4 col-md-12 col-lg-6 col-xl-12 col-xxl-12 mb-4 d-flex justify-content-center" id="motorcycle">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="Motor képe">
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="brand">{{ $motorcycle->brand }}</span> - {{ number_format($motorcycle->price) }}
                            Ft/nap
                        </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $motorcycle->brand }} {{ $motorcycle->type }}</li>
                            <li class="list-group-item">{{ $motorcycle->power }}</li>
                            <li class="list-group-item">{{ $motorcycle->gearbox }}</li>
                            <li class="list-group-item">{{ $motorcycle->location }}</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="btn btn-secondary">Részletek</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

@extends('layouts.footer')