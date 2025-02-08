@extends('layouts.header')

@section('content')
    <h1 id="Loch1">Telephelyek</h1>

<div class="containerLoc">
        <div id="SelectLoc" class="my-2 ms-5">
            <select name="keruletek" id="keruletek" onchange="valaszt(value)">
                <option value="..." selected disabled>Kerületek</option>
                <option value="1">I. kerület – Logodi utca 34.</option>
                <option value="2">II. kerület – Szépvölgyi út 109.</option>
                <option value="3">III. kerület – Bojtár utca 43.</option>
                <option value="4">IV. kerület – Megyeri út 20.</option>
                <option value="5">V. kerület – Vámház körút 15.</option>
                <option value="6">VI. kerület – Vörösmarty utca 18.</option>
                <option value="7">VII. kerület – Rottenbiller utca 25.</option>
                <option value="8">VIII. kerület – Könyves Kálmán körút 52.</option>
                <option value="9">IX. kerület – Haller utca 89.</option>
                <option value="10">X. kerület – Gyömrői út 50.</option>
                <option value="11">XI. kerület – Szerémi út 67.</option>
            </select>
        </div>

        <div id="map-container">
            <iframe id="terkep" class="mb-3" src="" width="90%" height="450" style="border:0;" allowfullscreen="true" loading="eager" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>


@endsection

@extends('layouts.footer')