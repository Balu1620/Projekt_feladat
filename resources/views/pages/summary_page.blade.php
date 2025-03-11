@extends('layouts.header')

@section('content')

<div class="container" id="loanContainer">
        <div class="motor-image">
            <img src="{{ asset('storage/img/placeholder.png') }}" alt="">
        </div>
        <div class="motor-name">{{ $motor->brand }} - {{ $motor->type }}</div>

        <div class="clearfix">
            <div class="left-section">
                <div class="product-list">
                    <h3>Termékek</h3>
                    <br>
                    <p><small>A siak napi ára: <strong>{{ $helmetDailyPrice }}</strong> Ft-nak felel meg.</small></p>
                    <p><small>A ruházat napi ára: <strong>{{ $clothingDailyPrice }}</strong> Ft-nak felel meg.</small></p>
                    <p><small>A sisak és a ruházatért kauciót számulunk fel mely <strong>{{ $helmetDeposit }}</strong> és <strong>{{ $clothingDeposit }}</strong>Ft.</small></p>
                    <br>
                    <p>Motor: {{ $motor->brand }} - {{ $motor->type }}</p>
                    <p>Sisak: {{ $sisakdb }} db</p>
                    <p>Ruházat: {{ $ruhadb }} db</p>
                                     
                    <br>
                    <p>Kezdő dátum: {{ $startDateRaw }}</p>
                    <p>Végső Dátum: {{ $endDateRaw }}</p>
                    <p><strong>Bérlési napok száma:</strong> {{ $startDate->diffInDays($endDate) + 1 }} nap</p>
                </div>
            </div>

            <div class="right-section">
                <div class="summary">
                    <h3>Összesítés</h3>
                    <p>Motor napi összeg: <span id="total">{{ number_format($motor->price, 0, '.', ' ') }}</span> Ft</p>
                    <p><small><strong>Sisak költsége:</strong> {{ number_format($helmetCost, 0, '.', ' ') }} Ft</small></p>
                    <p><small><strong>Ruházat költsége:</strong> {{ number_format($clothingCost, 0, '.', ' ') }} Ft</small></p>  
                    <p>Kedvezmény: <span id="discount">{{ number_format($discount, 0, '.', ' ') }} Ft</span> Ft</p>
                    <p>Fizetendő összeg: <span id="payable">{{ number_format($payable, 0, '.', ' ') }}</span> Ft</p>
                </div>
                <button class="payment-button">Fizetés</button>
            </div>
        </div>
    </div>




@endsection