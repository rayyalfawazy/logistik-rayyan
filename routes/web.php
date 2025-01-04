<?php

use App\Http\Controllers\StokBarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;

Route::get('/', [StokBarangController::class, 'index'])->name('stok-barang');
Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barang-masuk');
Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])->name('barang-keluar');
Route::post('/barang-masuk/add', [BarangMasukController::class, 'store'])->name('barang-masuk.add');
Route::post('/barang-keluar/add', [BarangKeluarController::class, 'store'])->name('barang-keluar.add');