@extends('layouts.header')

@section('content')
    <div id="order-steps" class="w-full h-auto flex flex-col md:flex-row items-center justify-center py-10">
        <div class="flex flex-col items-center mx-4">
            <div class="step-circle">
                ✓
            </div>
            <span class="mt-2 step-title">1. lépés</span>
            <p class="step-description">Motor kiválasztása</p>
        </div>

        <!-- Vonal -->
        <div class="hidden md:block w-20 step-line mx-2"></div>

        <div class="flex flex-col items-center mx-3">
            <div class="step-circle">
                ✓
            </div>
            <span class="mt-2 step-title">2. lépés</span>
            <p class="step-description">Motor adatok</p>
        </div>

        <div class="hidden md:block w-20 step-line mx-2"></div>

        <div class="flex flex-col items-center mx-3">
            <div class="step-circle">
                ✓
            </div>
            <span class="mt-2 step-title">3. lépés</span>
            <p class="step-description">Eszközök és időpont</p>
        </div>

        <!-- Vonal -->
        <div class="hidden md:block w-20 step-line mx-2"></div>

        <div class="flex flex-col items-center mx-3">
            <div class="step-circle">
                ✓
            </div>
            <span class="mt-2 step-title">3. lépés</span>
            <p class="step-description">Összesítés</p>
        </div>
    </div>
    <div class="custom-order-container">
        <div class="custom-order-card">
            <h1 class="custom-order-heading"><strong>Köszönjük a foglalásod!</strong></h1>
            <div class="custom-like-icon">
                <img src="{{ asset('storage/img/FinalPage.png') }}" alt="Like Icon">
            </div>
            <p>A rendelési azonosítód:</p>
            <p class="custom-order-id">{{ $orderId }}</p>
            <p class="custom-order-message">
                Ezzel az azonosítóval tudnak majd a vendéglátó pultnál azonosítani a foglalásod.
                <br><br>
                Reméljük elégetett leszel a szolgáltatássunkal, és a jövöben is visszatérsz hozzánk!
            </p>
            <a href="/home" class="btn btn-secondary mt-3">Visszatérés a főoldalra</a>
        </div>
    </div>
@endsection