<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PegawaiController;

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

Route::get('/kelurahan/{kecamatan}',[kelurahanController::class, 'getKelurahan']);

Route::prefix('dashboard')->group(function () {
    Route::prefix('provinsi')->group(function (){
        Route::get('/', [ProvinsiController::class, 'index']);
        Route::get('/create', [ProvinsiController::class, 'create']);
        Route::post('/store', [provinsiController::class,'store']);
        Route::get('/edit/{id}', [provinsiController::class, 'edit']);
        Route::post('/update/{id}', [provinsiController::class, 'update']);
        Route::delete('/delete/{id}', [provinsiController::class, 'destroy']);
    });


    Route::prefix('kecamatan')->group(function (){
        Route::get('/', [KecamatanController::class, 'index']);
        Route::get('/create', [KecamatanController::class, 'create']);
        Route::post('/store', [KecamatanController::class,'store']);
        Route::get('/edit/{id}', [KecamatanController::class, 'edit']);
        Route::post('/update/{id}', [KecamatanController::class, 'update']);
        Route::delete('/delete/{id}', [KecamatanController::class, 'destroy']);
    });


    Route::prefix('kelurahan')->group(function (){
        Route::get('/', [kelurahanController::class, 'index']);
        // Route::get('/{kecamatan}',[kelurahanController::class, 'getKelurahan']);
        Route::get('/create', [kelurahanController::class, 'create']);
        Route::post('/store', [kelurahanController::class,'store']);
        Route::get('/edit/{id}', [kelurahanController::class, 'edit']);
        Route::post('/update/{id}', [kelurahanController::class, 'update']);
        Route::delete('/delete/{id}', [kelurahanController::class, 'destroy']);
    });


    Route::prefix('pegawai')->group(function (){
        Route::get('/', [pegawaiController::class, 'index']);
        Route::get('/create', [pegawaiController::class, 'create']);
        Route::post('/store', [pegawaiController::class,'store']);
        Route::get('/edit/{id}', [pegawaiController::class, 'edit']);
        Route::post('/update/{id}', [pegawaiController::class, 'update']);
        Route::delete('/delete/{id}', [pegawaiController::class, 'destroy']);
    });
});
