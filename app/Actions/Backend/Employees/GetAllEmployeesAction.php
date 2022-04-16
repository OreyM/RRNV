<?php

namespace App\Actions\Backend\Employees;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\EmployeeRepository;

class GetAllEmployeesAction extends Action
{

    private EmployeeRepository $repository;

    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function run()
    {
        return $this->repository->getAllEmployees();
    }
}
