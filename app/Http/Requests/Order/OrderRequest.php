<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "category_id" => "required|integer|exists:categories,id",
            "description" => "required|string",
            "image" => "required|image|max:2048",
        ];
    }

    public function attributes(): array
    {
        return [
            "category_id" => "категория",
            "description" => "описание",
            "image" => "изображение"
        ];
    }
}
