<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class VendorUpdateValidation extends FormRequest
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
            'email' => [
            'required',
            Rule::unique('vendors', 'email')->ignore($this->vendor->id)
            ],
            'mobile' => [
            'required',
            Rule::unique('vendors', 'mobile')->ignore($this->vendor->id)
            ],
            'shop_name' => ['required', '', '', '']
            ];
    }
}
