<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MotorcycleController;
use App\Http\Controllers\ToolController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');