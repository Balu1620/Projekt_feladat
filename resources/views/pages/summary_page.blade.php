@extends('layouts.header')

@section('content')
    <form action="{{ route('pages.final_page', ['motor' => $motor->id]) }}" method="POST">
        @csrf
        <div id="order-steps" class="w-full h-auto flex flex-col md:flex-row items-center justify-center py-10">
            <div class="flex flex-col items-center mx-3">
                <div class="step-circle">
                    ✓
                </div>
                <span class="mt-2 step-title">1. lépés</span>
                <p class="step-description">Motor kiválasztása</p>
            </div>

            <!-- Vonal -->
            <div class="hidden md:block w-20 step-line mx-4"></div>

            <div class="flex flex-col items-center mx-3">
                <div class="step-circle">
                    ✓
                </div>
                <span class="mt-2 step-title">2. lépés</span>
                <p class="step-description">Motor adatok</p>
            </div>

            <div class="hidden md:block w-20 step-line mx-4"></div>

            <div class="flex flex-col items-center mx-3">
                <div class="step-circle">
                    ✓
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

        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="motor-and-user-info">
                        <div class="motor-image">
                            <img src="{{ asset('storage/img/' . str_replace(' ', '', $motor->type) . '.jpg') }}"
                                id="motorImage" />
                        </div>
                        <div class="motor_summary">
                            <p><strong>Motor Típus:</strong> {{ $motor->brand }} - {{ $motor->type }}</p>
                            <p><strong>Napi Ár:</strong> {{ number_format($motor->price, 0, '.', ' ') }} Ft</p>

                            <h2>Felhasználói Információk</h2>
                            <p><strong>Név: {{auth()->user()->name}}</strong> </p>
                            <p><strong>Email: {{auth()->user()->email}}</strong> </p>
                            <p><strong>Telefonszám: +{{auth()->user()->phoneNumber}}</strong> </p>
                        </div>
                    </div>
                </div>
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
                                            </span><br>
                                            <span>Napi Ár: {{ $helmetDailyPrice }} Ft</span><br>
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
                                            </span><br>
                                            <span>Napi Ár: {{ $clothingDailyPrice }} Ft</span><br>
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
                                            </span><br>
                                            <span>Napi Ár: {{ $bootDailyPrice }} Ft</span><br>
                                            <span> Összesen: {{ number_format($bootCost, 0, '.', ' ') }} Ft</span>
                                        </li>
                                    @endif

                                    <li>
                                        <span>Motor</span>
                                        <span>Napi Ár: {{ number_format($motor->price, 0, '.', ' ') }} Ft</span>
                                        <br><span>Kaució: {{ number_format($motor->deposit, 0, '.', ' ') }} Ft</span>
                                        <br><span> Összesen:
                                            {{ number_format($motor->price * ($startDate->diffInDays($endDate) + 1) + $motor->deposit, 0, '.', ' ') }}
                                            Ft</span><br>
                                    </li>
                                </ul>
                            </div>

                            <div class="order-total">
                                <h2>Összesítés</h2>
                                <p><strong>Termékek Összesen:</strong>
                                    {{ number_format($motor->deposit + $helmetCost + $clothingCost + $bootCost + $motor->price * ($startDate->diffInDays($endDate) + 1), 0, '.', ' ') }}
                                    Ft</p>
                                <p><strong>Kedvezmény: </strong><del style="color: red;"><span>
                                            {{ number_format($discount, 0, '.', ' ') }} Ft</del></span></p>
                                <p><strong>Fizetendő Összeg:</strong> {{ number_format($payable, 0, '.', ' ') }} Ft</p>
                            </div>
                        </div>

                        <!-- Felhasználási feltételek elfogadása -->
                        <div class="terms-acceptance">
                            <label>
                                <input type="checkbox" id="accept-terms"> Elolvastam és elfogadom a
                                <a href="#">felhasználási feltételeket</a>.
                            </label>
                            <div id="terms-error" style="color: red; display: block;">
                                * Kötelező elfogadni a felhasználási feltételeket.
                            </div>
                        </div>
                        <br>

                        <!-- Megrendelés gomb -->
                        <button class="confirm-button" id="confirm-order" disabled>Rendelés Megerősítése</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection