<?php

use App\Http\Controllers\MotorcycleAPIController;
use App\Http\Controllers\MotorcycleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/motors', MotorcycleController::class);

Route::get('/about', function () {return view('about');})->name('about');

Route::get('/location', function () {return view('location');})->name('location');

Route::get('/privacy', function () {return view('layouts.privacy');})->name('privacy');

Route::get('/termsOfUse', function () {return view('layouts.termsOfUse');})->name('termsOfUse');

Route::apiResource("/apiMotorcycle", MotorcycleAPIController::class);