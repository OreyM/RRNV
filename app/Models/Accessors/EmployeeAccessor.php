<?php

namespace App\Models\Accessors;


use App\Models\Role;

trait EmployeeAccessor
{
    /**
     * Get role alias
     * @return string|bool
     */
    public function getRoleAliasAttribute()
    {
        return $this->roles->first()->name ?? Role::NO_ROLE;
    }

    /**
     * Get display name role
     * @return string
     */
    public function getDisplayRoleAttribute(): string
    {
        return $this->roles->first()->display_name ?? Role::NO_DISPLAY_ROLE;
    }
}
