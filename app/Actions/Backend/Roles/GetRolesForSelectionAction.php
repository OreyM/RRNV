<?php

namespace App\Actions\Backend\Roles;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\RoleRepository;

class GetRolesForSelectionAction extends Action
{

    private RoleRepository $repository;

    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function run()
    {
        return $this->repository->getRolesForSelection();
    }
}
