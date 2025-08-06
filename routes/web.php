<?php

use App\Exports\ArusKasExport;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Laporan\ArusKasController;
use App\Http\Controllers\Laporan\LabaRugiController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Cek Apakah User Sudah Login
    if (Auth::user() != null) {
        // Jika Sudah Pergi ke Dashboard
        return redirect()->route('dashboard');
    } else {
        // Jika Belum Pergi Ke halaman Login
        return redirect()->route('login');
    }
});

// Controller Ketika Sebelum Login
Route::group(['middleware' => ['guest']], function () {
    Route::prefix('auth')->group(function () {
        // Halaman Login
        Route::get('login', function () {
            return view('src.auth.login');
        })->name('login');
        // Request Login
        Route::controller(AuthController::class)->group(function () {
            Route::post('/login-request', 'login')->name('login.request');
        });
    });
});


// Controller Ketika Sudah Login
Route::group(['middleware' => ['auth']], function () {
    // Logout
    Route::get('/logout-request', [AuthController::class, 'logout'])->name('logout.request');
    // Dashboard
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        // Management
        Route::prefix('management')->group(function () {
            // Kategori Controller
            Route::controller(KategoriController::class)->group(function () {
                // Halaman Index Kategori
                Route::get("kategori", 'index')->name('kategori');
                Route::get("kategori/tambah", 'create')->name('kategori.create');
                Route::post("kategori/store", 'store')->name('kategori.store');
                Route::get("kategori/edit/{id}", 'edit')->name('kategori.edit');
                Route::post("kategori/update/{id}", 'update')->name('kategori.update');
                Route::get("kategori/update/{id}/status", 'updateStatus')->name('kategori.update.status');
            });

            // Karyawan Controller
            Route::controller(KaryawanController::class)->group(function () {
                // Halaman Index Karyawan
                Route::get("karyawan", 'index')->name('karyawan');
                Route::get("karyawan/tambah", 'create')->name('karyawan.create');
                Route::post("karyawan/store", 'store')->name('karyawan.store');
                Route::get("karyawan/edit/{karyawan}", 'edit')->name('karyawan.edit');
                Route::post("karyawan/update/{karyawan}", 'update')->name('karyawan.update');
                Route::delete("karyawan/destroy/{karyawan}", 'destroy')->name('karyawan.destroy');
            });

            // Aset Controller
            Route::controller(AsetController::class)->group(function () {
                // Halaman Index Aset
                Route::get("aset", 'index')->name('aset');
                Route::get("aset/tambah", 'create')->name('aset.create');
                Route::post("aset/store", 'store')->name('aset.store');
                Route::get("aset/edit/{aset}", 'edit')->name('aset.edit');
                Route::post("aset/update/{aset}", 'update')->name('aset.update');
                Route::delete("aset/destroy/{aset}", 'destroy')->name('aset.destroy');
            });
        });

        // Pencatatan
        Route::prefix('pencatatan')->group(function () {
            // Transaksi Controller (Pencatatan Pemasukan)
            Route::controller(TransaksiController::class)->group(function () {
                // Halaman Index Transaksi (Pencatatan Pemasukan)
                Route::get("pemasukan", 'pemasukan')->name('pencatatan.pemasukan');
                Route::get("pengeluaran", 'pengeluaran')->name('pencatatan.pengeluaran');
                Route::post("pencatatan/store/{type}", 'store')->name('pencatatan.store');

                // Route::get("karyawan/tambah", 'create')->name('karyawan.create');
                // Route::post("karyawan/store", 'store')->name('karyawan.store');
                // Route::get("karyawan/edit/{karyawan}", 'edit')->name('karyawan.edit');
                // Route::post("karyawan/update/{karyawan}", 'update')->name('karyawan.update');
                // Route::delete("karyawan/destroy/{karyawan}", 'destroy')->name('karyawan.destroy');
            });
        });

        Route::prefix('laporan')->group(function () {
            Route::get("arus-kas", [ArusKasController::class, 'index'])->name('arus-kas');
            Route::get('arus-kas/export', [ArusKasController::class, 'exportArusKas'])->name('arus-kas.export');
            Route::get("laba-rugi", [LabaRugiController::class, 'index'])->name('laba-rugi');
            Route::get('laba-rugi/export', [LabaRugiController::class, 'exportLabaRugi'])->name('laba-rugi.export');
        });
    });
});
