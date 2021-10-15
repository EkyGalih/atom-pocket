<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;


// Route Kategori
Route::group(['prefix' => 'kategori'], function () { // membuat group prefix untuk membedakan route yang di akses
    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('ubah_status/{id}', [KategoriController::class, 'ubah_status'])->name('kategori.status');
});
