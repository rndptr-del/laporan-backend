<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\TimbangController;

Route::get('/pengembalian', [PengembalianController::class, 'index']);
Route::delete('/pengembalian/{id}', [PengembalianController::class, 'destroy']);
Route::post('/pengembalian', [PengembalianController::class, 'store']);

Route::get('/timbang', [TimbangController::class, 'index']);
Route::delete('/timbang/{id}', [TimbangController::class, 'destroy']);
Route::post('/timbang', [TimbangController::class, 'store']);
