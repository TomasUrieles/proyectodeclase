<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CartController;


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', HomeController::class);


/*
|--------------------------------------------------------------------------
| PRODUCTOS
|--------------------------------------------------------------------------
*/

Route::prefix('product')->controller(ProductController::class)->group(function () {

    Route::get('/', 'index')->name('product.index');

    Route::get('/create', 'create')->name('product.create');

    Route::post('/store', 'store')->name('product.store');

    Route::get('/{producto}', 'show')->name('product.show');

    Route::get('/{producto}/edit', 'edit')->name('product.edit');

    Route::delete('/{product}','destroy')->name('product.destroy');

});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


    Route::prefix('categories')->controller(CategoryController::class)->group(function () {

        Route::get('/', 'index')->name('admin.categories.index');

        Route::get('/create', 'create')->name('admin.categories.create');

        Route::post('/store', 'store')->name('admin.categories.store');

        Route::get('/{category}/edit', 'edit')->name('admin.categories.edit');

        Route::put('/{category}', 'update')->name('admin.categories.update');

        Route::delete('/{category}', 'destroy')->name('admin.categories.destroy');

    });

});


/*
|--------------------------------------------------------------------------
| CARRITO
|--------------------------------------------------------------------------
*/

Route::prefix('cart')->controller(CartController::class)->group(function () {

    Route::get('/', 'index')->name('cart.index');

    Route::post('/add/{product}', 'add')->name('cart.add');

    Route::delete('/remove/{id}', 'remove')->name('cart.remove');

});

