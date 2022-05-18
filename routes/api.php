<?php

use App\Http\Controllers\API\PerjalananController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\SampahController;
use App\Http\Controllers\API\TransaksiController;
use App\Http\Controllers\API\TransaksiPoin;

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

Route::middleware(['auth:sanctum'])->group(function () {
    // User
    Route::get('user', [UserController::class, 'fetch']);
    Route::get('/getUser', [UserController::class, 'getUser']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('userPhoto', [UserController::class, 'photoProfileUpdate']);
    Route::post('logout', [UserController::class, 'logout']);

    // Nasabah
    Route::get('tabungan',[UserController::class, 'getTabungan']);
    // Route::get('transaksi',[UserController::class, 'getTransaksi']);
    // Route::get('transaksiByPetugas',[UserController::class, 'getTransaksiPetugas']);

    // Sampah
    Route::post('sampah', [SampahController::class, 'inputSampah']);
    Route::post('/sampah/{id}', [SampahController::class, 'updateSampah']);
    Route::delete('/sampah/{id}', [SampahController::class, 'destroy']);

    // Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'all']);
    Route::post('/transaksi', [TransaksiController::class, 'transaksiMasuk']);
    Route::post('/transaksi/nasabah', [TransaksiController::class, 'transaksiByNasabah']);

    // Perjalanan
    Route::get('/perjalanan', [PerjalananController::class, 'all']);
    Route::get('/perjalanan/petugas', [PerjalananController::class, 'getByPetugas']);
    Route::post('/perjalanan/petugas/{id}', [PerjalananController::class, 'updateByPetugas']);
    Route::post('/perjalanan', [PerjalananController::class, 'createPerjalanan']);

    Route::post('/transaksi/poin', [TransaksiPoin::class, 'store']);
});

Route::get('sampah', [SampahController::class, 'all']);

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
