<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class VendorValidate extends FormRequest
{
        /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'=>'required',
            'last_name'=>'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:vendors'],
            'password' => ['required', 'string', 'min:8'],
            'mobile'=>['required', '', '', '', 'unique:vendors'],
            'shop_name' => ['required', '', '', '']
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'=>'Please Enter First Name',
            'last_name.required'=>'Please Enter Last Name',
        ];
    }
}
