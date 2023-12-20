<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Auth\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'index']);
Auth::routes(['register' => false]);
Route::get('register-as-partner', [AccountController::class, 'viewAccount'])->name('view.account');
Route::post('store-user', [AccountController::class, 'storeUser'])->name('register.account');
