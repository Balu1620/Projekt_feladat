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
        <div class="hidden md:block w-20 step-line mx-3"></div>

        <div class="flex flex-col items-center mx-3">
            <div class="step-circle">
                ✓
            </div>
            <span class="mt-2 step-title">2. lépés</span>
            <p class="step-description">Motor adatok</p>
        </div>

        <div class="hidden md:block w-20 step-line mx-3"></div>

        <div class="flex flex-col items-center mx-3">
            <div class="step-circle-no">
                ?
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

    <div class="container toolssz">
        <form action="{{ route('pages.summary_page', ['motor' => $motor->id]) }}" method="GET">

            <div class="x-flex justify-center">
                <div id="myDateRangePickerDisabledDates" data-coreui-footer="true" data-coreui-locale="hu"
                    data-coreui-toggle="date-range-picker">
                </div>
            </div>

            <script>
                // A Blade-beállítások átadása JavaScript-nek
                window.bookedDates = @json($bookedDates);
            </script>


            <br>

            <div class="container">
                <div class="table-responsive">
                    <table class="table table-danger">
                        <tbody>

                            <tr class="text-center">
                                <td class="firstcolum">Sisakok:</td>
                                <td class="lastcolum">
                                    <div>
                                        <select name="sisakdb" id="sisakdb" onchange="updateSisakMeret()">
                                            <option value="" disabled selected>Darabszám</option>
                                            <option value="0">0 db</option>
                                            <option value="1">1 db</option>
                                            <option value="2">2 db</option>
                                        </select>
                                    </div>
                                </td>
                                <td id="Ssize" class="flex flex-row justify-around">
                                    <!-- Előre feltöltött select mezők -->
                                    <select name="sisakmeret[0]" class="size-select" disabled>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="2XL">2XL</option>
                                    </select>
                                    <select name="sisakmeret[1]" class="size-select" disabled>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="2XL">2XL</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="spacer">
                                <td colspan="3"></td>
                            </tr> <!-- Üres hely -->
                            <tr class="text-center">
                                <td class="firstcolum">Protektoros ruhák</td>
                                <td class="lastcolum">
                                    <div>
                                        <select name="ruhadb" id="ruhadb" onchange="updateRuhaMeret()">
                                            <option value="" disabled selected>Darabszám</option>
                                            <option value="0">0 db</option>
                                            <option value="1">1 db</option>
                                            <option value="2">2 db</option>
                                        </select>
                                    </div>
                                </td>
                                <td id="Rsize" class="flex flex-row justify-around">
                                    <!-- Előre feltöltött select mezők -->
                                    <select name="ruhameret[0]" class="size-select" disabled>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="2XL">2XL</option>
                                    </select>
                                    <select name="ruhameret[1]" class="size-select" disabled>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="2XL">2XL</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="spacer">
                                <td colspan="3"></td>
                            </tr> <!-- Üres hely -->
                            <tr class="text-center">
                                <td class="firstcolum">Cipő</td>
                                <td class="lastcolum">
                                    <div>
                                        <select name="cipodb" id="cipodb" onchange="updateCipoMeret()">
                                            <option value="" disabled selected>Darabszám</option>
                                            <option value="0">0 db/pár</option>
                                            <option value="1">1 db/pár</option>
                                            <option value="2">2 db/pár</option>
                                        </select>
                                    </div>
                                </td>
                                <td id="Csize" class="flex flex-row justify-around">
                                    <!-- Előre feltöltött select mezők -->
                                    <select name="cipomeret[0]" class="size-select" disabled>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                    </select>
                                    <select name="cipomeret[1]" class="size-select" disabled>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-secondary">Tovább</button>
        </form>
    </div>

@endsection

@extends('layouts.footer')