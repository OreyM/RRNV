<?php


namespace App\Actions\Backend\Employee;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\EmployeeRepository;
use App\Http\Requests\Backend\Employee\DeleteEmployeeRequest;

class DeleteEmployeeAction extends Action
{

    private DeleteEmployeeRequest $request;
    private EmployeeRepository $repository;

    public function __construct(DeleteEmployeeRequest $request, EmployeeRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    protected function run(): void
    {
        $this->repository->deleteEmployee($this->request->id);
    }
}
