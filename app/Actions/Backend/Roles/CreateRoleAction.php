<?php


namespace App\Actions\Backend\Roles;


use App\Core\Abstracts\Action;
use App\Http\Requests\Backend\Role\CreateRoleRequest;
use App\Http\Resources\Backend\Roles\RoleResource;
use App\Models\Role;
use Illuminate\Support\Str;

class CreateRoleAction extends Action
{

    private CreateRoleRequest $request;
    private Role $role;

    public function __construct(CreateRoleRequest $request, Role $role)
    {
        $this->request = $request;
        $this->role = $role;
    }

    protected function run(): RoleResource
    {
        $role = $this->role->create([
            'name'          => mb_strtolower($this->request->name),
            'display_name'  => $this->request->display_name,
            'description'   => $this->request->description,
        ]);

        $role->attachPermissions($this->request->permissions);

        return new RoleResource($role);
    }
}
