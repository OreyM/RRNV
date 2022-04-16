<?php


namespace App\Http\Requests\Backend\Product;


use App\Core\Abstracts\RequestJSON;

/**
 * Class DeleteProductRequest
 * @package App\Http\Requests\Backend\Product
 * @property string $id
 */
class DeleteProductRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:products,id'],
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Selected product is not defined.',
        ];
    }
}
