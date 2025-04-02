<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MotorcycleAPIController;
use App\Http\Controllers\UserController;
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
Route::put('retrieveData/{loan}/{motorcycle}', [MotorcycleAPIController::class, 'MotorRetrieveUpdate']);
Route::put('receiptMotorData/{motorcycle}', [MotorcycleAPIController::class, 'MotorReceiptUpdate']);

//Route::get('/user/{user}', [MotorcycleAPIController::class, 'Getuser']);
Route::get('/logs', [MotorcycleAPIController::class, 'AllLogindex']);

Route::post('/admins', [MotorcycleAPIController::class, 'StoreAdmin']);
Route::put('/admins/{admin}', [MotorcycleAPIController::class, 'UpdateAdmin']);

Route::delete('/DeactiveAdmins/{admin}', [MotorcycleAPIController::class, 'DeactiveAdmin']);

Route::get('/allUsers', [MotorcycleAPIController::class, 'AllUseres']);

Route::put('/user/{user}', [MotorcycleAPIController::class, 'DriLicRealSetUpUseres']);