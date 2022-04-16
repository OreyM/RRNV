<?php

namespace App\Http\Controllers\Backend\Web\Catalog\Manufacturers;


use App\Http\Controllers\BackendPageController;

class ManufacturersPageController extends BackendPageController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware(['permission:manufacturers']);

        $this->title = 'Manufacturers';
        $this->breadcrumb = 'manufacturers-brcr';
    }

    public function __invoke()
    {
        return view('pages.manufacturers', [
            'title'      => $this->title,
            'breadcrumb' => $this->breadcrumb,
        ]);
    }
}
