<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <script src="{{ asset('js/mainPageTimeline.js') }}"></script> 

    <!-- Scripts -->
    @vite([
    'resources/sass/app.scss',
    'resources/js/app.js',
    'public/css/headerPage.css',
    'public/css/header.css',
    'public/css/mainPage.css',
    'public/css/mainPageResponseTimeLime.css',
    'public/css/mainPageResponseCardsAndP_W.css',
    'public/css/mainPageFooter.css',
    'public/css/regist.css'
])

</head>

<body>
    <header id="header">
        <nav class="navbar navbar-dark bg-dark fixed-top" data-bs-theme="dark">
            <div class="container-fluid">
                <div class="d-flex">
                    <a class="navbar-brand" href="/">
                        <img src="kepek/kep.jpg" alt="" width="80" height="40">
                    </a>
                    @auth
                        <h2 style="color:red; padding-top:5px;">User {{ auth()->user()->name }}</h2>
                    @endauth
                    @guest
                        <h2 style="color:white; padding-top:5px;"></h2>
                    @endguest
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end menu" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                            @auth
                                Menü'Simon
                            @endauth
                            @guest
                                Menü
                            @endguest
                        </h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Főoldal</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="{{ route('motors') }}">Motorok</a>
                                    <hr class="dropdownHr">
                                    <a class="dropdown-item" href="{{ route('helyszin') }}">Helyszínek</a>
                                </div>
                            </li>
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endguest
                            @auth
                                <li>
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endauth
                            <hr>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about')}}">Rólunk</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="py-4 mt-5">
        @yield('content')
    </main>



    <footer class="">
        @yield('footer')
    </footer>



</body>

</html>