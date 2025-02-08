<?php
// routes/web.php

use Illuminate\Contracts\Cache\Store;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\store\storeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\auth\AdminAuthController;
use App\Http\Controllers\Admin\TranslationController;
use App\Http\Controllers\discount\DiscountController;
use App\Http\Controllers\Admin\CategoryController;







/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('admin/login', [AdminAuthController::class, 'create'])
        ->name('admin.login');
    Route::post('admin/login', [AdminAuthController::class, 'store'])
        ->name('admin.login.post');
});







/*
|--------------------------------------------------------------------------
| Admin Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.products.bord');
    });

    Route::get('/products/{languageCode?}', [TranslationController::class, 'index'])
        ->where('languageCode', 'fr|en|es')
        ->name('products.index');
    
        Route::get('products/{languageCode}', [ProductController::class, 'getByLanguage'])
    ->name('products.language'); // Keep this for language-based product listing

    Route::get('admin/products/bord', [ProductController::class, 'bord'])
    ->name('admin.products.bord');

        Route::resource('admin/products', ProductController::class)->names([
            'index' => 'admin.products.index',
            'create' => 'admin.products.create',
            'store' => 'admin.products.store',
            'show' => 'admin.products.show',
            'edit' => 'admin.products.edit',
            'update' => 'admin.products.update',
            'destroy' => 'admin.products.destroy'
        ]);
    
    Route::resource('categories', CategoryController::class);

    Route::get('categories/language/{languageCode}', 
        [CategoryController::class, 'getByLanguage'])
        ->name('categories.language');

    Route::delete('categories/{category}/translations/{languageCode}', 
        [CategoryController::class, 'destroyTranslation'])
        ->name('categories.destroyTranslation');
    
    Route::post('admin/logout', [AdminAuthController::class, 'destroy'])
        ->name('admin.logout');

    Route::resource('discounts', DiscountController::class);
});







/*
|--------------------------------------------------------------------------
| Public Store Routes
|--------------------------------------------------------------------------
*/
Route::middleware('web')->group(function () {
    
     Route::get('/', [storeController::class, 'home'])->name('home');

     //Route::get('/product/{slug}', [StoreController::class, 'product'])->name('store.product');//home page

     Route::post('/switch-language/{languageCode}', [TranslationController::class, 'switchUserLanguage'])
            ->name('switch.user.language');

            
     Route::get('/store/category/{categoryId}', [StoreController::class, 'index'])->name('store.category');//responsable shope page

     Route::get('/allproducts', [StoreController::class, 'getAllProducts'])->name('products.all');
     
     Route::get('/home/{languageCode?}', [TranslationController::class, 'userHomeTranslation'])
             ->name('home.language');

             Route::get('/clear/{product}', [ProductController::class, 'show'])->name('products.show');
             Route::get('/store/about' , [storeController::class , 'showAbout'])->name('store/about');;
             Route::get('/store/contact' , [storeController::class , 'showContact'])->name('store/contact');;
});




