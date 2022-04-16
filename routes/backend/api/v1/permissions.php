<?php

use App\Http\Controllers\Backend\Api\V1\Permissions\PermissionsListController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'permissions',
    'as'     => 'permissions.',
], function () {
    Route::get('selection', [PermissionsListController::class, 'forSelection'])
        ->name('selection');
    Route::get('selected/{role}', [PermissionsListController::class, 'selected'])->name('selected');
});
