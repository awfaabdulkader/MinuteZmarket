<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\TranslationController;

Route::post('register', [AuthController::class, 'register']);
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->middleware('auth:api');
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('categories' , CategoryController::class);
//route product


Route::get('products', [ProductController::class, 'index']);
Route::post('products', [ProductController::class, 'store']);
Route::get('products/{product}', [ProductController::class, 'show']);
Route::get('products/language/{languageCode}', [ProductController::class, 'getByLanguage']);
Route::put('products/{product}', [ProductController::class, 'update']);
Route::delete('products/{product}', [ProductController::class, 'destroy']);
Route::delete('products/{product}/translations/{languageCode}', [ProductController::class, 'destroyTranslation']);
Route::get('products/filter', [ProductController::class, 'filter']);

Route::get('categories', [CategoryController::class, 'index']);
Route::post('categories', [CategoryController::class, 'store']);
Route::get('categories/{category}', [CategoryController::class, 'show']);
Route::get('categories/language/{languageCode}', [CategoryController::class, 'getByLanguage']);
Route::put('categories/{category}', [CategoryController::class, 'update']);
Route::delete('categories/{category}', [CategoryController::class, 'destroy']);
Route::delete('categories/{category}/translations/{languageCode}', [CategoryController::class, 'destroyTranslation']);


// Translation routes
Route::post('translations', [TranslationController::class, 'store']);
Route::put('translations/{translation}', [TranslationController::class, 'update']);
Route::delete('translations/{translation}', [TranslationController::class, 'destroy']);

