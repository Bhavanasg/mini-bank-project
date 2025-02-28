<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('index');

Route::get('customers',[CustomerController::class, 'index'])->name('customers.view');
Route::get('customers/add',[CustomerController::class, 'addCustomer'])->name('customers.add');
Route::post('customers/add',[CustomerController::class, 'storeCustomer'])->name('customers.store');
Route::get('customers/edit/{id}',[CustomerController::class, 'editCustomer'])->name('customers.edit');
Route::get('customers/delete/{id}',[CustomerController::class, 'deleteCustomer'])->name('customers.delete');
Route::post('customers/update',[CustomerController::class, 'updateCustomer'])->name('customers.update');

Route::get('transactions/view/{id}',[TransactionController::class, 'index'])->name('transactions.view');

