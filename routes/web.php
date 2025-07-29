<?php

use App\Http\Controllers\AuthController;
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

    Route::prefix('dashboard')->group(function () {
        Route::get('', function () {
            return view('welcome');
        })->name('dashboard');
    });
});
