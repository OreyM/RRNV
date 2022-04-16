<?php


namespace App\Actions\Backend\Employee;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\EmployeeRepository;
use App\Data\Repositories\Backend\RoleRepository;
use App\Http\Requests\Backend\Employee\UpdateEmployeeDataRequest;
use App\Http\Resources\Backend\Employee\EmployeeResource;

class UpdateEmployeeDataAction extends Action
{

    private UpdateEmployeeDataRequest $request;
    private EmployeeRepository $employeeRepository;
    private RoleRepository $roleRepository;

    public function __construct(
        UpdateEmployeeDataRequest $request,
        EmployeeRepository $employeeRepository,
        RoleRepository $roleRepository
    )
    {
        $this->request = $request;
        $this->employeeRepository = $employeeRepository;
        $this->roleRepository = $roleRepository;
    }

    protected function run(): EmployeeResource
    {
        $employee = $this->employeeRepository->getEmployeeByUuid($this->request->id);
        $employee->name = $this->request->name;
        $employee->save();

        if ($employee->hasRole($this->request->role)) return new EmployeeResource($employee);

        $employee->detachRole($employee->roles[0]);

        $employee->attachRole(
            $this->roleRepository->getRoleModel($this->request->role)
        );

        return new EmployeeResource($employee);
    }
}
