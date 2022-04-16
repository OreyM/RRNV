<?php


namespace App\Http\Requests\Backend\Employee;


use App\Core\Abstracts\RequestJSON;

/**
 * Class DeleteEmployeeRequest
 * @package App\Http\Requests\Backend\Employee
 * @property string $id
 */
class DeleteEmployeeRequest extends RequestJSON
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
            'id.required'   => 'The employee to be removed is not specified.',
            'id.exists'     => 'The selected Employee is invalid.'
        ];
    }
}
