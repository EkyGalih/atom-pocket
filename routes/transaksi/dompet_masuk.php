<?php

use App\Http\Controllers\DompetMasukController;
use Illuminate\Support\Facades\Route;


// Route Dompet
Route::group(['prefix' => 'dompet_masuk'], function () { // membaut group prefix untuk membedakan route yang di akses
    Route::get('dompet', [DompetMasukController::class, 'index'])->name('dompet_masuk');
    Route::get('create', [DompetMasukController::class, 'create'])->name('dompet_masuk.create');
    Route::post('store', [DompetMasukController::class, 'store'])->name('dompet_masuk.store');
    Route::get('edit/{id}', [DompetMasukController::class, 'edit'])->name('dompet_masuk.edit');
    Route::put('update/{id}', [DompetMasukController::class, 'update'])->name('dompet_masuk.update');
    Route::get('ubah_status/{id}', [DompetMasukController::class, 'ubah_status'])->name('dompet_masuk.status');
    Route::get('show/{id}', [DompetMasukController::class, 'show'])->name('dompet_masuk.show');
});
