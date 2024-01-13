<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/register', [AuthController::class, 'registration']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/me', [AuthController::class, 'me']);
    Route::post('/refresh', [AuthController::class, 'refresh']);

//    Route::middleware('ability:protected_level:one,protected_level:two,protected_level:three')
//        ->get('/protected-one', [ProtectedController::class, 'protectedOneLevel']);
//    Route::middleware('ability:protected_level:two,protected_level:three')
//        ->get('/protected-two', [ProtectedController::class, 'protectedTwoLevel']);
//    Route::middleware('ability:protected_level:two,protected_level:three')
//        ->get('/protected-three', [ProtectedController::class, 'protectedThreeLevel']);
});
