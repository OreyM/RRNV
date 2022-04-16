<?php

namespace App\Http\Requests\Backend\Role;


use App\Core\Abstracts\RequestJSON;

/**
 * Class DeleteRoleRequest
 * @package App\Http\Requests\Backend\Role
 * @property int $id
 */
class DeleteRoleRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:roles,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.exists' => 'Selected role is not defined.',
        ];
    }
}
