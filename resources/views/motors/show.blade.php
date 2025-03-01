@extends('layouts.header')

@section('content')

<div class="ms-10 mt-5">
<a href="{{ url()->previous() }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> View Back All Categories</a>
</div>
<div class="motor-details">
    <div class="motor-image">
        <img src="{{ asset('storage/img/placeholder.png') }}" alt="Motor image" />
    </div>
    <div class="details-text">
        <h2>{{ $motor->brand }} - {{ $motor->type }}</h2>
        <ul>
            <li><i class="fa fa-motorcycle"></i> V2-es {{ $motor->brand }} motor</li>
            <li><i class="fa fa-plug"></i> {{ $motor->power }} LE</li> <!-- A 'fa-plug' ikon -->
            <li><i class="fa fa-calendar-alt"></i> Évjárat: {{ $motor->year }}</li>
            <li><i class="fa fa-cogs"></i> {{ $motor->gearbox }} sebességes váltó</li>
            <li><i class="fa fa-users"></i> A Jármű {{ $motor->places }} személyes</li>
            <li><i class="fa fa-map-marker-alt"></i> Location {{ $motor->location }}</li>
        </ul>
        <div class="pricing-buttons">
            <a href="{{ route("tools.index") }}"><button class="btn btn-dark">1 nap <span>{{ $motor->price }} Ft</span></button></a>
        </div>
    </div>
</div>




@endsection

