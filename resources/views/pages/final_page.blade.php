@extends('layouts.header')

@section('content')
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