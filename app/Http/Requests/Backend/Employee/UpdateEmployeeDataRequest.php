<?php


namespace App\Http\Requests\Backend\Employee;


use App\Core\Abstracts\RequestJSON;

/**
 * Class UpdateEmployeeDataRequest
 * @package App\Http\Requests\Backend\Employee
 * @property string $id
 * @property string $name
 * @property string $role
 */
class UpdateEmployeeDataRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'id'        => ['string', 'exists:employee,id'],
            'name'      => ['string', 'max:255'],
            'role'      => ['exists:roles,name'],
//            'is_active' => ['integer', 'between:0,1'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.exists'     => 'This employee was not found in the system.',
            'role.exists'   => 'Selected role is not defined.',
//            'is_active.between' => 'Invalid data for activity status.',
        ];
    }
}
