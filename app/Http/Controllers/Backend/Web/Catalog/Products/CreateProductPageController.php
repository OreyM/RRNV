<?php

namespace App\Http\Controllers\Backend\Web\Catalog\Products;


use App\Http\Controllers\BackendPageController;

class CreateProductPageController extends BackendPageController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware(['permission:create-product']);

        $this->title = 'New Product';
        $this->breadcrumb = 'create-product-brcr';
    }

    public function __invoke()
    {
        return view('pages.product.create', [
            'title'      => $this->title,
            'breadcrumb' => $this->breadcrumb,
        ]);
    }
}
