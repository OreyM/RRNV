<?php

namespace App\Data\Repositories\Backend\Catalog;


use App\Core\Abstracts\Repository;
use App\Http\Resources\Backend\Catalog\Manufacturers\ManufacturerCollection;
use App\Models\Manufacturer;

class ManufacturerRepository extends Repository
{

    /**
     * @var Manufacturer
     */
    protected $model = Manufacturer::class;

    public function getAllManufacturers(): ManufacturerCollection
    {
        $manufacturers = $this->model
            ->orderBy('name')
            ->get();

        return new ManufacturerCollection($manufacturers);
    }

    public function getAllManufacturersAliasKeyArray(): array
    {
        return $this->model
            ->select(['id', 'alias'])
            ->pluck('id', 'alias')
            ->toArray();
    }

    public function updateManufacturerData(int $manufacturerId, array $data): int
    {
        return $this->model->where('id', $manufacturerId)->update($data);
    }

    public function destroyManufacturer(int $manufacturerId): bool
    {
        return $this->model->where('id', $manufacturerId)->forceDelete();
    }

    public function getManufacturersIds(): array
    {
        return $this->model
            ->pluck('id')
            ->toArray();
    }
}
