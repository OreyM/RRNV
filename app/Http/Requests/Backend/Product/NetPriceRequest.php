<?php

namespace App\Http\Requests\Backend\Product;


use App\Core\Abstracts\RequestJSON;

/**
 * Class ProductAliasRequest
 * @package App\Http\Requests\Backend\Product
 * @property int $tax_rate_id
 * @property float $gross_price
 */
class NetPriceRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'tax_rate_id' => ['required', 'exists:tax_rates,id'],
            'gross_price' => ['required', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'tax_rate_id.exists' => 'Selected Tax Rate is not defined.',
            'gross_price' => 'Price must be in numbers.'
        ];
    }
}
