<?php

namespace App\Data\Repositories\Backend;


use App\Core\Abstracts\Repository;
use App\Http\Resources\Backend\Employee\EmployeeCollection;
use App\Models\Employee;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class EmployeeRepository extends Repository
{

    /**
     * @var Employee $model
     */
    protected $model = Employee::class;

    /**
     * @var Builder
     */
    protected $table = 'employee';

    public function getAllEmployees(): EmployeeCollection
    {
        $employees = $this->table
            ->select(
                'employee.id',
                'employee.name AS employee_name',
                'employee.email',
                'employee.is_active',
                'employee.created_at',
                'employee.updated_at',
                'roles.name AS role_alias',
                'roles.display_name AS role_display_name'
            )
            ->where('roles.name', '<>', 'super-admin')
            ->join('role_user','employee.id','=','role_user.employee_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->orderBy('employee_name')
            ->get();

        return new EmployeeCollection($employees);
    }

    public function getEmployeeByUuid(string $uuid): Employee
    {
        return $this->model->where('id', $uuid)->first();
    }

    public function getFirstSuperAdminUUID()
    {
        return $this->table
            ->select('employee.id')
            ->where('roles.name', '=', 'super-admin')
            ->join('role_user','employee.id','=','role_user.employee_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->first()
            ->id;
    }

    public function changeEmployeeStatus(string $uuid): int
    {
        $employee = $this->model->find($uuid);

        return $employee->update([
            'is_active' => !$employee->is_active
        ]);
    }

    public function deleteEmployee(string $uuid):? bool
    {
        return $this->model->find($uuid)->forceDelete();
    }
}
