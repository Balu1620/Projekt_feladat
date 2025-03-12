@extends('layouts.header')

@section('content')

    <H1>Sikeres Fizetés</H1>

    <form action="{{ route("loan.store") }}" method="post">
    @csrf

        <p>{{ session("Loandata")->rentalDate }}</p>

        <input type="submit" class="btn btn-danger" value="Vissza">
    </form>


@endsection