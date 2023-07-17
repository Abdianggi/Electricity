<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ElectricityController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', DashboardController::class)->name('dashboard');

Route::prefix('master')
    ->name('master.')
    ->group(function () {
    
    Route::prefix('electricity-meter')
        ->name('electricity_meter.')
        ->group(function () {

        Route::get('', [ElectricityController::class, 'index'])->name('index');
        Route::get('datatable', [ElectricityController::class, 'datatable'])->name('datatable');
    });
    
    Route::prefix('product')
        ->name('product.')
        ->group(function () {

        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::get('datatable', [ProductController::class, 'datatable'])->name('datatable');
        
    });

    Route::prefix('transaction')
        ->name('transaction.')
        ->group(function () {

        Route::get('', [TransactionController::class, 'index'])->name('index');
        Route::get('getelectricity', [TransactionController::class, 'getElectricity'])->name('getElectricity');
        Route::post('payElectricity', [TransactionController::class, 'payElectricity'])->name('payElectricity');
        
    });

    

});
