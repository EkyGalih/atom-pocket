<?php

use App\Http\Controllers\DompetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('beranda');
});

// Route Dompet
Route::get('dompet', [DompetController::class, 'index'])->name('dompet');
Route::get('create', [DompetController::class, 'create'])->name('dompet.create');
Route::post('store', [DompetController::class, 'store'])->name('dompet.store');
Route::get('edit/{id}', [DompetController::class, 'edit'])->name('dompet.edit');
Route::put('update/{id}', [DompetController::class, 'update'])->name('dompet.update');
Route::get('ubah_status/{id}', [DompetController::class, 'ubah_status'])->name('dompet.status');
