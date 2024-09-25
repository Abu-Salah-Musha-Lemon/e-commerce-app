<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;

// Public Routes
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(ClientController::class)->group(function () {
    Route::get('/category/{id}/{slug}', 'CategoryPage')->name('categoryPage');
    Route::get('/single-product/{id}', 'singleProduct')->name('singleProduct');
    Route::get('/new-release', 'newRelease')->name('newRelease');
   
});

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User Role Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::controller(ClientController::class)->group(function () {
        Route::get('/user-profile', 'userProfile')->name('userProfile');
        Route::get('/add-to-cart', 'addToCart')->name('addToCart');
        Route::post('/add-product-to-cart/{id}', 'addProductToCart')->name('addProductToCart');
        Route::get('/delete-product-to-cart/{id}', 'deleteProductToCart')->name('deleteProductToCart');
        Route::get('/user-profile/pending-order', 'pendingOrder')->name('pendingOrder');
        Route::get('/shopping-address', 'shoppingAddress')->name('shoppingAddress');
        Route::get('/user-profile/history', 'userHistory')->name('userHistory');
        Route::get('/checkout', 'checkout')->name('checkOut');
        Route::get('/orders', 'orderStore')->name('orders');
        Route::get('/orders/cancel', 'orderCancel')->name('orderCancel');
        Route::get('/customer-service', 'customerService')->name('customerService');
        Route::get('/todays-deal', 'todaysDeal')->name('todaysDeal');
    });
});

// Admin Role Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('admin/dashboard', 'index')->name('adminDashboard');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('admin/category', 'index')->name('category');
        Route::get('admin/category/create', 'create')->name('addCategory');
        Route::post('admin/category/store', 'store')->name('category.store');
        Route::get('admin/category/{id}/edit', 'edit')->name('category.edit');
        Route::patch('admin/category/{id}/update', 'update')->name('category.update'); // Changed to PATCH for updates
        Route::delete('admin/category/{id}/destroy', 'destroy')->name('category.destroy'); // Changed to DELETE
    });

    Route::controller(SubcategoryController::class)->group(function () {
        Route::get('admin/subcategory', 'index')->name('subcategory.index');
        Route::get('admin/subcategory/create', 'create')->name('subcategory.create');
        Route::post('admin/subcategory/store', 'store')->name('subcategory.store');
        Route::get('admin/subcategory/{id}/edit', 'edit')->name('subcategory.edit');
        Route::patch('admin/subcategory/{id}/update', 'update')->name('subcategory.update'); // Changed to PATCH
        Route::delete('admin/subcategory/{id}/destroy', 'destroy')->name('subcategory.destroy'); // Changed to DELETE
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('admin/product', 'index')->name('product');
        Route::get('admin/product/create', 'create')->name('product.create');
        Route::post('admin/product/store', 'store')->name('product.store');
        Route::get('admin/product/{id}/edit', 'edit')->name('product.edit');
        Route::patch('admin/product/{id}/update', 'update')->name('product.update'); // Changed to PATCH
        Route::delete('admin/product/{id}/destroy', 'destroy')->name('product.destroy'); // Changed to DELETE
    });

    Route::controller(OrderController::class)->group(function () {
        Route::get('admin/order', 'index')->name('order');
        Route::get('admin/order/create', 'create')->name('order.create'); // Added a name for consistency
        Route::get('admin/approve-order/{id}', 'approveOrder')->name('approveOrder');
        Route::get('admin/completed-order', 'completeOrder')->name('completeOrder');
    });
});

// Authentication Routes
require __DIR__.'/auth.php';
