<?php


namespace App\Actions\Backend\Catalog\Products;


use App\Core\Abstracts\Action;
use App\Http\Requests\Backend\Product\StoreProductRequest;

class StoreNewProductAction extends Action
{

    private StoreProductRequest $request;

    public function __construct(StoreProductRequest $request)
    {
        $this->request = $request;
    }

    protected function run()
    {
        return $this->request->all();
    }
}
