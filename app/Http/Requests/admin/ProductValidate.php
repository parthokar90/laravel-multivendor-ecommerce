<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidate extends FormRequest
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
            'product_name'=>'required',
            'short_description'=>'required',
            'long_description'=>'required',
            'image'=>'required',
            'brand_id'=>'required',
            'shop_id'=>'required',
            'category_id'=>'required',
            
        ];
    }

    public function messages()
    {
        return [
            'product_name.required'=>'Please Enter product Name',
            'short_description.required'=>'Please Enter short description',
            'long_description.required'=>'Please Enter long description',
            'image.required'=>'Please select image',
            'brand_id.required'=>'Please select Brand',
            'shop_id.required'=>'Please select Shop',
            'category_id.required'=>'Please select Category',
        ];
    }
}
