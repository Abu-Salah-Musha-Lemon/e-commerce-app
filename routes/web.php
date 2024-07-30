<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\admin\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth','role:user')->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('admin/dashboard', 'index')->name('adminDashboard');
    });
    Route::controller(CategoryController::class)->group(function(){
        Route::get('admin/category', 'index')->name('category');
        Route::get('admin/category/create', 'create')->name("addCategory");
        Route::post('admin/category/store', 'store')->name('category.store');
        Route::get('admin/category/{id}/edit', 'edit')->name('category.edit');
        Route::get('admin/category/{id}/update', 'update')->name('category.update');
        Route::get('admin/category/{id}/destroy', 'destroy')->name('category.destroy');
    });
    Route::controller(SubcategoryController::class)->group(function(){
        Route::get('admin/subcategory', 'index')->name('subcategory.index');
        Route::get('admin/subcategory/create', 'create')->name("subcategory.create");
        Route::post('admin/subcategory/store', 'store')->name('subcategory.store'); // Ensure this path is used in the form
        Route::get('admin/subcategory/{id}/edit', 'edit')->name('subcategory.edit');
        Route::get('admin/subcategory/{id}/update', 'update')->name('subcategory.update');
        Route::get('admin/subcategory/{id}/destroy', 'destroy')->name('subcategory.destroy');
    });
    
    Route::controller(ProductController::class)->group(function(){
        Route::get('admin/product', 'index')->name('product');
        Route::get('admin/product/create', 'create')->name("product.create");
        Route::post('admin/product/store', 'store')->name("product.store");
        Route::get('admin/product/{id}/edit', 'edit')->name("product.edit");
        Route::get('admin/product/{id}/update', 'update')->name("product.update");
        Route::get('admin/product/{id}/destroy', 'destroy')->name("product.destroy");
        // Route::get('admin/product', 'store');
        // Route::get('admin/product', 'update');
        // Route::get('admin/product', 'view');
    });
    Route::controller(OrderController::class)->group(function(){
        Route::get('admin/order', 'index')->name('order');
        Route::get('admin/order/create', 'create');
        // Route::get('admin/order', 'store');
        // Route::get('admin/order', 'update');
        // Route::get('admin/order', 'view');
    });
});

require __DIR__.'/auth.php';
