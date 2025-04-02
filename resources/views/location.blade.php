@extends('layouts.header')

@section('content')
<h1 id="Loch1">Telephelyek</h1>


<!-- resources/views/location.blade.php -->
<div id="SelectLoc" class="my-3">
    <h3>Válaszd ki a helyet: {{ $location }}</h3>
    <select name="keruletek" id="keruletek" onchange="valaszt(value)">
        <option value="..." selected disabled>Kerületek</option>
        <option value="1">I. kerület – Logodi utca 34.</option>
        <option value="2">II. kerület – Hűvösvölgyi út 136.</option>
        <option value="3">III. kerület – Bojtár utca 43.</option>
        <option value="4">IV. kerület – Megyeri út 20.</option>
        <option value="5">V. kerület – Bajcsy-Zsilinszky út 24.</option>
        <option value="6">VI. kerület – Podmaniczky utca 63.</option>
        <option value="7">VII. kerület – Rottenbiller utca 25.</option>
        <option value="8">VIII. kerület – Könyves Kálmán körút 52.</option>
        <option value="9">IX. kerület – Haller utca 89.</option>
        <option value="10">X. kerület – Gyömrői út 50.</option>
        <option value="11">XI. kerület – Szerémi út 67.</option>
        <option value="12">XII. kerület – Böszörményi út 38.</option>
        <option value="13">XIII. kerület – Váci út 152.</option>
        <option value="14">XIV. kerület – Fogarasi út 45.</option>
        <option value="15">XV. kerület – Károlyi Sándor út 76.</option>
        <option value="16">XVI. kerület – Rákosi út 88.</option>
        <option value="17">XVII. kerület – Pesti út 237.</option>
        <option value="18">XVIII. kerület – Üllői út 780.</option>
        <option value="19">XIX. kerület – Ady Endre út 134.</option>
        <option value="20">XX. kerület – Kossuth Lajos utca 120.</option>
        <option value="21">XXI. kerület – Szállító utca 6.</option>
        <option value="22">XXII. kerület – Nagytétényi út 190.</option>
        <option value="23">XXIII. kerület – Haraszti út 42.</option>
    </select>
</div>



<div class="containerLoc">
    <div id="map-container">
        <iframe id="terkep" class="my-3" src="" width="98%" height="450" style="border:0;" allowfullscreen="true"
            loading="eager" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>


@endsection

@extends('layouts.footer')