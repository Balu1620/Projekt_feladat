<?php

use App\Http\Controllers\Motorcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/motors', [MotorController::class, 'index'])->name('motors');


Route::get('/about', [Motorcontroller::class, 'index'])->name('about');

Route::get('/helyszin', [Motorcontroller::class, 'index'])->name('helyszin');