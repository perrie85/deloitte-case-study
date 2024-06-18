<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->group(function () {
    Route::apiResource('/', ProductController::class);
    Route::get('/search', [ProductController::class, 'search']);
});
