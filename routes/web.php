<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('index');
//});

Route::redirect('/', '/register');

Route::middleware("guest")->group(function () {
    Route::prefix('/register')->name('register.')->group(function () {
        Route::get('/', [RegisterController::class, 'index'])->name("index");
        Route::post('/', [RegisterController::class, 'create'])->name("create");
    });

    Route::prefix('/login')->name("login.")->group(function () {
        Route::get('/', [LoginController::class, 'index'])->name("index");
        Route::post('/', [LoginController::class, 'login'])->name('login');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, "logout"])->name("login.logout");

    Route::prefix('/profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, "index"])->name("index");
        Route::post('/password/update', [ProfileController::class, "updatePassword"])->name("password.update");
    });

    Route::prefix('/orders')->name("orders.")->group(function () {
        Route::get('/', [OrderController::class, "index"])->name("index");
        Route::get('/destroy/{order}', [OrderController::class, "destroy"])->whereNumber("order")->name("destroy");
    });
});



