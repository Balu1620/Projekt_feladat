@section("footer")
    <footer class="lent">
        <div class="mt-5 ">
            <div class="cell text-white text-center text-lg-start bg-dark">
                <div class="container p-4">
                    <div class="row mt-2 justify-content-evenly">
                        <div class="col-lg-4 col-md-6 mb-4 mb-md-0 mt-4">
                            <h5 class="text-uppercase mb-4 pb-1 text-center ">Linkek</h5>
                            <ul class="fa-ul link" style="margin-left: 1.65em;">
                                <li class="mb-3 text-start">
                                    <span class="fa-li"><i class="bi bi-house-door-fill"></i></span>
                                    <a href="/">Kezdőlap</a>
                                </li>
                                <li class="mb-3 text-start">
                                    <span class="fa-li"><i class="bi bi-person-lines-fill"></i></span>
                                    <a href="{{route('about')}}">Rólunk</a>
                                </li>
                                <li class="mb-3 text-start">
                                    <span class="fa-li"><i class="bi bi-lock-fill"></i></span>
                                    <a href="{{route('privacy')}}">Adatvédelem</a>
                                </li>
                                <li class="mb-3 text-start">
                                    <span class="fa-li"><i class="bi bi-file-earmark-person-fill"></i></span>
                                    <a href="{{route('termsOfUse')}}">Felhasználási feltételek</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4 mb-md-0 search">
                            <h5 class="text-uppercase mb-4 pb-1 text-center">Elérhetőségek</h5>
                            <ul class="fa-ul link" style="margin-left: 1.65em;">
                                <li class="mb-3 text-start">
                                    <span class="fa-li"><i class="bi bi-geo-alt-fill"></i></span>
                                    <span class="ms-2">1051 Budapest, Deák Ferenc tér 3.</span>
                                </li>
                                <li class="mb-3 text-start">
                                    <span class="fa-li"><i class="bi bi-envelope-at-fill"></i></span>
                                    <a href="mailto:motorrentalproject@gmail.com">
                                        <span class="ms-2">motorrentalproject@gmail.com</span>
                                    </a>
                                </li>
                                <li class="mb-3 text-start">
                                    <span class="fa-li"><i class="bi bi-telephone-fill"></i></span>
                                    <a href="tel:+3670234567"><span class="ms-2">+36 70 234 567</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4 mb-md-0 opening">
                            <h5 class="text-uppercase mb-4 text-center">Nyitvatartási idő</h5>
                            <table class="table text-center text-white">
                                <tbody>
                                    <tr>
                                        <td>Hétfő - Péntek:</td>
                                        <td>7:00 - 21:00</td>
                                    </tr>
                                    <tr>
                                        <td>Szombat - Vasárnap:</td>
                                        <td>8:00 - 17:00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="text-end p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    <p>dsds</p>
                </div>
            </div>
        </div>
    </footer>

@endsection