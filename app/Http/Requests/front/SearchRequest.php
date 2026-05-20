<?php

namespace App\Http\Requests\front;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => ['nullable', 'string', 'max:255'],
            'cat_id' => ['nullable', 'integer', 'exists:product_categories,id'],
        ];
    }
}