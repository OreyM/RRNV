<?php


namespace App\Http\Requests\Backend\Product;


use App\Core\Abstracts\RequestJSON;

class StoreProductRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'name'            => ['required', 'max:255', 'unique:products,name'],
            'alias'           => ['required', 'max:255', 'unique:products,alias'],
            'article'         => ['required', 'unique:products,article'],
            'description_id'  => ['numeric', 'exists:product_descriptions,id'],
            'quantity'        => ['required', 'numeric'],
            'stock_status_id' => ['required', 'exists:stock_statuses,id'],
            'image'           => [],
            'manufacturer_id' => ['required', 'exists:manufacturers,id'],
            'price'           => ['required'],
            'tax_rate_id'     => ['required', 'exists:tax_rates,id'],
            'reward_points'   => ['numeric'],
            'minimum'         => ['required', 'numeric'],
            'is_active'       => ['required', 'boolean'],
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
