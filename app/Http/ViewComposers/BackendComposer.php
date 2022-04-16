<?php

namespace App\Http\ViewComposers;


use App\Data\DTO\Empoyees\RootEmployeeDTO;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BackendComposer
{

    private ?Employee $employee;

    public function __construct()
    {
        $this->employee = Auth::user();
    }

    public function compose(View $view): void
    {
        $this->addRootEmployee($view);
    }

    private function addRootEmployee(View $view): void
    {
        if ($this->employee) {
            $rootEmployee = new RootEmployeeDTO([
                'name'  => $this->employee->name,
                'email' => $this->employee->email,
                'role'  => $this->employee->display_role,
            ]);

            $view->with('rootEmployee', $rootEmployee);
        }
    }
}
