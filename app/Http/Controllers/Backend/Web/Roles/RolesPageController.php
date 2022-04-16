<?php

namespace App\Http\Controllers\Backend\Web\Roles;


use App\Http\Controllers\BackendPageController;

class RolesPageController extends BackendPageController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware(['permission:roles']);

        $this->title = 'Roles';
        $this->breadcrumb = 'roles-brcr';
    }

    public function __invoke()
    {
        return view('pages.roles', [
            'title'      => $this->title,
            'breadcrumb' => $this->breadcrumb,
        ]);
    }
}
