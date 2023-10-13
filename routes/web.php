<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/save', [ProductController::class, 'save'])->name('products.save');
Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/update/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/delete/{product}', [ProductController::class, 'delete'])->name('products.delete');
Route::get('/view/{product}', [ProductController::class, 'view'])->name('products.view');