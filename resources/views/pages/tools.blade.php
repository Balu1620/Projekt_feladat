@extends('layouts.header')

@section('content')

<div class="container">
    <form action="{{ route('pages.summary_page', ['motor' => $motor->id]) }}" method="GET">

        <div class="x-flex justify-center">
            <div id="myDateRangePickerDisabledDates" data-coreui-footer="true" data-coreui-locale="hu" data-coreui-toggle="date-range-picker">
            </div>
        </div>
        <br>
     
        <div class="table-responsive">
            <table class="table table-danger">
                <tbody>
                    
                    <tr class="text-center">
                        <td>Sisakok:</td>
                        <td>
                            <div>
                                <select name="sisakdb" id="sisakdb" onchange="sisakmeret()">
                                    <option value="" disabled selected>Darabszám</option>
                                    <option value="0">0 db</option>
                                    <option value="1">1 db</option>
                                    <option value="2">2 db</option>
                                </select>
                            </div>
                        </td>
                        <td id="Ssize" style="display: none" class="flex flex-row">     
                        </td>
                    </tr>

                    
                    <tr class="text-center">
                        <td>Protektoros ruhák</td>
                        <td>
                            <div>
                                <select name="ruhadb" id="ruhadb" onchange="ruhameret()">
                                    <option value="" disabled selected>Darabszám</option>
                                    <option value="0">0 db</option>
                                    <option value="1">1 db</option>
                                    <option value="2">2 db</option>
                                </select>
                            </div>
                        </td>
                        <td id="Rsize" style="display: none" class="flex flex-row">                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
       
        <button type="submit" class="btn btn-outline-secondary">Tovább</button>
    </form>
</div>

@endsection

@extends('layouts.footer')
