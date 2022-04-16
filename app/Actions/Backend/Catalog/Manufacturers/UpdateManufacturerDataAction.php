<?php


namespace App\Actions\Backend\Catalog\Manufacturers;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\Catalog\ManufacturerRepository;
use App\Http\Requests\Backend\Manufacturer\UpdateManufacturerRequest;
use Cassandra\Exception\ExecutionException;

class UpdateManufacturerDataAction extends Action
{

    private UpdateManufacturerRequest $request;
    private ManufacturerRepository $repository;

    public function __construct(UpdateManufacturerRequest $request, ManufacturerRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    protected function run(): void
    {
        if (! $this->repository->updateManufacturerData(
            $this->request->id, [
                'name'  => $this->request->name,
                'image' => $this->request->image,
            ]
        )) {
            throw new ExecutionException('There was an error updating the manufacturer data. Please try again.');
        }
    }
}
