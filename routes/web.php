<?php

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseTransactionController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::get('store', [StoreController::class, 'index'])->middleware('auth');
Route::get('store/deleted', [StoreController::class, 'deleted'])->middleware('auth');
Route::get('store/create', [StoreController::class, 'create'])->middleware('auth');
Route::post('store/store', [StoreController::class, 'store'])->middleware('auth');
Route::get('store/edit/{id}', [StoreController::class, 'edit'])->middleware('auth');
Route::post('store/update/{id}', [StoreController::class, 'update'])->middleware('auth');
Route::post('store/delete/{id}', [StoreController::class, 'destroy'])->middleware('auth');
Route::post('store/restore/{id}', [StoreController::class, 'restore'])->middleware('auth');
Route::get('product', [ProductController::class, 'index'])->middleware('auth');
Route::get('product/deleted', [ProductController::class, 'deleted'])->middleware('auth');
Route::get('product/create', [ProductController::class, 'create'])->middleware('auth');
Route::post('product/store', [ProductController::class, 'store'])->middleware('auth');
Route::get('product/edit/{id}', [ProductController::class, 'edit'])->middleware('auth');
Route::post('product/update/{id}', [ProductController::class, 'update'])->middleware('auth');
Route::post('product/delete/{id}', [ProductController::class, 'destroy'])->middleware('auth');
Route::post('product/restore/{id}', [ProductController::class, 'restore'])->middleware('auth');

Route::get('purchase_transactions', [PurchaseTransactionController::class, 'index'])->middleware('auth');
Route::get('purchase_transactions/report', [PurchaseTransactionController::class, 'report'])->middleware('auth');

Route::get('user/edit', [UserController::class, 'edit'])->middleware('auth');
Route::post('user/update', [UserController::class, 'update'])->middleware('auth');
Route::post('user/update-profile-photo', [UserController::class, 'uploadProfilePhoto'])->middleware('auth');


//Public Site
Route::get('site', [SiteController::class, 'index']);
Route::get('site/stores', [SiteController::class, 'stores']);
Route::get('site/products', [SiteController::class, 'products']);
Route::get('site/search', [SiteController::class, 'search']);
Route::get('site/store/{id}', [SiteController::class, 'store']);
Route::post('purchase_transactions/store', [PurchaseTransactionController::class, 'store']);
