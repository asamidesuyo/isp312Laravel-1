<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function login(LoginRequest $request) {
        $data = $request->validated();
//        dd($data);

        if (Auth::attempt($data)) {
            //Пользователь авторизован
            return redirect()->route("profile.index");
        } else {
            // Отправлен неверный логин или пароль
            return redirect()->back()->withErrors([
                "email" => " ",
                "password" => "Неверный логин или пароль!"
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("login.index");
    }
}
