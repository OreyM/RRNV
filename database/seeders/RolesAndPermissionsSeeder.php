<?php

namespace Database\Seeders;

use App\Exceptions\PermissionSeedingException;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{

    private Permission $permissionModel;
    private array $permissionsConf;
    private Role $roleModel;
    private array $rolesConf;

    public function __construct(Permission $permission, Role $role)
    {
        $this->permissionModel = $permission;
        $this->permissionsConf = config('permissions');
        $this->roleModel = $role;
        $this->rolesConf = config('roles');
    }

    public function run(): void
    {
        foreach ($this->permissionsConf as $permissionsGroup) {
            foreach ($permissionsGroup['permissions'] as $permission) {
                $this->permissionModel->create([
                    'name'              => $permission['name'],
                    'display_name'      => $permission['display_name'],
                    'description'       => $permission['description'],
                ]);
            }
        }

        foreach ($this->rolesConf as $role) {
            $createdRole = $this->roleModel->create([
                'name'          => $role['name'],
                'display_name'  => $role['display_name'],
                'description'   => $role['description'],
            ]);

            switch ($role['permissions']) {
                case is_string($role['permissions']) && $role['permissions'] === 'all':
                    $createdRole->attachPermissions($this->permissionModel->all());
                    break;
                case is_array($role['permissions']) && isset($role['permissions']['except']):
                    $createdRole->attachPermissions(
                        $this->permissionModel->whereNotIn('name', $role['permissions']['except'])->get()
                    );
                    break;
                case is_array($role['permissions']) && isset($role['permissions']['include']):
                    $createdRole->attachPermissions(
                        $this->permissionModel->whereIn('name', $role['permissions']['include'])->get()
                    );
                    break;
                default:
                    throw new PermissionSeedingException();
            }
        }
    }
}
