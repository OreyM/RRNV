<?php

namespace App\Http\Requests\Backend\Product;


use App\Core\Abstracts\RequestJSON;

/**
 * Class ProductAliasRequest
 * @package App\Http\Requests\Backend\Product
 * @property string $alias
 */
class ProductAliasRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'alias' => ['string', 'max:256'],
        ];
    }

    public function messages(): array
    {
        return [

        ];
    }
}
