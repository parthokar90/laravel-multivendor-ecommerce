<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidate extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'product_name'      => 'required|string|max:255',
            'quantity'          => 'required|integer|min:0',
            'alert_quantity'    => 'required|integer|min:0',
            'regular_price'     => 'required|numeric|min:0',
            'sale_price'        => 'nullable|numeric|min:0',
            'cost_price'        => 'required|numeric|min:0',
            'image'             => $isUpdate ? 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048' : 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_featured'       => 'required|in:0,1',
            'stock_status'      => 'required|string',
            'brand_id'          => 'required|integer',
            'shop_id'           => 'required|integer',
            'short_description' => 'nullable|string',
            'long_description'  => 'nullable|string',
            'tag'               => 'nullable|string',
            'category_id'       => 'required|array',
            'category_id.*'     => 'required|integer',

            'type_id'           => 'nullable|array',
            'type_id.*'         => 'required|integer',
            'value_id'          => 'nullable|array',
            'value_id.*'        => 'required|integer',
            'att_qty'           => 'nullable|array',
            'att_qty.*'         => 'required|integer|min:0',
            'att_alert_qty'     => 'nullable|array',
            'att_alert_qty.*'   => 'required|integer|min:0',
            'att_sale_price'    => 'nullable|array',
            'att_sale_price.*'  => 'required|numeric|min:0',
            'att_image'         => 'nullable|array',
            'att_image.*'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
}
