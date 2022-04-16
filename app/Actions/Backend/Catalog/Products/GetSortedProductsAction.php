<?php


namespace App\Actions\Backend\Catalog\Products;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\Catalog\ProductRepository;
use App\Http\Requests\Backend\Product\ProductTableRequest;
use App\Http\Resources\Backend\Catalog\Products\ProductTableCollection;

class GetSortedProductsAction extends Action
{

    private ProductRepository $repository;
    private ProductTableRequest $request;

    public function __construct(ProductTableRequest $request, ProductRepository $repository)
    {
        $this->repository = $repository;
        $this->request = $request;
    }

    protected function run(): ProductTableCollection
    {
        return $this->repository->getSortedProductsForTable(
            $this->request->filter,
            $this->request->sort_by,
            $this->request->sort_desc,
            $this->request->per_page
        );
    }
}
