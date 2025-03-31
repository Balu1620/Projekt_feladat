@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="height: 600px;">
                <div class="card-header text-center">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="text-danger" id="emailErrors" style="display: none;"></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="strength-bar">
                                    <div class="bar" id="strength-bar"></div>
                                </div>
                                <small id="strength-text"></small>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="phoneNumber" class="col-md-4 col-form-label text-md-end">Telefonszám</label>
                            <div class="col-md-6">
                                <input id="phoneNumber" type="text" class="form-control @error('phoneNumber') is-invalid @enderror"
                                    name="phoneNumber" value="{{ old('phoneNumber') }}" required>
                                @error('phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="drivingLicenceNumber" class="col-md-4 col-form-label text-md-end">Jogosítvány azonosító</label>
                            <div class="col-md-6">
                                <input id="drivingLicenceNumber" maxlength="8" type="text" class="form-control @error('drivingLicenceNumber') is-invalid @enderror"
                                    name="drivingLicenceNumber" value="{{ old('drivingLicenceNumber') }}" required>
                                @error('drivingLicenceNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="drivingLicenceType" class="col-md-4 col-form-label text-md-end">Jogosítvány kategóriák</label>
                            <div class="col-md-6">
                                <select name="drivingLicenceType" id="drivingLicenceType" class="form-control @error('drivingLicenceType') is-invalid @enderror" required>
                                    <option selected disabled value="">Válassz kategóriát</option>
                                    <option value="AM">AM</option>
                                    <option value="A">A</option>
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                    <option value="B">B</option>
                                </select>
                                @error('drivingLicenceType')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="drivingLicenceImage" class="col-md-4 col-form-label text-md-end">Jogosítvány elöl</label>
                            <div class="col-md-6">
                                <input id="drivingLicenceImage" type="file" class="form-control @error('drivingLicenceImage') is-invalid @enderror"
                                    name="drivingLicenceImage" required>
                                @error('drivingLicenceImage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="drivingLicenceImageBack" class="col-md-4 col-form-label text-md-end">Jogosítvány hátul</label>
                            <div class="col-md-6">
                                <input id="drivingLicenceImageBack" type="file" class="form-control @error('drivingLicenceImageBack') is-invalid @enderror"
                                    name="drivingLicenceImageBack" required>
                                @error('drivingLicenceImageBack')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
@endsection