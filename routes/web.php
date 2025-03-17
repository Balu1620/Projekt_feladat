<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MotorcycleController;
use App\Http\Controllers\ToolController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get("/motors", [MotorcycleController::class, "index"])->name("motors.index");

Route::get("/motors/{motor}", [MotorcycleController::class, "show"])->name("motors.show");

Route::get('motors/{motor}/tools', [ToolController::class, 'index'])->name('tools.index');

Route::get('motors/{motor}/tools/summary_page', [MotorcycleController::class, 'showData'])->name('pages.summary_page');


//Route::get("/tools", [ToolController::class, "index"])->name("tools.index");

Route::get("/tools/{tool}", [ToolController::class, "show"])->name("tools.show");

Route::get('/about', function () {return view('about');})->name('about');

Route::get('/location', function () {return view('location');})->name('location');

Route::get('/privacy', function () {return view('layouts.privacy');})->name('privacy');

Route::get('/termsOfUse', function () {return view('layouts.termsOfUse');})->name('termsOfUse');

//Route::get('/summary_page', function() {return view('pages.summary_page');})->name('summary_page');

Route::post('motors/{motor}/tools/summary_page/final_page', [MotorcycleController::class, 'store'])->name('pages.final_page');



