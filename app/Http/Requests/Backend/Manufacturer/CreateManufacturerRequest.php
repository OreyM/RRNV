<?php

namespace App\Http\Requests\Backend\Manufacturer;


use App\Core\Abstracts\RequestJSON;

/**
 * Class CreateManufacturerRequest
 * @package App\Http\Requests\Backend\Manufacturer
 * @property string $name
 * @property string $image
 */
class CreateManufacturerRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'name'  => ['required', 'string', 'max:256', 'unique:manufacturers,name'],
            'image' => ['string', 'max:512'],
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Name for the manufacturer is already in use.',
        ];
    }
}
