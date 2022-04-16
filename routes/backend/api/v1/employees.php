<?php

use App\Http\Controllers\Backend\Api\V1\Employee\EmployeeController;
use App\Http\Controllers\Backend\Api\V1\Employees\EmployeesController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'employees',
    'as'     => 'employees.',
], function () {
    Route::get('all', [EmployeesController::class, 'all'])->name('all');
});

Route::group([
    'prefix' => 'employee',
    'as'     => 'employee.',
], function () {
    Route::post('create', [EmployeeController::class, 'create'])->name('create');
    Route::put('active-status/change', [EmployeeController::class, 'changeStatus'])
        ->name('active-status.change');
    Route::put('update', [EmployeeController::class, 'update'])->name('update');
    Route::post('delete', [EmployeeController::class, 'delete'])->name('delete');
});
