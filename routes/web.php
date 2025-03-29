<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\HomeController;


// Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/shop', [ProductController::class, 'shop'])->name('products.shop');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'is_admin'])->group(function () {
    //group routes
    Route::prefix('admin')->group(function () {
        Route::get('/product', [ProductController::class, 'index'])->name('products.index');
        Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/product/create', [ProductController::class, 'store']);
        Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('/product/edit/{id}', [ProductController::class, 'update'])->name('products.update');
        //category
        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.show_create');
        Route::post('/category/create', [CategoryController::class, 'store'])->name('category.create');
        Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/category/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
    });
});
// router for get

require __DIR__ . '/auth.php';
