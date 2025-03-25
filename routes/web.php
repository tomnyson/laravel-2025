<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info', function () {
    $info = array(
        'name' => 'John Doe',
        'age' => 30,
        'email' => 'abc@example.com',
    );
    return view('info', compact('info'));
});


Route::get('/info/{id}', function (string $id) {
    $sinhviens = array(
        '1' => array(
            'name' => 'nguyen van a',
            'age' => 30,
            'email' => 'test@example.com'
        ),
        '2' =>   array(
            'name' => 'nguyen van b',
            'age' => 29,
            'email' => 'abc@example.com'
        ),
    );
    if(!empty($sinhviens[$id])) {
        $info = $sinhviens[$id];
        return view('info_detail', compact('info'));
    } else {
        abort(404);
    }

});

Route::get('/product', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/product/create', [ProductController::class, 'store']);
Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/product/edit/{id}', [ProductController::class, 'update'])->name('products.update');

//categry
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.show_create');
Route::post('/category/create', [CategoryController::class, 'store'])->name('category.create');
Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/edit/{id}', [CategoryController::class, 'update'])->name('category.update');