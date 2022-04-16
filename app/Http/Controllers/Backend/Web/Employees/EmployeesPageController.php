<?php

namespace App\Http\Controllers\Backend\Web\Employees;

use App\Actions\Backend\Employees\GetAllEmployeesAction;
use App\Http\Controllers\BackendPageController;

class EmployeesPageController extends BackendPageController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware(['permission:employees']);

        $this->title = 'Employees';
        $this->breadcrumb = 'employees-brcr';
    }

    public function __invoke()
    {
        return view('pages.employees', [
            'title'      => $this->title,
            'breadcrumb' => $this->breadcrumb,
        ]);
    }
}
