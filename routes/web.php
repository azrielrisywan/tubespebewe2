<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
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
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/produk', function () {
        return view('produk');
    })->name('produk');

    Route::get('/karyawan', function () {
        return view('karyawan');
    })->name('karyawan');

    Route::put('/produk', [ProdukController::class, 'store'])->name('tambah.produk');
    Route::put('/karyawan', [KaryawanController::class, 'store'])->name('tambah.karyawan');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/editKaryawan/{id}', [DashboardController::class, 'editKaryawan'])->name('editKaryawan');


    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');

    Route::post('/transaksi', [CartController::class, 'store'])->name('cart.store');

    Route::post('/transaksi/destroy', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::post('/transaksi/remove', [CartController::class, 'remove'])->name('cart.removeitem');

    Route::get('/transaksi/cartList', [CartController::class, 'cartList'])->name('cart.list');

});

require __DIR__.'/auth.php';
