<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController;
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

Route::resource('dashboard',DashboardController::class);
Route::resource('absen',AbsenController::class);
Route::resource('anggota', AnggotaController::class);
// Route::put('/pendaftaran/{id}', 'PendaftaranController@update')->name('pendaftaran.update');




Route::get('/', function () {
    return view('welcome');
});

