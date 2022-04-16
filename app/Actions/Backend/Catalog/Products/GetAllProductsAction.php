<?php

namespace App\Actions\Backend\Catalog\Products;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\Catalog\ProductRepository;
use App\Http\Requests\Backend\Product\ProductTableRequest;

class GetAllProductsAction extends Action
{

    private ProductRepository $repository;
    private ProductTableRequest $request;

    public function __construct(ProductTableRequest $request, ProductRepository $repository)
    {
        $this->repository = $repository;
        $this->request = $request;
    }

    protected function run()
    {
        return $this->repository->getProductsForTable($this->request->per_page);
    }
}
