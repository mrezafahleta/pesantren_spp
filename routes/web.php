<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\User\PenggunaController;
use App\Http\Controllers\User\SppController as UserSppController;
use App\Http\Controllers\UserController;
use App\Models\Spp;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);
Route::get('/pendaftaran', [HomeController::class,'pendaftaran'])->name('pendaftaran');
Route::post('/pendaftaran', [HomeController::class,'store'])->name('store.pendaftaran');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('profil', [PenggunaController::class, 'profil'])->name('user.profil');
    Route::put('profil', [PenggunaController::class, 'update_profil'])->name('update.profil');
    Route::put('fotoprofil', [PenggunaController::class, 'update_foto_profil'])->name('update.foto');
    Route::get('pembayaran-spp', [UserSppController::class, 'data'])->name('data.spp');
});

Route::prefix('admin')->middleware('role:Admin', 'auth')->group(function () {

    // user pengguna
    Route::get('user', [UserController::class, 'data'])->name('admin.user');
    Route::post('user', [UserController::class, 'store'])->name('user.store');
    Route::get('user/getnik', [UserController::class, 'loadniksiswa'])->name('cari-user');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('data_siswa', [StudentController::class, 'index'])->name('siswa.data');
    Route::get('siswa/{student:nik}/info', [StudentController::class, 'info'])->name('siswa.info');

    Route::get('siswa/tambah_siswa', [StudentController::class, 'create'])->name('tambah.siswa');
    Route::post('siswa/store', [StudentController::class, 'store']);
    Route::get('siswa/{student:nik}/edit', [StudentController::class, 'edit'])->name('siswa.edit');
    Route::put('siswa/{student:nik}/edit', [StudentController::class, 'update']);
    Route::delete('data_siswa/delete/{student:nik}', [StudentController::class, 'destroy'])->name('siswa.delete');

    // SPP
    Route::get('pembayaran/spp', [SppController::class, 'index'])->name('pembayaran.spp');

    Route::get('pembayaran/spp/data', [SppController::class, 'pencarian_nis'])->name('pencarian');
    Route::post('spp/store', [SppController::class, 'store'])->name('store.spp');
    Route::get('pembayaran/spp/getSiswa/', [SppController::class, 'loadDataSiswa'])->name('cari-siswa');

    // cetak laporan
    Route::get('{spp:nik_murid}/cetak', [LaporanController::class, 'viewCetak'])->name('viewCetak.spp');
    Route::get('{spp:nik_murid}/cetakdata', [LaporanController::class, 'cetakspp'])->name('cetak.spp');
    Route::get('laporan/spp', [LaporanController::class, 'laporan'])->name('laporan.spp');
    Route::post('laporan/spp1', [LaporanController::class, 'cari_laporan'])->name('cari.spp');
    Route::get('laporan/spp/getSiswa/', [LaporanController::class, 'loadDataSiswa'])->name('laporan.cari-siswa');
    Route::post('laporan/spp2', [LaporanController::class, 'cari_laporan_nik'])->name('cari.spp.nik');
});
