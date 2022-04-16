<?php

namespace App\Actions\Backend\Roles;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\RoleRepository;

class GetSelectedPermissionsForRoleAction extends Action
{

    private string $roleAlias;
    private RoleRepository $repository;

    public function __construct(string $roleAlias, RoleRepository $repository)
    {
        $this->roleAlias = $roleAlias;
        $this->repository = $repository;
    }

    protected function run(): array
    {
        return $this->repository->getSelectedPermissionsForRole($this->roleAlias);
    }
}
