<?php


namespace App\Data\Repositories\Backend;


use App\Core\Abstracts\Repository;
use App\Http\Resources\Backend\Roles\RoleCollection;
use App\Http\Resources\Backend\Roles\RoleForSelectionCollection;
use App\Models\Role;

class RoleRepository extends Repository
{
    /**
     * @var Role
     */
    protected $model = Role::class;

    public function getRoleModel(string $roleName): Role
    {
        return $this->model->where('name', $roleName)->first();
    }

    public function getAllRolesWithoutSuperAdmin(): RoleCollection
    {
        $roles = $this->model
            ->where('name', '!=', 'super-admin')
            ->get();

        return new RoleCollection($roles);
    }

    public function getRolesForSelection(): RoleForSelectionCollection
    {
        $roles = $this->model->select(['name', 'display_name'])
            ->where('name', '!=', 'super-admin')
            ->get();

        return new RoleForSelectionCollection($roles);
    }

    public function getSelectedPermissionsForRole(string $roleName): array
    {
        return $this->model->where('name', $roleName)
            ->with('permissions')
            ->first()->permissions->map(function ($permission) {
                return $permission->name;
            })->toArray();
    }

    public function updateRoleData(int $roleId, array $data): Role
    {
        $role = $this->model->where('id', $roleId)->first();
        $role->update($data);
        return $role;
    }

    public function destroyRole(int $id): bool
    {
        $role = $this->model->where('id', $id)->first();
        $role->detachPermissions();
        return $role->forceDelete();
    }
}
