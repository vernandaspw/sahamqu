<?php

use App\Http\Controllers\BerandaPageController;
use App\Http\Controllers\BrokerPageController;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\PerusahaanPageController;
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



Route::middleware(['noauth'])->group(function () {
    Route::get('/', [LoginPageController::class, 'index'])->name('/');
    Route::post('/login', [LoginPageController::class, 'login']);
});


Route::middleware(['auth'])->group(function () {
    Route::get('beranda', [BerandaPageController::class, 'index']);
    Route::get('broker', [BrokerPageController::class, 'index']);
    Route::get('perusahaan', [PerusahaanPageController::class, 'index']);
    Route::get('akun', [BerandaPageController::class, 'index']);

    Route::get('logout', [LoginPageController::class, 'logout']);
});
