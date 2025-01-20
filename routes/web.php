<?php
// routes/web.php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TranslationController;

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('admin/login', [AdminAuthController::class, 'create'])
        ->name('admin.login');
    Route::post('admin/login', [AdminAuthController::class, 'store'])
        ->name('admin.login.post');
});

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Redirect root to products.bord
    Route::get('/', function () {
        return redirect()->route('products.bord');
    });

    // Products routes
    Route::get('/products/{languageCode?}', [TranslationController::class, 'index'])
        ->where('languageCode', 'fr|en|es')
        ->name('products.index');
    
    Route::get('products/bord', [ProductController::class, 'bord'])
        ->name('products.bord');
    Route::resource('products', ProductController::class);
    Route::delete('products/{product}/translations/{languageCode}', 
        [ProductController::class, 'destroyTranslation'])
        ->name('products.destroyTranslation');
    Route::get('products/{languageCode}', 
        [ProductController::class, 'getByLanguage'])
        ->name('products.language');
    
    // Language routes
    Route::post('/switch-language/{languageCode}', 
        [TranslationController::class, 'switchLanguage'])
        ->name('switch.language');
    
    // Categories routes
    Route::resource('categories', CategoryController::class);
    Route::get('categories/language/{languageCode}', 
        [CategoryController::class, 'getByLanguage'])
        ->name('categories.language');
    Route::delete('categories/{category}/translations/{languageCode}', 
        [CategoryController::class, 'destroyTranslation'])
        ->name('categories.destroyTranslation');
    
    // Logout route
    Route::post('admin/logout', [AdminAuthController::class, 'destroy'])
        ->name('admin.logout');
});

