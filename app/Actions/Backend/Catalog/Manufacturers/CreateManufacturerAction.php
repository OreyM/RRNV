<?php


namespace App\Actions\Backend\Catalog\Manufacturers;


use App\Core\Abstracts\Action;
use App\Http\Requests\Backend\Manufacturer\CreateManufacturerRequest;
use App\Http\Resources\Backend\Catalog\Manufacturers\ManufacturerResource;
use App\Models\Manufacturer;

class CreateManufacturerAction extends Action
{

    private CreateManufacturerRequest $request;
    private Manufacturer $manufacturer;

    public function __construct(CreateManufacturerRequest $request, Manufacturer $manufacturer)
    {
        $this->request = $request;
        $this->manufacturer = $manufacturer;
    }

    protected function run(): ManufacturerResource
    {
        $manufacturer = $this->manufacturer->create([
            'name'  => $this->request->name,
            'image' => $this->request->image
        ]);

        return new ManufacturerResource($manufacturer);
    }
}
