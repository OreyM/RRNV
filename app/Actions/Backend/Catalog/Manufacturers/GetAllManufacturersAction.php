<?php

namespace App\Actions\Backend\Catalog\Manufacturers;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\Catalog\ManufacturerRepository;
use App\Http\Resources\Backend\Catalog\Manufacturers\ManufacturerCollection;

class GetAllManufacturersAction extends Action
{

    private ManufacturerRepository $repository;

    public function __construct(ManufacturerRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function run(): ManufacturerCollection
    {
        return $this->repository->getAllManufacturers();
    }
}
