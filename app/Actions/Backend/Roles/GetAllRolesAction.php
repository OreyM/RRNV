<?php


namespace App\Actions\Backend\Roles;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\RoleRepository;
use App\Http\Resources\Backend\Roles\RoleCollection;

class GetAllRolesAction extends Action
{

    private RoleRepository $repository;

    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function run(): RoleCollection
    {
        return $this->repository->getAllRolesWithoutSuperAdmin();
    }
}
