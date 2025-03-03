@extends('layouts.header')

@section('content')

    <div class="container">
        <form action="" method="get">

            <div class="x-flex justify-center">
                <div id="myDateRangePickerDisabledDates" data-coreui-footer="true" data-coreui-locale="hu" data-coreui-toggle="date-range-picker">
                </div>
            </div>

            <br>

            <div class="table-responsive">
                <table class="table table-danger">
                    <tbody>
                        <tr class="text-center">
                            <td>
                                Sisakok:
                            </td>
                            <td>
                                <div>
                                    <select name="sisakdb" id="sisakdb" onchange="sisakmeret(value)">
                                        <option value="" disabled selected>Darabszám</option>
                                        <option value="0">0 db</option>
                                        <option value="1">1 db</option>
                                        <option value="2">2 db</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div id="Ssize">

                                </div>
                            </td>
                        </tr>

                        <tr class="text-center">
                            <td>Protektoros ruhák</td>
                            <td>
                                <div>
                                    <select name="ruhadb" id="ruhadb" onchange="ruhameret(value)">
                                        <option value="" disabled selected>Darabszám</option>
                                        <option value="0">0 db</option>
                                        <option value="1">1 db</option>
                                        <option value="2">2 db</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div id="Rsize">

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href={{ route("pages.summary_page", ['motor' => $motor->id]) }}><button type="button" class="btn btn-outline-secondary">Tovább</button></a>
        </form>
    </div>

@endsection
@extends('layouts.footer')