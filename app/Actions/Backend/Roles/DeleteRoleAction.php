<?php


namespace App\Actions\Backend\Roles;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\RoleRepository;
use App\Exceptions\RoleHandlingException;
use App\Http\Requests\Backend\Role\DeleteRoleRequest;
use App\Services\RoleService;

class DeleteRoleAction extends Action
{

    private DeleteRoleRequest $request;
    private RoleRepository $repository;
    private RoleService $roleService;

    public function __construct(
        DeleteRoleRequest $request,
        RoleRepository $repository,
        RoleService $roleService
    )
    {
        $this->request = $request;
        $this->repository = $repository;
        $this->roleService = $roleService;
    }

    protected function run(): void
    {
        if ($this->roleService->isRoleAttached($this->request->id)) {
            throw new RoleHandlingException('This role is assigned to some Employees.');
        }

        $this->repository->destroyRole($this->request->id);
    }
}
