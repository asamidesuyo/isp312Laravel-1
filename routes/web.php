<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\NotAdmin;
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

    Route::middleware(NotAdmin::class)->prefix('/orders')->name("orders.")->group(function () {
        Route::get('/', [OrderController::class, "index"])->name("index");
        Route::get('/destroy/{order}', [OrderController::class, "destroy"])->whereNumber("order")->name("destroy");
        Route::get('/create', [OrderController::class, "create"])->name("create");
        Route::post("/create", [OrderController::class, "store"])->name("store");
        Route::get('/{order}', [OrderController::class, "show"])->whereNumber("order")->name("show");
    });

    Route::middleware(Admin::class)->prefix("/admin")->name("admin.")->group(function () {
        Route::get("/orders", [AdminController::class, "index"])->name("orders.index");
        Route::get("/orders/destroy/{order}", [AdminController::class, "destroy"])->whereNumber("order")->name("orders.destroy");
        Route::get("/orders/edit/{order}", [AdminController::class, "edit"])->whereNumber("order")->name("orders.edit");
    });
});



