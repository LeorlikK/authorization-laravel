<?php

use App\Http\Controllers\ProtectedController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function (){
    return view('main');
});
//Route::get('/register', function () {
//    return view('auth.register');
//});
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/protected-one', [ProtectedController::class, 'protectedOneLevel'])->name('protected.one');
    Route::get('/protected-two', [ProtectedController::class, 'protectedOTwoLevel'])->name('protected.two');
    Route::get('/protected-three', [ProtectedController::class, 'protectedThreeLevel'])->name('protected.three');
});
