<?php

use App\Http\Controllers\Backend\Api\V1\Catalog\Manufacturers\ManufacturerController;
use App\Http\Controllers\Backend\Api\V1\Catalog\Manufacturers\ManufacturersListController;
use App\Http\Controllers\Backend\Api\V1\Localization\TaxRates\TaxRateController;
use App\Http\Controllers\Backend\Api\V1\Localization\TaxRates\TaxRatesListController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'localization/tax-rates',
    'as'     => 'localization.tax-rates.',
], function () {
    Route::get('selection', [TaxRatesListController::class, 'forSelect'])->name('selection');
});

Route::group([
    'prefix' => 'localization/tax-rate',
    'as'     => 'localization.tax-rate.',
], function () {
//    Route::post('create', [TaxRateController::class, 'create'])->name('create');
//    Route::put('update', [TaxRateController::class, 'update'])->name('update');
//    Route::post('delete', [TaxRateController::class, 'delete'])->name('delete');
});
