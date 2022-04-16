<?php


namespace App\Actions\Backend\Localization\StockStatuses;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\Localization\StockStatusRepository;
use App\Http\Requests\Backend\StockStatus\UpdateStockStatusRequest;
use Cassandra\Exception\ExecutionException;

class UpdateStockStatusDataAction extends Action
{

    private UpdateStockStatusRequest $request;
    private StockStatusRepository $repository;

    public function __construct(UpdateStockStatusRequest $request, StockStatusRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    protected function run(): void
    {
        if (! $this->repository->updateStockStatusData(
            $this->request->id,
            ['name' => $this->request->name]
        )) {
            throw new ExecutionException('There was an error updating the status data. Please try again.');
        }
    }
}
