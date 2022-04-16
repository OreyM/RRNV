<?php


namespace App\Actions\Backend\Catalog\Products;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\Catalog\ProductRepository;
use App\Exceptions\ProductHandlingException;
use App\Http\Requests\Backend\Product\DeleteProductRequest;

class RemoveProductAction extends Action
{

    private DeleteProductRequest $request;
    private ProductRepository $repository;

    public function __construct(DeleteProductRequest $request, ProductRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    protected function run()
    {
        if (! $this->repository->deleteProduct($this->request->id)) {
            throw new ProductHandlingException(
                'There was an error deleting the product data. Please try again.'
            );
        }
    }
}
