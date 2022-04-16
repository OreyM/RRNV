<?php


namespace App\Actions\Backend\Employee;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\RoleRepository;
use App\Http\Requests\Backend\Employee\CreateEmployeeRequest;
use App\Http\Resources\Backend\Employee\EmployeeResource;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class CreateEmployeeAction extends Action
{

    private CreateEmployeeRequest $request;
    private Employee $employee;
    private RoleRepository $roleRepository;

    public function __construct(
        CreateEmployeeRequest $request,
        Employee $employee,
        RoleRepository $roleRepository
    )
    {
        $this->request = $request;
        $this->employee = $employee;
        $this->roleRepository = $roleRepository;
    }

    protected function run(): EmployeeResource
    {
        $employee = $this->employee->create([
            'name'      => $this->request->name,
            'email'     => $this->request->email,
            'password'  => Hash::make($this->request->password),
            'is_active' => $this->request->is_active,
        ]);

        $employee->attachRole(
            $this->roleRepository->getRoleModel($this->request->role)
        );

        return new EmployeeResource($employee);
    }
}
