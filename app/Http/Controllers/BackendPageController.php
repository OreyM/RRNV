<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendPageController extends BackendWebController
{

    protected string $title;
    protected string $breadcrumb;

    public function __construct()
    {
        $this->middleware('auth');
    }
}
