<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:users,name'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'stock' => ['required', 'integer'],
            'price' => ['required', 'integer'],
        ];
    }
}
