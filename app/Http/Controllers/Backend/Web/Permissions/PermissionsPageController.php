<?php

namespace App\Http\Controllers\Backend\Web\Permissions;


use App\Http\Controllers\BackendPageController;

class PermissionsPageController extends BackendPageController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware(['permission:permissions']);

        $this->title = 'Permissions';
        $this->breadcrumb = 'permissions-brcr';
    }

    public function __invoke()
    {
        return view('pages.permissions', [
            'title'      => $this->title,
            'breadcrumb' => $this->breadcrumb,
        ]);
    }
}
