@extends('layouts.header')

@section('content')
    <form action="{{ route('pages.final_page', ['motor' => $motor->id]) }}" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="order-summary-container">
                        <h1>Rendelés Összesítő</h1>
                        <div class="summary-box">
                            <div class="order-info">
                                <h2>Rendelési Információk</h2>
                                <p><strong>Kezdő Dátum:</strong> {{ $startDateRaw }}</p>
                                <p><strong>Végső Dátum:</strong> {{ $endDateRaw }}</p>
                                <p><strong>Bérlési Napok Száma:</strong> {{ $startDate->diffInDays($endDate) + 1 }} nap</p>
                            </div>

                            <div class="order-items">
                                <h2>Bérelt Termékek</h2>
                                <div class="additional-info">
                                    <p><small>Sisak Kaució:</small> {{ $helmetDeposit }} Ft</p>
                                    <p><small>Ruházat Kaució:</small> {{ $clothingDeposit }} Ft</p>
                                    <p><small>Cipők Kaució:</small> {{ $bootDeposit }} Ft</p>
                                </div>
                                <ul>
                                    @if(count($sisakmeret) > 0)
                                        <li>
                                            <span>Sisak</span>
                                            <span>Méretek:
                                                @foreach($sisakmeret as $index => $size)
                                                    {{ $size }}@if($index < count($sisakmeret) - 1), @endif
                                                @endforeach
                                            </span>
                                            <span>Napi Ár: {{ $helmetDailyPrice }} Ft</span>
                                            <span>Összesen: {{ number_format($helmetCost, 0, '.', ' ') }} Ft</span>
                                        </li>
                                    @endif

                                    @if(count($ruhameret) > 0)
                                        <li>
                                            <span>Ruházat</span>
                                            <span>Méretek:
                                                @foreach($ruhameret as $index => $size)
                                                    {{ $size }}@if($index < count($ruhameret) - 1), @endif
                                                @endforeach
                                            </span>
                                            <span>Napi Ár: {{ $clothingDailyPrice }} Ft</span>
                                            <span>Összesen: {{ number_format($clothingCost, 0, '.', ' ') }} Ft</span>
                                        </li>
                                    @endif

                                    @if(count($cipomeret) > 0)
                                        <li>
                                            <span>Cipők</span>
                                            <span>Méretek:
                                                @foreach($cipomeret as $index => $size)
                                                    {{ $size }}@if($index < count($cipomeret) - 1), @endif
                                                @endforeach
                                            </span>
                                            <span>Napi Ár: {{ $bootDailyPrice }} Ft</span>
                                            <span> Összesen: {{ number_format($bootCost, 0, '.', ' ') }} Ft</span>
                                        </li>
                                    @endif

                                    <li>
                                        <span>Motor</span>
                                        <span>Napi Ár: {{ number_format($motor->price, 0, '.', ' ') }} Ft</span>
                                        <span> Összesen:
                                            {{ number_format($motor->price * ($startDate->diffInDays($endDate) + 1), 0, '.', ' ') }}
                                            Ft</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="order-total">
                                <h2>Összesítés</h2>
                                <p><strong>Termékek Összesen:</strong>
                                    {{ number_format($helmetCost + $clothingCost + $bootCost + $motor->price * ($startDate->diffInDays($endDate) + 1), 0, '.', ' ') }}
                                    Ft</p>
                                <p><strong>Kedvezmény: </strong><del style="color: red;"><span>
                                            {{ number_format($discount, 0, '.', ' ') }} Ft</del></span></p>
                                <p><strong>Fizetendő Összeg:</strong> {{ number_format($payable, 0, '.', ' ') }} Ft</p>
                            </div>
                        </div>

                        <button class="confirm-button">Rendelés Megerősítése</button>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="motor-and-user-info">
                        <div class="motor-image">
                            <img src="{{ asset('img/' . str_replace(' ', '', $motor->type) . '.jpg') }}"
                                id="motorImage" />
                        </div>
                        <br>
                        <h2>Motor Információk</h2>
                        <p><strong>Motor Típus:</strong> {{ $motor->brand }} - {{ $motor->type }}</p>
                        <p><strong>Napi Ár:</strong> {{ number_format($motor->price, 0, '.', ' ') }} Ft</p>

                        <h2>Felhasználói Információk</h2>
                        <p><strong>Név: {{auth()->user()->name}}</strong> </p>
                        <p><strong>Email: {{auth()->user()->email}}</strong> </p>
                        <p><strong>Telefonszám: +{{auth()->user()->phoneNumber}}</strong> </p>
                    </div>

                    <div class="additional-info">
                        <h3>Köszönjük, hogy minket választott!</h3>
                        <p>Kedves Ügyfelünk, reméljük, hogy elégedett lesz szolgáltatásainkkal. Ha bármilyen kérdése van,
                            forduljon hozzánk bizalommal az alábbi elérhetőségeken:</p>
                        <ul>
                            <li><strong>Telefon:</strong> +36 1 123 4567</li>
                            <li><strong>Email:</strong> info@example.com</li>
                            <li><strong>Nyitvatartás:</strong> Hétfőtől Péntekig, 9:00 - 17:00</li>
                        </ul>
                    </div>

                </div>



            </div>
        </div>
    </form>
@endsection