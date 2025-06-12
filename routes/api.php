<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/user', [AuthController::class, 'getUser'])->middleware('auth:sanctum')->name('get.user');
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'create'])
    ->middleware(['auth:sanctum', 'can:manage-products'])
    ->name('create.product');
