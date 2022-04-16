<?php

namespace App\Actions\Backend\Catalog\Manufacturers;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\Catalog\ManufacturerRepository;
use App\Exceptions\ManufacturerHandlingException;
use App\Http\Requests\Backend\Manufacturer\DeleteManufacturerRequest;

class DeleteManufacturerAction extends Action
{

    private DeleteManufacturerRequest $request;
    private ManufacturerRepository $repository;

    public function __construct(DeleteManufacturerRequest $request, ManufacturerRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    protected function run()
    {
        if (! $this->repository->destroyManufacturer($this->request->id)) {
            throw new ManufacturerHandlingException('There was an error deleting the manufacturer data. Please try again.');
        }
    }
}
