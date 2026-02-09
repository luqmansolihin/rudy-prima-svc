<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SparepartController;
use Illuminate\Support\Facades\Route;

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
    return view('layouts.app');
});

Route::prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/store', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
});

Route::prefix('mechanics')->group(function () {
    Route::get('/', [MechanicController::class, 'index'])->name('mechanics.index');
    Route::get('/create', [MechanicController::class, 'create'])->name('mechanics.create');
    Route::post('/store', [MechanicController::class, 'store'])->name('mechanics.store');
    Route::get('/{id}/edit', [MechanicController::class, 'edit'])->name('mechanics.edit');
    Route::put('/{id}', [MechanicController::class, 'update'])->name('mechanics.update');
    Route::delete('/{id}', [MechanicController::class, 'destroy'])->name('mechanics.destroy');
});

Route::prefix('suppliers')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('/create', [SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('/store', [SupplierController::class, 'store'])->name('suppliers.store');
    Route::get('/{id}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::put('/{id}', [SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('/{id}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
});

Route::prefix('spareparts')->group(function () {
    Route::get('/', [SparepartController::class, 'index'])->name('spareparts.index');
    Route::get('/create', [SparepartController::class, 'create'])->name('spareparts.create');
    Route::post('/store', [SparepartController::class, 'store'])->name('spareparts.store');
    Route::get('/{id}/edit', [SparepartController::class, 'edit'])->name('spareparts.edit');
    Route::put('/{id}', [SparepartController::class, 'update'])->name('spareparts.update');
    Route::delete('/{id}', [SparepartController::class, 'destroy'])->name('spareparts.destroy');
});
