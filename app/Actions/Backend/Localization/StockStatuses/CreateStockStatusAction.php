<?php


namespace App\Actions\Backend\Localization\StockStatuses;


use App\Core\Abstracts\Action;
use App\Http\Requests\Backend\StockStatus\CreateStockStatusRequest;
use App\Http\Resources\Backend\Localization\StockStatuses\StockStatusResource;
use App\Models\StockStatus;

class CreateStockStatusAction extends Action
{

    private CreateStockStatusRequest $request;
    private StockStatus $status;

    public function __construct(CreateStockStatusRequest $request, StockStatus $status)
    {
        $this->request = $request;
        $this->status = $status;
    }

    protected function run(): StockStatusResource
    {
        $status = $this->status->create([
            'name' => $this->request->name
        ]);

        return new StockStatusResource($status);
    }
}
