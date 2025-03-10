@extends('layouts.header')

@section('content')

<div class="container">
        <div class="motor-image">
            <img src="{{ asset('storage/img/placeholder.png') }}" alt="">
        </div>
        <div class="motor-name">{{ $motor->brand }} - {{ $motor->type }}</div>

        <div class="clearfix">
            <div class="left-section">
                <div class="product-list">
                    <h3>Termékek</h3>
                    <p>Sisak: {{ $sisakdb }} db</p>
                    <p>Ruházat: {{ $ruhadb }} db</p>
                    <p>Cipő:  db</p>
                </div>
            </div>

            <div class="right-section">
                <div class="summary">
                    <h3>Összesítés</h3>
                    <p>Teljes összeg: <span id="total">{{ number_format($motor->price, 0, '.', ' ') }}</span> Ft</p>
                    <p>Kedvezmény: <span id="discount">0</span> Ft</p>
                    <p>Fizetendő összeg: <span id="payable">0</span> Ft</p>
                </div>
                <button class="payment-button">Fizetés</button>
            </div>
        </div>
    </div>




@endsection