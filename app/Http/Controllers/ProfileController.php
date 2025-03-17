<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
//        return view("profile", [
//            "user" => $user
//        ]);
        return view("profile", compact('user'));
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
//        $user = Auth::user();
//        $user->password = $request->password;
//        if($user->save()) {
//            return redirect()->back();
//        } else {
//            return redirect()->back()->withErrors([
//                "password_old" => " ",
//                "password" => " ",
//                "password_confirmation" => "Произошла ошибка!"
//            ]);
//        }
        $user_id = Auth::id();
//        $user = User::where("id", ">", $user_id)->where("id", "<", 1234)
        $user = User::where("id", "=", $user_id)->update([
            "password" => Hash::make($request->password)
        ]);

        if($user) {
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors([
                "password_old" => " ",
                "password" => " ",
                "password_confirmation" => "Произошла ошибка!"
            ]);
        }
    }
}
