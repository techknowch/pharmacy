<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineGenericController;
use App\Http\Controllers;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\MedicineOrderController;
use App\Http\Controllers\SupplierController;
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


Route::middleware(['auth:web'])->group(function () {
    // ...
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('medicines', MedicineController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('invoices', InvoiceController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('medicine-generics', MedicineGenericController::class);
    Route::resource('orders',MedicineOrderController::class);
});

Auth::routes();