<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;

// Route::get('/', function () {
//     return view('userTemp.layout');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('home');
});
Route::controller(ClientController::class)->group(function(){
    Route::get('/category/{id}/{slug}', 'CategoryPage')->name('categoryPage');
    // Route::get('/subcategory', 'subcategoryPage')->name('subcategoryPage');
    Route::get('/single-product/{id}', 'singleProduct')->name('singleProduct');
    
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/new-release', 'newRelease')->name('newRelease');
    Route::get('/todays-deal', 'todaysDeal')->name('todaysDeal');
    
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth','role:user')->group(function () {
    Route::controller(ClientController::class)->group(function(){
        Route::get('/add-to-cart', 'addToCart')->name('addToCart');
        Route::post('/add-product-to-cart/{id}', 'addProductToCart')->name('addProductToCart');
        Route::get('/delete-product-to-cart/{id}', 'deleteProductToCart')->name('deleteProductToCart');
        Route::get('/user-profile', 'userProfile')->name('userProfile');
        Route::get('/user-profile/pending-order', 'pendingOrder')->name('pendingOrder');
        Route::get('/user-profile/history', 'userHistory')->name('userHistory');
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::get('/todays-deal', 'todaysDeal')->name('todaysDeal');
        Route::get('/customer-service', 'customerService')->name('customerService');
    });
});


Route::middleware('auth','role:admin')->group(function(){
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
        Route::get('admin/product/{id}/show', 'show')->name("product.show");
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
