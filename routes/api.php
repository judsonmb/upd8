<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/customers', [CustomerController::class, 'getCustomers']);

Route::post('/customers/store', [CustomerController::class, 'store']);

Route::delete('/customers/{customer}', [CustomerController::class, 'delete']);

Route::put('/customers/{customer}/update', [CustomerController::class, 'update']);

Route::get('/states', [StateController::class, 'getStates']);

Route::get('/state/{id}/cities', [CityController::class, 'getCitiesFromStateId']);
