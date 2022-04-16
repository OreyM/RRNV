<?php


namespace App\Actions\Backend\Roles;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\RoleRepository;
use App\Http\Requests\Backend\Role\UpdateRoleDataRequest;

class UpdateRoleDataAction extends Action
{

    private UpdateRoleDataRequest $request;
    private RoleRepository $repository;

    public function __construct(UpdateRoleDataRequest $request, RoleRepository $repository)
    {

        $this->request = $request;
        $this->repository = $repository;
    }

    protected function run(): void
    {
        $roleModel = $this->repository->updateRoleData($this->request->id, [
            'name'          => mb_strtolower($this->request->name),
            'display_name'  => $this->request->display_name,
            'description'   => $this->request->description,
        ]);

        $oldPermissions = $this->repository->getSelectedPermissionsForRole($this->request->name);

        if ($removedPermissions = array_diff($oldPermissions, $this->request->permissions)) {
            $roleModel->detachPermissions($removedPermissions);
        }

        if ($assignedPermissions = array_diff($this->request->permissions, $oldPermissions)) {
            $roleModel->attachPermissions($assignedPermissions);
        }
    }
}
