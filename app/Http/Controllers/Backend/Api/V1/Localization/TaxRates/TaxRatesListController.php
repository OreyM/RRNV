<?php

namespace App\Http\Controllers\Backend\Api\V1\Localization\TaxRates;


use App\Actions\Backend\Localization\StockStatuses\GetAllStockStatusesAction;
use App\Actions\Backend\Localization\TaxRates\GetAllTaxRatesAction;
use App\Http\Controllers\BackendApiController;

class TaxRatesListController extends BackendApiController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:tax-rates');
    }

    public function forSelect()
    {
        try {
            $taxeRatesCollection = \Action::call(GetAllTaxRatesAction::class);

            return $this->respondWithSuccess([
                'taxes' => $taxeRatesCollection,
            ]);
        } catch (\Exception $e) {
            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }
}
