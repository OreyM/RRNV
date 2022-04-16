<?php

namespace App\Http\Requests\Backend\Employee;


use App\Core\Abstracts\RequestJSON;

class ChangeEmployeeStatusRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'id' => [
                'required',
                'exists:employee,id'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'   => 'The employee whose data needs to be updated is not specified.',
            'id.exists'     => 'The selected Employee is invalid.'
        ];
    }
}
