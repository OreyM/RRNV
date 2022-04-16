<?php

namespace App\Actions\Backend\Employee;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\EmployeeRepository;
use App\Http\Requests\Backend\Employee\ChangeEmployeeStatusRequest;

class ChangeEmployeeStatusAction extends Action
{

    private ChangeEmployeeStatusRequest $request;
    private EmployeeRepository $repository;

    public function __construct(
        ChangeEmployeeStatusRequest $request,
        EmployeeRepository $repository
    )
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    protected function run()
    {
        return $this->repository->changeEmployeeStatus($this->request->id);
    }
}
