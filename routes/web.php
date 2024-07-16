<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* authentification's route */
Route::get("/login",[AuthController::class, "create"])->name("login");
Route::post("/login",[AuthController::class, "store"])->name("login");
Route::delete("/logout",[AuthController::class, "destroy"])->name("logout");

Route::get("/register",[UserAccountController::class, "create"])->name("register");
Route::post("/register",[UserAccountController::class, "store"])->name("register");

Route::get("/reset",[PasswordController::class, "create"])->name("reset");
Route::post("/reset",[PasswordController::class, "store"])->name("reset");


Route::get("/dashboard",[DashboardController::class, "home"])->name("dashboard");

Route::middleware(['auth'])->group(function () {
  Route::get('/profile', [UserAccountController::class, 'show'])->name('profile');
  Route::put('/profile', [UserAccountController::class, 'update'])->name('profile.update');
  Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
  Route::resource("user", UserController::class);
  Route::resource("service", ServiceController::class);
  Route::post("/service/buy",[ServiceController::class, "buy"])->name("service.buy");
});


