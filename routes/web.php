<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/', [CustomerController::class, 'index']);

Route::get('/customers', [CustomerController::class, 'index'])->name('customers');

Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');


