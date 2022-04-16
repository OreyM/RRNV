<?php

namespace App\Http\Controllers\Backend\Web\Catalog\Products;


use App\Http\Controllers\BackendPageController;

class ProductsPageController extends BackendPageController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware(['permission:products']);

        $this->title = 'Products';
        $this->breadcrumb = 'products-brcr';
    }

    public function __invoke()
    {
        return view('pages.products', [
            'title'      => $this->title,
            'breadcrumb' => $this->breadcrumb,
        ]);
    }
}
