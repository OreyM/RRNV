<?php

use App\Http\Controllers\Backend\Api\V1\Localization\StockStatuses\StockStatusController;
use App\Http\Controllers\Backend\Api\V1\Localization\StockStatuses\StockStatusesListController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'localization/stock-statuses',
    'as'     => 'localization.stock-statuses.',
], function () {
    Route::get('all', [StockStatusesListController::class, 'all'])->name('all');
});

Route::group([
    'prefix' => 'localization/stock-status',
    'as'     => 'localization.stock-status.',
], function () {
    Route::post('create', [StockStatusController::class, 'create'])->name('create');
    Route::put('update', [StockStatusController::class, 'update'])->name('update');
    Route::post('delete', [StockStatusController::class, 'delete'])->name('delete');
});
