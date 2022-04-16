<?php


namespace App\Http\Requests\Backend\Product;


use App\Core\Abstracts\RequestJSON;

/**
 * Class ProductTableRequest
 * @package App\Http\Requests\Backend\Product
 * @property string $per_page
 * @property string $filter
 * @property string $sort_by
 * @property bool $sort_desc
 */
class ProductTableRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'perPage'   => ['integer'],
            'filter'    => ['string', 'max:256', 'nullable'],
            'sort_by'   => ['string'],
            'sort_desc' => ['bool'],
        ];
    }

    public function messages(): array
    {
        return [

        ];
    }
}
