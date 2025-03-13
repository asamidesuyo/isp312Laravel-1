<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "fio" => "required|string",
//        "fio" => ["required", "string"],
            "email" => "required|email:rfc|unique:App\Models\User,email",
            "birthday" => "required|date_format:Y-m-d",
//            "password" => ["required", "string", "confirmed", Password::min(4)->letters()->numbers()->uncompromised()],
            "password" => "required|string|confirmed",
            "password_confirmation" => "required|string"
        ];
    }

    public function attributes(): array
    {
        return [
            "fio" => "ФИО"
        ];
    }
}
