<?php


namespace App\Actions\Backend\Localization\StockStatuses;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\Localization\StockStatusRepository;
use App\Exceptions\StockStatusHandlingException;
use App\Http\Requests\Backend\StockStatus\DeleteStockStatusRequest;

class DeleteStockStatusAction extends Action
{

    private DeleteStockStatusRequest $request;
    private StockStatusRepository $repository;

    public function __construct(DeleteStockStatusRequest $request, StockStatusRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    protected function run()
    {
        if (! $this->repository->destroyStockStatus($this->request->id)) {
            throw new StockStatusHandlingException('There was an error deleting the status data. Please try again.');
        }
    }
}
