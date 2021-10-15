<?php

use App\Http\Controllers\DompetKeluarController;
use Illuminate\Support\Facades\Route;


// Route Dompet
Route::group(['prefix' => 'dompet_keluar'], function () { // membaut group prefix untuk membedakan route yang di akses
    Route::get('/', [DompetKeluarController::class, 'index'])->name('dompet_keluar');
    Route::get('create', [DompetKeluarController::class, 'create'])->name('dompet_keluar.create');
    Route::post('store', [DompetKeluarController::class, 'store'])->name('dompet_keluar.store');
    Route::get('edit/{id}', [DompetKeluarController::class, 'edit'])->name('dompet_keluar.edit');
    Route::put('update/{id}', [DompetKeluarController::class, 'update'])->name('dompet_keluar.update');
    Route::get('ubah_status/{id}', [DompetKeluarController::class, 'ubah_status'])->name('dompet_keluar.status');
    Route::get('show/{id}', [DompetKeluarController::class, 'show'])->name('dompet_keluar.show');
});
