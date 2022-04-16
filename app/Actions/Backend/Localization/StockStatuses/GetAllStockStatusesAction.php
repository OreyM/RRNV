<?php

namespace App\Actions\Backend\Localization\StockStatuses;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\Localization\StockStatusRepository;
use App\Http\Resources\Backend\Localization\StockStatuses\StockStatusCollection;

class GetAllStockStatusesAction extends Action
{

    private StockStatusRepository $repository;

    public function __construct(StockStatusRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function run(): StockStatusCollection
    {
        return $this->repository->getAllStockStatuses();
    }
}
