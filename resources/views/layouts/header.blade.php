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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

	<link href="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.10.0/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-iFYnumxmAfPWEvBBHVgQ1pcH7Bj9XLrhznQ6DpVFtF3dGwlEAqe4cmd4NY4cJALM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.10.0/dist/js/coreui.bundle.min.js" integrity="sha384-vaeoe43yarg/Wh3n+r4/PYyWggBr7VzI5l/1UeGOtIN4cgSvWlyBeZ7DlBEukNeq" crossorigin="anonymous"></script>
	
  


    <script src="{{ asset('js/locationPage.js' ) }} " defer></script>
	<script src="{{ asset('js/mainPageTimeline.js') }}" defer></script>
	<script src="{{ asset('js/tools.js') }}" defer></script>
	<script src="{{ asset('js/calendar.js') }}" defer></script>
	<script src="{{ asset('js/registPage.js') }}" defer></script>
	
    <!-- Scripts -->
    @vite([
    'resources/sass/app.scss',
    'resources/js/app.js',
    'public/css/header.css',
    'public/css/mainPage.css',
    'public/css/mainPageResponseTimeLime.css',
    'public/css/mainPageResponseCardsAndP_W.css',
    'public/css/mainPageFooter.css',
    'public/css/regist.css',
    'public/css/motor.css',
    'public/css/about.css',
    'public/css/motorAbout.css',
    'resources/css/app.css',	
	'public/css/Terms.css',
	'public/css/privacy.css',
	'public/css/location.css',
	'public/css/tools.css',
  'public/css/loan.css',
  'public/css/finalPage.css',
  'public/css/userProfile.css',
])

</head>

<body style="background-image: url('/storage/img/Background1.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
<nav class="bg-white-900 text-white shadow-md">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <!-- Bal oldali elem: mobil menü gomb -->
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-white hover:bg-blue-900 focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset bg-blue-700 border-2 border-blue-700 shadow-md transition duration-300" onclick="toggleMobileMenu()" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Nyisd ki</span>
          <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      
      <!-- Középen a logo -->
      <div class="flex flex-1 items-center justify-between">
        <img class="h-8 w-auto hidden sm:block" src="{{ asset('storage/img/logo.png') }}" alt="Your Company">
        <div class="hidden sm:block w-full">
          <div class="flex justify-evenly items-center">
            <a href="/" class="nav-link"><p>Főoldal</p></a>
            <a href="{{ route('motors.index') }}" class="nav-link"><p>Motorok</p></a>
            <a href="{{ route('location') }}" class="nav-link"><p>Helyszínek</p></a>
            <a href="{{ route('about') }}" class="nav-link"><p>Rólunk</p></a>
          </div>
        </div>  
      </div>

      <div class="flex items-center space-x-4 ">
    <div class="hidden sm:block">
        <a href="https://www.instagram.com" target="_blank" class="text-gray-500 hover:text-pink-500 transition duration-300 ease-in-out">
            <i class="fab fa-instagram fa-lg"></i>
        </a>
        
        
    </div>
    <div class="hidden sm:block">     
        <a href="https://www.facebook.com" target="_blank" class="text-gray-500 hover:text-blue-500 transition duration-300 ease-in-out">
            <i class="fab fa-facebook fa-lg"></i>
        </a>     
    </div>
    <div class="hidden sm:block">     
      <a href="https://www.twitter.com" target="_blank" class="text-gray-500 hover:text-sky-500 transition duration-300 ease-in-out">
            <i class="fab fa-twitter fa-lg"></i>
        </a>   
    </div>

      <!-- Jobb oldali elem: értesítés és profil -->
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        @auth
          <h2 class="text-white mr-3">Szia! {{auth()->user()->name}}</h2>
        @endauth
        @guest
          <h2 class="text-white mr-3"></h2>
        @endguest
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu"> 
          <li class="nav-item dropdown">
            <a class="dropdown-toggle"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="profile-pic">
                  <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="Profile Picture" class="rounded-full border border-white">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              @guest
              <li><a class="dropdown-item" href="{{ route('login') }}"><i class="bi bi-person-circle"></i> Bejelentkezés</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}"><i class="bi bi-person-add"></i> Regisztráció</a></li>
              @endguest
              @auth
              <li><a class="dropdown-item" href="{{ route('userProfile') }}"><i class="fas fa-cog fa-fw"></i> Profil</a></li> 
              <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-fw"></i> Kijelentkezés</a></li> 
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
              @endauth
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
  
  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pt-2 pb-3">
      <a href="/" class="block rounded-md px-3 py-2 text-base font-medium">Főoldal</a>
      <a href="{{ route('motors.index') }}" class="block rounded-md px-3 py-2 text-base font-medium">Motorok</a>
      <a href="{{ route('location') }}" class="block rounded-md px-3 py-2 text-base font-medium">Helyszínek</a>
      <a href="{{ route('about') }}" class="block rounded-md px-3 py-2 text-base font-medium">Rólunk</a>
         </div>
  </div>
</nav>


@if (auth()->check() && !auth()->user()->email_verified_at)
    <div style="background-color: #ffc107; color: #000; padding: 10px; text-align: center;">
        <p>
            Az email-címed még nincs megerősítve! 
            <form method="POST" action="{{ route('verification.send') }}" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: #007bff; text-decoration: underline; cursor: pointer;">
                    Kattints ide az újraküldéshez
                </button>
            </form>
        </p>
    </div>
@endif


	
    <main class="mt-4">
        @yield('content')
    </main>
    <footer>
        @yield('footer')
    </footer>
</body>


</html>