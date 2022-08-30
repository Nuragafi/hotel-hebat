<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\reservasiController;
use App\Http\Controllers\kamarController;
use App\Http\Controllers\fasilitasController;
use App\Http\Controllers\jeniskamarController;

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

Route::get('/', [fasilitasController::class, 'card']);

//Reservasi
Route::get('reservasi/{kamar}', [reservasiController::class, 'show'])->name('formReservasi');
Route::post('reservasi/{kamar}', [reservasiController::class, 'store'])->name('Reservasi');
Route::get('reservasi/kwitansi/{reservasi}', [reservasiController::class, 'kwitansi'])->name('Kwitansi');


//Admin
Route::get('admin', [loginController::class, 'Formlogin']);
Route::get('login', [loginController::class, 'Formlogin'])->name('login');
Route::post('admin', [loginController::class, 'login']);
Route::post('admin/login', [loginController::class, 'login']);

//Resepsionis
Route::get('resepsionis', [loginController::class, 'Formlogin']);
Route::get('login', [loginController::class, 'Formlogin'])->name('login');
Route::post('resepsionis', [loginController::class, 'login']);
Route::post('resepsionis/login', [loginController::class, 'login']);


Route::middleware('auth')->group(function () {
    //Route Resepsionis
    Route::get('resepsionis/dashboard', [reservasiController::class, 'index'])->name('resepsionis');
    Route::get('resepsionis/proses/{reservasi}', [reservasiController::class, 'edit'])->name('formProses');
    Route::put('resepsionis/proses/{reservasi}', [reservasiController::class, 'update'])->name('Proses');


    //Route Kamar
    Route::get('admin/kamar', [kamarController::class, 'index'])->name('listKamar');
    Route::get('admin/tambahKamar', [kamarController::class, 'form'])->name('formTambahKamar');
    Route::post('admin/tambahKamar', [kamarController::class, 'store'])->name('TambahKamar');
    Route::get('admin/kamar/edit/{kamar}', [kamarController::class, 'detail'])->name('formEditKamar');
    Route::put('admin/kamar/edit/{kamar}', [kamarController::class, 'update'])->name('EditKamar');
    Route::delete('admin/kamar/{kamar}', [kamarController::class, 'destroy'])->name('HapusKamar');

    //Route Jenis Kamar
    Route::get('admin/jenis', [jeniskamarController::class, 'index'])->name('listTambahJenisKamar');
    Route::get('admin/tambahJenis', [jeniskamarController::class, 'form'])->name('formTambahJenisKamar');
    Route::post('admin/tambahJenis', [jeniskamarController::class, 'store'])->name('TambahJenisKamar');
    Route::get('admin/jenis/edit/{jeniskamar}', [jeniskamarController::class, 'detail'])->name('formEditJenisKamar');
    Route::put('admin/jenis/edit/{jeniskamar}', [jeniskamarController::class, 'update'])->name('EditJenisKamar');
    Route::delete('admin/jenis/{jeniskamar}', [jeniskamarController::class, 'destroy'])->name('HapusJenisKamar');

    //Route fasilitas
    Route::get('admin/fasilitas', [fasilitasController::class, 'index'])->name('listFasilitas');
    Route::get('admin/tambahFasilitas', [fasilitasController::class, 'form'])->name('formTambahFasilitas');
    Route::post('admin/tambahFasilitas', [fasilitasController::class, 'store'])->name('TambahFasilitas');
    Route::get('admin/fasilitas/edit/{fasilitas}', [fasilitasController::class, 'detail'])->name('formEditFasilitas');
    Route::put('admin/fasilitas/edit/{fasilitas}', [fasilitasController::class, 'update'])->name('EditFasilitas');
    Route::delete('admin/fasilitas/{fasilitas}', [fasilitasController::class, 'destroy'])->name('HapusFasilitas');

    //Route Users
    Route::get('admin/users', [loginController::class, 'index'])->name('listUsers');
    Route::get('admin/register', [loginController::class, 'register'])->name('formRegister');
    Route::post('admin/register', [loginController::class, 'store'])->name('Register');
    Route::get('admin/users/edit/{user}', [loginController::class, 'edit'])->name('formEditUsers');
    Route::put('admin/users/edit/{user}', [loginController::class, 'update'])->name('EditUsers');
    Route::delete('admin/users/{user}', [loginController::class, 'destroy'])->name('HapusUsers');

    //Logout
    Route::get('admin/logout', [loginController::class, 'logout'])->name('logout');
    Route::get('resepsionis/logout', [loginController::class, 'logout'])->name('logout');
});
