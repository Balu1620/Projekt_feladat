@extends('layouts.header')

@section('content')
<body style="background-image: url('/storage/img/Hatter.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;"></body>
    <div class="container mt-4" >
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                <div class="card" style="height: 100%">
                    <div class="card-header text-center bg-primary text-white" id="regist-login-Header">{{ __('Bejelentkezés') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <div class="form-floating">
                                    <input placeholder="" id="floatingInput" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label for="floatingInput">{{ __('Email Address') }}</label>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-floating">
                                    <input placeholder="" id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    <label for="password">{{ __('Password') }}</label>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-12 d-flex justify-content-between">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-dark" href="{{ route('password.request') }}">
                                            {{ __('Elfelejtett jelszó') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-12 text-center">
                                    <button type="submit" id="LoginBtn" class="btn btn-white-100 border-3 border-dark w-40">{{ __('Bejelentkezés') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>
@endsection