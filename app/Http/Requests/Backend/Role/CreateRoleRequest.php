<?php


namespace App\Http\Requests\Backend\Role;


use App\Core\Abstracts\RequestJSON;

/**
 * Class CreateRoleRequest
 * @package App\Http\Requests\Backend\Role
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property array $permissions
 */
class CreateRoleRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'name'          => ['required', 'string', 'max:256', 'unique:roles,name'],
            'display_name'  => ['required', 'string', 'max:256', 'unique:roles,display_name'],
            'description'   => ['string', 'max:512'],
            'permissions'   => ['array'],
            'permissions.*' => ['exists:permissions,name']
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique'           => 'Alias for the role is already in use.',
            'display_name.unique'   => 'Name for the role is already in use.',
            'permissions.*.exists'  => 'Selected permission is not defined.'
        ];
    }
}
