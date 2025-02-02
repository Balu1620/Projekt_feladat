<?php

use App\Http\Controllers\MotorcycleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/motors', MotorcycleController::class);

Route::get('/about', function () {return view('about');})->name('about');

Route::get('/location', function () {return view('location');})->name('location');