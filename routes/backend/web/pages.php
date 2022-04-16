<?php

use App\Http\Controllers\Backend\Web\Catalog\Manufacturers\ManufacturersPageController;
use App\Http\Controllers\Backend\Web\Catalog\Products\CreateProductPageController;
use App\Http\Controllers\Backend\Web\Dashboard\DashboardPageController;
use App\Http\Controllers\Backend\Web\Employees\EmployeesPageController;
use App\Http\Controllers\Backend\Web\Localization\StockStatuses\StockStatusesPageController;
use App\Http\Controllers\Backend\Web\Permissions\PermissionsPageController;
use App\Http\Controllers\Backend\Web\Catalog\Products\ProductsPageController;
use App\Http\Controllers\Backend\Web\Roles\RolesPageController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', DashboardPageController::class)->name('dashboard');
Route::get('employees', EmployeesPageController::class)->name('employees');
Route::get('roles', RolesPageController::class)->name('roles');
Route::get('permissions', PermissionsPageController::class)->name('permissions');
Route::get('stock-statuses', StockStatusesPageController::class)->name('stock-statuses');
Route::get('manufacturers', ManufacturersPageController::class)->name('manufacturers');

Route::get('products', ProductsPageController::class)->name('products');
Route::group([
    'prefix' => 'product',
    'as'     => 'product.',
], function () {
    Route::get('create', CreateProductPageController::class)->name('create');
});

