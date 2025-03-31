@extends('layouts.header')

@section('content')

    <body style="background-image: url('/storage/img/Hatter.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-lg border-0 rounded-lg h-100">

                        <div class="card-header text-center bg-primary text-white" id="regist-login-Header">
                            <h3>{{ __('Regisztráció') }}</h3>
                        </div>

                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf


                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autofocus>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required>
                                </div>


                                <div class="mb-3">
                                    <label for="phoneNumber" class="form-label">{{ __('Phone Number') }}</label>
                                    <input id="phoneNumber" type="text"
                                        class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber"
                                        value="{{ old('phoneNumber') }}" required>
                                    @error('phoneNumber')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="drivingLicenceNumber"
                                        class="form-label">{{ __('Driving Licence Number') }}</label>
                                    <input id="drivingLicenceNumber" maxlength="8" type="text"
                                        class="form-control @error('drivingLicenceNumber') is-invalid @enderror"
                                        name="drivingLicenceNumber" value="{{ old('drivingLicenceNumber') }}" required>
                                    @error('drivingLicenceNumber')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="drivingLicenceType"
                                        class="form-label">{{ __('Driving Licence Type') }}</label>
                                    <select name="drivingLicenceType" id="drivingLicenceType"
                                        class="form-control @error('drivingLicenceType') is-invalid @enderror" required>
                                        <option selected disabled value="">{{ __('Choose a Category') }}</option>
                                        <option value="AM">AM</option>
                                        <option value="A">A</option>
                                        <option value="A1">A1</option>
                                        <option value="A2">A2</option>
                                        <option value="B">B</option>
                                    </select>
                                    @error('drivingLicenceType')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="drivingLicenceImage"
                                        class="form-label">{{ __('Driving Licence Front Image') }}</label>
                                    <input id="drivingLicenceImage" type="file"
                                        class="form-control @error('drivingLicenceImage') is-invalid @enderror"
                                        name="drivingLicenceImage" required>
                                    @error('drivingLicenceImage')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="drivingLicenceImageBack"
                                        class="form-label">{{ __('Driving Licence Back Image') }}</label>
                                    <input id="drivingLicenceImageBack" type="file"
                                        class="form-control @error('drivingLicenceImageBack') is-invalid @enderror"
                                        name="drivingLicenceImageBack" required>
                                    @error('drivingLicenceImageBack')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="row mb-0">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-dark w-100 py-2">
                                            {{ __('Register') }}
                                        </button>
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