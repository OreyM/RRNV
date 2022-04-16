<?php

namespace App\Http\Requests\Backend\Manufacturer;


use App\Core\Abstracts\RequestJSON;
use Illuminate\Validation\Rule;

/**
 * Class UpdateManufacturerRequest
 * @package App\Http\Requests\Backend\Manufacturer
 * @property int $id
 * @property string $name
 * @property string $image
 */
class UpdateManufacturerRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'id'    => ['required', 'integer', 'exists:manufacturers,id'],
            'name'  => ['required', 'string', 'max:256',
                Rule::unique('manufacturers')->ignore($this->id)
            ],
            'image' => ['string', 'max:512'],
        ];
    }

    public function messages()
    {
        return [
            'id.exists'   => 'Selected manufacturer is not defined.',
            'name.unique' => 'Name for the manufacturer is already in use.',
        ];
    }
}
