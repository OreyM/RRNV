<?php

namespace App\Services;


class RoleService
{

    /**
     * Check if the Role is attached to some Employees
     * @param string $roleId
     * @return bool
     */
    public function isRoleAttached(string $roleId): bool
    {
        return \DB::table('role_user')
            ->where('role_id', $roleId)
            ->exists();
    }
}
