<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\TimbangController;
use App\Http\Controllers\ValidasiController;
use Dotenv\Parser\Value;

Route::get('/pengembalian', [PengembalianController::class, 'index']);
Route::delete('/pengembalian/{id}', [PengembalianController::class, 'destroy']);
Route::post('/pengembalian', [PengembalianController::class, 'store']);

Route::get('/timbang', [TimbangController::class, 'index']);
Route::delete('/timbang/{id}', [TimbangController::class, 'destroy']);
Route::post('/timbang', [TimbangController::class, 'store']);

Route::get('/timbang/export', [TimbangController::class, 'export']);

Route::get('/validasi', [ValidasiController::class, 'index']);
Route::post('/validasi/update', [ValidasiController::class, 'update']);
Route::post('/validasi/updateCones', [ValidasiController::class, 'updateCones']);
Route::post('/validasi/updateRemarks', [ValidasiController::class, 'updateRemarks']);
Route::post('/validasi/export', [ValidasiController::class, 'export']);
Route::post('/validasi', [ValidasiController::class, 'store']);