<?php


namespace App\Http\Requests\Backend\Manufacturer;


use App\Core\Abstracts\RequestJSON;

/**
 * Class DeleteManufacturerRequest
 * @package App\Http\Requests\Backend\Manufacturer
 * @property int $id
 */
class DeleteManufacturerRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:manufacturers,id'],
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Selected manufacturer is not defined.',
        ];
    }
}
