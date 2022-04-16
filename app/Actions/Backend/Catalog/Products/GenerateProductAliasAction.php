<?php


namespace App\Actions\Backend\Catalog\Products;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\Catalog\ProductRepository;
use App\Exceptions\ProductAliasExistsExeption;
use App\Http\Requests\Backend\Product\ProductAliasRequest;

class GenerateProductAliasAction extends Action
{

    private ProductAliasRequest $request;
    private ProductRepository $repository;

    public function __construct(ProductAliasRequest $request, ProductRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    protected function run(): string
    {
        $alias = \Str::slug($this->request->alias);

        if (! $this->repository->checkAlias($alias)) {
            return $alias;
        }

        throw new ProductAliasExistsExeption('Product alias already exists');
    }
}
