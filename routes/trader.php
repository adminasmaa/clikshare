<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Trader\DashboardController;
use App\Http\Controllers\Trader\ProductController;
use App\Http\Controllers\Trader\TraderController;

Route::prefix('trader')->name('trader.')->group(function() {
    Route::group(['middleware' => ['auth']], function() {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('products', ProductController::class);

        Route::resource('traders', TraderController::class);

        Route::post('products/filter', [ProductController::class, 'filter']);
    });
});
