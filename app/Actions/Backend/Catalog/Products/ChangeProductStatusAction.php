<?php

namespace App\Actions\Backend\Catalog\Products;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\Catalog\ProductRepository;
use App\Data\Repositories\Backend\EmployeeRepository;
use App\Http\Requests\Backend\Employee\ChangeEmployeeStatusRequest;
use App\Http\Requests\Backend\Product\ChangeProductStatusRequest;

class ChangeProductStatusAction extends Action
{

    private ChangeProductStatusRequest $request;
    private ProductRepository $repository;

    public function __construct(ChangeProductStatusRequest $request, ProductRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    protected function run()
    {
        return $this->repository->changeProductStatus($this->request->id);
    }
}
