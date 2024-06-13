<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string', 'unique:users,name'],
            'category_id' => ['integer', 'exists:categories,id'],
            'stock' => ['integer'],
            'price' => ['integer'],
        ];
    }
}
