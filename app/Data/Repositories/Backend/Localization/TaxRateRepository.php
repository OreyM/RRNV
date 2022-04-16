<?php

namespace App\Data\Repositories\Backend\Localization;


use App\Core\Abstracts\Repository;
use App\Data\DTO\TaxRates\TaxRateDTO;
use App\Http\Resources\Backend\Localization\TaxRates\TaxRateSelectCollection;
use App\Models\TaxRate;

class TaxRateRepository extends Repository
{

    /**
     * @var TaxRate
     */
    protected $model = TaxRate::class;

//    public function getAllStockStatuses(): StockStatusCollection
//    {
//        $roles = $this->model->orderBy('name')->get();
//
//        return new StockStatusCollection($roles);
//    }

    public function getTaxRatesForSelectTag(): TaxRateSelectCollection
    {
        $taxRates = $this->model
            ->select(['id', 'name'])
            ->get();

        return new TaxRateSelectCollection($taxRates);
    }

    public function getAllTaxRatesIdsArray(): array
    {
        return $this->model
            ->select('id')
            ->pluck('id')
            ->toArray();
    }

    public function getRate(int $id): TaxRateDTO
    {
        $tax = $this->model
            ->select(['id', 'rate', 'type'])
            ->where('id', $id)
            ->first();

        return new TaxRateDTO([
            'rate' => (float) $tax->rate,
            'type' => $tax->type,
        ]);
    }

//    public function updateStockStatusData(int $stockStatusId, array $data): int
//    {
//        return $this->model->where('id', $stockStatusId)->update($data);
//    }
//
//    public function destroyStockStatus(int $stockStatusId): bool
//    {
//        return $this->model->where('id', $stockStatusId)->forceDelete();
//    }
//
//    public function getStockStatusesIds(): array
//    {
//        return $this->model->pluck('id')->toArray();
//    }
}
