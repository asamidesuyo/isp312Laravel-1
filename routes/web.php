<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\User\LoginController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('index');
//});

Route::redirect('/', '/register');
Route::get('/register', [RegisterController::class, 'index'])->name("register.index");
Route::post('/register', [RegisterController::class, 'create'])->name("register.create");
