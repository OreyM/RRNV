<?php

namespace App\Data\Repositories\Backend\Localization;


use App\Core\Abstracts\Repository;
use App\Http\Resources\Backend\Localization\StockStatuses\StockStatusCollection;
use App\Models\StockStatus;

class StockStatusRepository extends Repository
{

    /**
     * @var StockStatus
     */
    protected $model = StockStatus::class;

    public function getAllStockStatuses(): StockStatusCollection
    {
        $roles = $this->model->orderBy('name')->get();

        return new StockStatusCollection($roles);
    }

    public function getAllStockStatusesAliasKeyArray(): array
    {
        return $this->model
            ->select(['id', 'alias'])
            ->pluck('id', 'alias')
            ->toArray();
    }

    public function updateStockStatusData(int $stockStatusId, array $data): int
    {
        return $this->model->where('id', $stockStatusId)->update($data);
    }

    public function destroyStockStatus(int $stockStatusId): bool
    {
        return $this->model->where('id', $stockStatusId)->forceDelete();
    }

    public function getStockStatusesIds(): array
    {
        return $this->model->pluck('id')->toArray();
    }
}
