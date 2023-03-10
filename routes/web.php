<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ComparisonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('category.index');
        Route::get('/category/create', 'create')->name('category.create');
        Route::post('/category/create', 'store')->name('category.store');
        Route::get('/category/{category:uuid}/edit', 'edit')->name('category.edit');
        Route::put('/category/{category:uuid}', 'update')->name('category.update');
        Route::delete('/category/{category:uuid}', 'destroy')->name('category.destroy');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'index')->name('product.index');
        Route::get('/product/create', 'create')->name('product.create');
        Route::post('/product/create', 'store')->name('product.store');
        Route::get('/product/{product:uuid}/edit', 'edit')->name('product.edit');
        Route::put('/product/{product:uuid}', 'update')->name('product.update');
        Route::delete('/product/{product:uuid}', 'destroy')->name('product.destroy');
    });

    Route::get('/compare', [ComparisonController::class, 'index'])->name('compare.index');
    Route::post('/compare', [ComparisonController::class, 'store'])->name('compare.store');
});

require __DIR__ . '/auth.php';
