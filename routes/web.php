<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\MakeController as AdminMakeController;
use App\Http\Controllers\MakeController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;


Route::group(['middleware' => ['web']], function () {

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/make/{id}', [MakeController::class, 'index'])->name('showProductByMake');
Route::get('/type/{id}', [TypeController::class, 'index'])->name('showProductByType');
Route::get('/product/{id}', [ProductController::class, 'index'])->name('productsDetail');
Route::get('types/get/{id}', [ProductController::class, 'getMakes']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin',  'middleware' => ['auth']], function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::get('/about/edit', [AdminAboutController::class, 'edit'])->name('adminAboutEdit');
    Route::put('/about/edit', [AdminAboutController::class, 'update'])->name('adminAboutUpdate');

    Route::get('service/edit', [ServiceController::class, 'edit'])->name('adminServicesEdit');
    Route::put('service/edit', [ServiceController::class, 'update'])->name('adminServicesUpdate');
    Route::delete('service/{id}/delete', [ServiceController::class, 'destroy'])->name('adminServicesDelete');

    Route::get('/product', [AdminProductController::class, 'index'])->name('adminProducts');
    Route::get('/product/create', [AdminProductController::class, 'create'])->name('adminProductsCreate');
    Route::post('/product', [AdminProductController::class, 'store'])->name('adminProductsStore');
    Route::get('/product/{id}/edit', [AdminProductController::class, 'edit'])->name('adminProductsEdit');
    Route::put('/product/{id}', [AdminProductController::class, 'update'])->name('adminProductsUpdate');
    Route::get('/product/{id}/delete', [AdminProductController::class, 'destroy'])->name('adminProductsDelete');
    Route::get('/product/image/{id}/delete', [ProductImageController::class, 'destroy'])->name('adminProductsImageDelete');
    Route::get('/product/image/default', [ProductImageController::class, 'setImageDefault'])->name('adminImageDefault');

    Route::get('/make', [AdminMakeController::class, 'index'])->name('adminMakes');
    Route::get('/make/create', [AdminMakeController::class, 'create'])->name('adminMakesCreate');
    Route::post('/make', [AdminMakeController::class, 'store'])->name('adminMakesStore');
    Route::get('/make/{id}/edit', [AdminMakeController::class, 'edit'])->name('adminMakesEdit');
    Route::put('/make/{id}', [AdminMakeController::class, 'update'])->name('adminMakesUpdate');
    Route::delete('/make/{id}/delete', [AdminMakeController::class, 'destroy'])->name('adminMakesDelete');

    Route::get('/type', [AdminTypeController::class, 'index'])->name('adminTypes');
    Route::get('/type/create', [AdminTypeController::class, 'create'])->name('adminTypesCreate');
    Route::post('/type', [AdminTypeController::class, 'store'])->name('adminTypesStore');
    Route::get('/type/{id}/edit', [AdminTypeController::class, 'edit'])->name('adminTypesEdit');
    Route::put('/type/{id}', [AdminTypeController::class, 'update'])->name('adminTypesUpdate');
    Route::delete('/type/{id}/delete', [AdminTypeController::class, 'destroy'])->name('adminTypesDelete');

    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('adminUsersEdit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('adminUserUpdate');
    Route::post('/user', [UserController::class, 'store'])->name('adminUserStore');
    Route::get('/user', [UserController::class, 'index'])->name('adminUsers');
    Route::get('/user/create', [UserController::class, 'create'])->name('adminUsersCreate');
    Route::delete('/user/{id}/delete', [UserController::class, 'destroy'])->name('adminUsersDelete');
});
});


