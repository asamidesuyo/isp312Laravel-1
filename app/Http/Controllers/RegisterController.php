<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function create(RegisterRequest $request)
    {
//        dd($request->fio);
//        dd($request->all());
//        $data = $request->only(["fio", "email", "birthday", "password"]);
//        $data = $request->except(["password_confirmation"]);

//        $user = User::create($data);
        $user = User::create([
            "fio" => $request->fio,
            "email" => $request->email,
            "birthday" => $request->birthday,
            "password" => $request->password
        ]);

        if($user) {
            return redirect()->route("login.index");
        } else {
            abort(400);
        }
    }
}
