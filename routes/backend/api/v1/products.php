<?php

use App\Http\Controllers\Backend\Api\V1\Catalog\Products\ProductController;
use App\Http\Controllers\Backend\Api\V1\Catalog\Products\ProductServicesController;
use App\Http\Controllers\Backend\Api\V1\Catalog\Products\ProductsListController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'catalog/products',
    'as'     => 'catalog.products.',
], function () {
    Route::get('all', [ProductsListController::class, 'all'])->name('all');
    Route::get('filter', [ProductsListController::class, 'filtered'])->name('filter');
    Route::get('sort', [ProductsListController::class, 'sorted'])->name('sort');
});

Route::group([
    'prefix' => 'catalog/product',
    'as'     => 'catalog.product.',
], function () {
    Route::post('store', [ProductController::class, 'store'])->name('store');
//    Route::put('update', [ManufacturerController::class, 'update'])->name('update');
    Route::patch('active-status/change', [ProductController::class, 'changeStatus'])
        ->name('active-status.change');
    Route::post('remove', [ProductController::class, 'remove'])->name('remove');
//    Route::post('delete', [ManufacturerController::class, 'delete'])->name('delete');

    Route::group([
        'prefix'    => 'service',
        'as'        => 'service.',
    ], function () {
        Route::get('alias', [ProductServicesController::class, 'aliasGenerator'])->name('alias');
        Route::get('net-price', [ProductServicesController::class, 'netPriceCalculation'])
            ->name('net-price');
    });
});
