@extends('layouts.header')

@section('content')

<div class="ms-10 mt-5">
<a href="{{ url()->previous() }}" class="btn btn-primary vissza"><i class="bi bi-arrow-left"></i> View Back All Categories</a>
</div>
<div class="motor-details">
    <div class="motor-image">
        <img src="{{ asset('storage/img/apriliamana_013.jpg') }}" alt="Motor image" />
    </div>   

    <div class="details-text">
        <h2>{{ $motor->brand }} - {{ $motor->type }}</h2>
        <ul>
            <li><i class="fa fa-motorcycle"></i> V2-es {{ $motor->brand }} motor</li>
            <li><i class="fa fa-plug"></i> {{ $motor->powerLe }} LE és {{ $motor->powerkW }} kW</li> <!-- A 'fa-plug' ikon -->
            <li><i class="fa fa-calendar-alt"></i> Évjárat: {{ $motor->year }}</li>
            <li><i class="fa fa-cogs"></i> {{ $motor->gearbox }} sebességes váltó</li>
            <li><i class="fa fa-users"></i> A Jármű {{ $motor->places }} személyes</li>
            <li><i class="fa fa-map-marker-alt"></i> Location {{ $motor->location }}</li>
        </ul>
<hr>
        <div class="pricing-buttons">
            <a href="{{ route("tools.index",['motor' => $motor->id]) }}"><button class="btn btn-dark">Bérlés</button></a>
        </div>
    </div>

    <div class="money-list">
            <ul > <p class="kicsi">🏍️ Minél tovább bérelsz, annál többet spórolsz! 🏍️</p>
                <li><b>1 nap ~  <span>{{ number_format($motor->price, 0, '.', ' ') }} Ft</b></li>                    
                <li><b>3 nap ~  <span>{{ number_format(floor($motor->price * 0.8), 0, '.', ' ') }} Ft</b>(-20%)</li>
                <li><b>7 nap ~  <span>{{ number_format(FLOOR($motor->price*0.7), 0, '.', ' ') }} Ft</b>(-30%)</li>
            </ul>
    </div>



</div>




@endsection

