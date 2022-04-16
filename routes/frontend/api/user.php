<?php

use App\Http\Controllers\Frontend\Api\V1\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'user',
    'as'         => 'user.',
    'middleware' => 'CORS'
], function () {
    Route::get('/profile', ProfileController::class)->name('profile');
});
