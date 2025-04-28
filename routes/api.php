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



Route::get('/usersData', [MotorcycleAPIController::class, 'index']);
Route::put('/retrieveData/{loan}/{motorcycle}', [MotorcycleAPIController::class, 'MotorRetrieveUpdate']);
Route::put('/receiptMotorData/{motorcycle}', [MotorcycleAPIController::class, 'MotorUpdate']);

Route::get('/logs', [MotorcycleAPIController::class, 'AllLogindex']);

Route::post('/admins', [MotorcycleAPIController::class, 'StoreAdmin']);
Route::put('/admins/{admin}', [MotorcycleAPIController::class, 'UpdateAdmin']);

Route::put('/DeactiveAdmin/{admin}', [MotorcycleAPIController::class, 'DeactiveAdmin']);

Route::put('/RestoreAdmin/{admin}', [MotorcycleAPIController::class, 'ReStoreAdmin']);


Route::get('/allUsers', [MotorcycleAPIController::class, 'AllUseres']);

Route::put('/user/{user}', [MotorcycleAPIController::class, 'DriLicRealSetUpUseres']);



//Route::get('/motorInServices', [MotorcycleAPIController::class, 'allMotorSearchInService']);

Route::get('/allMotors', [MotorcycleAPIController::class, 'indexMotors']);

Route::put('/UpdatesMotor/{motorcycle}', [MotorcycleAPIController::class, 'MotorUpdate']);

Route::post('/AddMotor', [MotorcycleAPIController::class, 'store']);

Route::delete('/DeleteMotor/{motorcycle}', [MotorcycleAPIController::class, 'MotorDelete']);

//Route::get('/AllMotorsPhoto', [MotorcycleAPIController::class, "AllMotorPhotos"]);

//React
Route::get('/userProfile/{userId}', [MotorcycleAPIController::class, 'ReactShowLoans']);

Route::delete('delete-order/{ordersId}', [MotorcycleAPIController::class, 'LoansDelete']);

Route::put('{ordersId}/add-tool/', [MotorcycleAPIController::class, 'ReactToolAddToOrder']);

Route::delete('tools/{tool}', [MotorcycleAPIController::class, 'ReactDestroyTool']);

Route::post('login', [MotorcycleAPIController::class, 'login']); 

Route::get('/motorcycles', [MotorcycleAPIController::class, 'Motorindex']); //


Route::middleware('auth:sanctum')->get('/userProfile', function () {
    return response()->json([
        'user' => Auth::user(),
    ]);
});
