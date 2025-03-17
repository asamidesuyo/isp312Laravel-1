<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "password_old" => "required|string|current_password",
            "password" => "required|string|confirmed",
            "password_confirmation" => "required|string"
        ];
    }

    public function attributes()
    {
        return [
            "password_old" => "текущий пароль"
        ];
    }
}
