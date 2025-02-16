@extends('layouts.header')

@section('content')

    <div class="container">
        <form action="" method="get">
            <div class="table-responsive">
                <table>
                    <tbody>
                        <tr class="">
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
                                        <option value="3">3 db</option>
                                        <option value="4">4 db</option>
                                        <option value="5">5 db</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div id="Ssize">

                                </div>
                            </td>
                        </tr>
                        <tr class="">
                            <td>Protektoros ruhák</td>
                            <td>
                                <div>
                                    <select name="" id="">
                                        <option value="0">0 db</option>
                                        <option value="1">1 db</option>
                                        <option value="2">2 db</option>
                                        <option value="3">3 db</option>
                                        <option value="4">4 db</option>
                                        <option value="5">5 db</option>
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

        </form>
    </div>

@endsection
@extends('layouts.footer')