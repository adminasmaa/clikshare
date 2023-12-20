<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Moderator\DashboardController;
use App\Http\Controllers\Moderator\ProductsController;

Route::prefix('moderator')->name('moderator.')->group(function() {
    Route::group(['middleware' => ['auth']], function() {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('products', ProductsController::class);
        Route::get('products\approve\{id}', [ProductsController::class, 'approveProduct'])->name('approve.product');
        Route::post('products\edit\{id}', [ProductsController::class, 'updateProduct'])->name('update.product');
        Route::post('products\reject\{id}', [ProductsController::class, 'rejectProduct'])->name('reject.product');
    });
});
