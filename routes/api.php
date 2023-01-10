<?php

use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PembelianController;
use App\Http\Controllers\Api\PenjualanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::middleware('auth:api')
    ->group(function () {
        // Debit card endpoints
        Route::post('getUser', [UserController::class, 'details']);

        Route::group(['namespace' => 'kategori', 'prefix' => 'kategori'], function () {
            Route::post('list', [KategoriController::class, 'getKategori']);
            Route::post('add', [KategoriController::class, 'addKategori']);
            Route::put('update/{index}', [KategoriController::class, 'updateKategori']);
            Route::delete('softdelete/{index}', [KategoriController::class, 'softDelete']);
        });

        Route::group(['namespace' => 'supplier', 'prefix' => 'supplier'], function () {
            Route::post('list', [SupplierController::class, 'getSupplier']);
            Route::post('add', [SupplierController::class, 'addSupplier']);
            Route::put('update/{index}', [SupplierController::class, 'updateSupplier']);
            Route::delete('softdelete/{index}', [SupplierController::class, 'softDelete']);
        });

        Route::group(['namespace' => 'barang', 'prefix' => 'barang'], function () {
            Route::post('list', [BarangController::class, 'getBarang']);
            Route::post('add', [BarangController::class, 'addBarang']);
            Route::post('update/{index}', [BarangController::class, 'updateBarang']);
            Route::delete('softdelete/{index}', [BarangController::class, 'softDelete']);
        });

        Route::group(['namespace' => 'pembelian', 'prefix' => 'pembelian'], function () {
            Route::post('list', [PembelianController::class, 'getPembelian']);
            Route::post('add', [PembelianController::class, 'addPembelian']);
            Route::put('update/{index}', [PembelianController::class, 'updateKSupplier']);
            Route::delete('softdelete/{index}', [PembelianController::class, 'softDelete']);
        });

        Route::group(['namespace' => 'penjualan', 'prefix' => 'penjualan'], function () {
            Route::post('list', [PenjualanController::class, 'getPenjualan']);
            Route::post('add', [PenjualanController::class, 'addPenjualan']);
            Route::put('update/{index}', [PenjualanController::class, 'updateKSupplier']);
            Route::delete('softdelete/{index}', [PenjualanController::class, 'softDelete']);
        });
    });
