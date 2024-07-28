<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\User;

Route::view('/', 'index')->name('index');

//Products pages
Route::name('product')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('.all');
    Route::post('/product/create', [ProductController::class, 'store'])->name('.create')->can('admin');
    Route::get('/product/create', [ProductController::class, 'showCreate'])->name('.show-create')->can('admin');
    Route::get('/product/{product}', [ProductController::class, 'show']);
    Route::delete('/product/{product}', [ProductController::class, 'remove'])->name('.remove')->can('admin');
});

//User related pages
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::middleware('auth')->group(function () {
    Route::name('admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->can('admin');
        Route::get('/admin/products', [AdminController::class, 'products'])->name('.products')->can('admin');
    });
});
