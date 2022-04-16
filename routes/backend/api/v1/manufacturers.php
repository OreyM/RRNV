<?php

use App\Http\Controllers\Backend\Api\V1\Catalog\Manufacturers\ManufacturerController;
use App\Http\Controllers\Backend\Api\V1\Catalog\Manufacturers\ManufacturersListController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'catalog/manufacturers',
    'as'     => 'catalog.manufacturers.',
], function () {
    Route::get('all', [ManufacturersListController::class, 'all'])->name('all');
});

Route::group([
    'prefix' => 'catalog/manufacturer',
    'as'     => 'catalog.manufacturer.',
], function () {
    Route::post('create', [ManufacturerController::class, 'create'])->name('create');
    Route::put('update', [ManufacturerController::class, 'update'])->name('update');
    Route::post('delete', [ManufacturerController::class, 'delete'])->name('delete');
});
