<?php

namespace App\Http\Requests\Backend\Product;


use App\Core\Abstracts\RequestJSON;

/**
 * Class ChangeProductStatusRequest
 * @package App\Http\Requests\Backend\Product
 * @property string $id
 */
class ChangeProductStatusRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:products,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'   => 'The product whose data needs to be updated is not specified.',
            'id.exists'     => 'The selected Product is invalid.'
        ];
    }
}
