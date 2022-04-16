<?php

use App\Http\Controllers\Frontend\Api\V1\Auth\LoginController;
use App\Http\Controllers\Frontend\Api\V1\Auth\LogoutController;
use App\Http\Controllers\Frontend\Api\V1\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'auth',
    'as'         => 'auth.',
    'middleware' => 'CORS'
], function () {
    Route::post('/login', LoginController::class)->name('login');
    Route::post('/register', RegisterController::class)->name('register');
    Route::get('/logout', LogoutController::class)->name('logout');
});
