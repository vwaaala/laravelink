<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StorefrontController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Auth::routes(['register' => false]);
// Tenant-specific routes
Route::middleware(['auth'])->prefix('/admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::post('/products/imageupload', [ProductController::class, 'imageupload'])->name('products.imageupload');
    Route::get('/products/imageshow', [ProductController::class, 'imageshow'])->name('products.imageupload');
});

// Storefront Routes
Route::get('/', [StorefrontController::class, 'index'])->name('storefront.index');
Route::get('/categories', [StorefrontController::class, 'applications'])->name('storefront.applications');
Route::get('/categories/{category}', [StorefrontController::class, 'search'])->name('storefront.search');
Route::get('/applications/{category}/{product}', [StorefrontController::class, 'detail'])->name('storefront.detail');
Route::get('/about-us', [StorefrontController::class, 'about'])->name('storefront.about');
Route::get('/terms-and-conditions', [StorefrontController::class, 'terms'])->name('storefront.terms');
Route::get('/privacy-policy', [StorefrontController::class, 'privacy'])->name('storefront.privacy');
Route::get('/support', [StorefrontController::class, 'support'])->name('storefront.support');