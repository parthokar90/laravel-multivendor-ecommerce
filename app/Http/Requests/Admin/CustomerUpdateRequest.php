<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $customerId = $this->route('customer'); 

        return [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'nullable|string|max:255',
            'email'      => 'required|email|unique:customers,email,' . $customerId,
            'password'   => 'nullable|string|min:6',
            'mobile'     => 'required|string|max:20',
            'address'    => 'nullable|string',
            'status'     => 'required|in:0,1',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
}