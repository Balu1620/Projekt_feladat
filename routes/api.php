<?php

use App\Http\Controllers\MotorcycleAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

//Route::apiResource("/apiMotorcycle", MotorcycleAPIController::class);
/*
Route::post("/proba", function(){
    return response()->json();
});*/

Route::get('usersData', [MotorcycleAPIController::class, 'index']);
Route::put('usersData/{loan}', [MotorcycleAPIController::class, 'update']);
