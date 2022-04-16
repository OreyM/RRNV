<?php

namespace App\Http\Controllers\Backend\Api\V1\Localization\StockStatuses;


use App\Actions\Backend\Localization\StockStatuses\GetAllStockStatusesAction;
use App\Http\Controllers\BackendApiController;

class StockStatusesListController extends BackendApiController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:stock-status');
    }

    public function all()
    {
        try {
            $statusCollection = \Action::call(GetAllStockStatusesAction::class);

            return $this->respondWithSuccess([
                'statuses' => $statusCollection,
            ]);
        } catch (\Exception $e) {
            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }
}
