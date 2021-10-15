<?php

use App\Http\Controllers\DompetController;
use Illuminate\Support\Facades\Route;


// Route Dompet
Route::get('dompet', [DompetController::class, 'index'])->name('dompet');
Route::get('create', [DompetController::class, 'create'])->name('dompet.create');
Route::post('store', [DompetController::class, 'store'])->name('dompet.store');
Route::get('edit/{id}', [DompetController::class, 'edit'])->name('dompet.edit');
Route::put('update/{id}', [DompetController::class, 'update'])->name('dompet.update');
Route::get('ubah_status/{id}', [DompetController::class, 'ubah_status'])->name('dompet.status');
