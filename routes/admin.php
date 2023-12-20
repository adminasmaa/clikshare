<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
//use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\Settings\PaymentMethodController;
use App\Http\Controllers\Admin\Settings\CategoryController;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::group(['middleware' => ['auth']], function() {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::post('checkRoleType', [UserController::class, 'checkRoleType'])->name('checkRoleType.post');
//        Route::resource('products', ProductController::class);
        Route::prefix('settings')->name('settings.')->group(function() {
            Route::resource('payment-methods', PaymentMethodController::class);
            Route::resource('categories', CategoryController::class);
        });
    });
});
