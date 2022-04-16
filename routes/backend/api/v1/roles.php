<?php

use App\Http\Controllers\Backend\Api\V1\Roles\RoleController;
use App\Http\Controllers\Backend\Api\V1\Roles\RolesListController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'roles',
    'as'     => 'roles.',
], function () {
    Route::get('all', [RolesListController::class, 'all'])->name('all');
    Route::get('selection', [RolesListController::class, 'forSelection'])->name('selection');
});

Route::group([
    'prefix' => 'role',
    'as'     => 'role.',
], function () {
    Route::post('create', [RoleController::class, 'create'])->name('create');
    Route::put('update', [RoleController::class, 'update'])->name('update');
    Route::post('delete', [RoleController::class, 'delete'])->name('delete');
});
