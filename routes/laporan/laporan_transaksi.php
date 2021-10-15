<?php

use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;


// Route Laporan
Route::group(['prefix' => 'laporan'], function () { // membaut group prefix untuk membedakan route yang di akses
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::post('show', [LaporanController::class, 'show'])->name('laporan.show');
    Route::post('export', [LaporanController::class, 'export'])->name('export');
});
