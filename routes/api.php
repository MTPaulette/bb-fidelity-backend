<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/user', function (Request $request){
    return 'je suis dans le back  de test-brain';
});


/* authentification's route */
Route::post("/login",[AuthController::class, "store"])->name("login");
Route::delete("/logout",[AuthController::class, "destroy"])->name("logout");
Route::post("/register",[UserAccountController::class, "store"])->name("register");

Route::post("/reset",[PasswordController::class, "store"])->name("reset");
Route::put('/profile', [UserAccountController::class, 'update'])->name('profile.update');
Route::put('/password', [PasswordController::class, 'update'])->name('password.update');


Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/user/{user}', [UserController::class, 'show'])->name('user');
Route::get('/service/{service}', [ServiceController::class, 'show'])->name('service');
Route::put("/updatePoint",[UserController::class, "update"])->name("update.point");

// http://127.0.0.1:8000/api/register?email=mayogue@test.com&name=mayogue&password=123456789&confirm_password=123456789