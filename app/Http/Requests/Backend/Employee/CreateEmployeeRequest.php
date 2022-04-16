<?php


namespace App\Http\Requests\Backend\Employee;


use App\Core\Abstracts\RequestJSON;

/**
 * Class CreateEmployeeRequest
 * @package App\Http\Requests\Backend\Employee
 * @property string $name
 * @property string $email
 * @property string $password
 * @property bool   $is_active
 * @property string $role
 */
class CreateEmployeeRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'name'      => ['required', 'max:255'],
            'email'     => ['required', 'unique:employee,email', 'max:255'],
            'password'  => ['required', 'confirmed', 'min:8'],
            'is_active' => ['required', 'boolean'],
            'role'      => ['required', 'exists:roles,name']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'         => 'Employee name is required.',
            'name.max'              => 'Employee name must not exceed :max characters.',
            'email.required'        => 'Employee email is required.',
            'email.unique'          => 'Employee with this email already exists.',
            'email.max'             => 'Employee email must not exceed :max characters.',
            'password.required'     => 'Employee password is required.',
            'password.confirmed'    => 'Passwords are not confirmed.',
            'password.min'          => 'Password must be at least :min characters long.',
            'is_active.required'    => 'Employee status not selected.',
            'is_active.boolean'     => 'Error in the value of the employee status.',
            'role.required'         => 'The role for the new employee is not selected.',
            'role.exists'           => 'Selected role is not defined.',
        ];
    }
}
