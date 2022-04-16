<?php


namespace App\Http\Requests\Backend\Role;


use App\Core\Abstracts\RequestJSON;
use Illuminate\Validation\Rule;

/**
 * Class UpdateRoleDataRequest
 * @package App\Http\Requests\Backend\Role
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property array $permissions
 */
class UpdateRoleDataRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'id'            => ['required', 'integer', 'exists:roles,id'],
            'name'          => ['required', 'string', 'max:256',
                Rule::unique('roles')->ignore($this->id)
            ],
            'display_name'  => ['required', 'string', 'max:256',
                "unique:roles,display_name,{$this->id},id"
            ],
            'description'   => ['string', 'max:512'],
            'permissions'   => ['array'],
            'permissions.*' => ['exists:permissions,name']
        ];
    }

    public function messages(): array
    {
        return [
            'id.exists'             => 'Selected role is not defined.',
            'name.unique'           => 'Alias for the role is already in use.',
            'display_name.unique'   => 'Name for the role is already in use.',
            'permissions.*.exists'  => 'Selected permission is not defined.'
        ];
    }
}
