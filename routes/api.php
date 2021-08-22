<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductReviewsController;
use App\Http\Controllers\AuthController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('auth')->name('auth.')->group(function() {
    Route::post('register', [AuthController::class, 'register'])->name('register');

    Route::post('login', [AuthController::class, 'login'])->name('login');
    
    Route::post('logout', [AuthController::class, 'logout'])
        ->middleware('auth:sanctum')
        ->name('logout');
});

Route::apiResource('products', ProductsController::class);
Route::prefix('products')->group(function() {
    Route::apiResource('/{product}/reviews', ProductReviewsController::class);
});