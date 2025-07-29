<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //**
    /* Logika Penanganan Autentikasi Login
    /* User wajib mengirim parameter 'email' dan 'password'
    /* */
    public function login(LoginRequest $request)
    {
        // Meminta data ke user
        $data = $request->validated();

        // Mencari akun dengan email yang diinput
        $find = User::where('email', $data['email'])->first();
        // jika akun ditemukan
        if (!empty($find)) {
            // pengecekan password
            if (Hash::check($data['password'], $find->password)) {
                // jika password benar maka loginkan akun
                Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
                // Kembalikan tampilan ke halaman dashboard
                return redirect()->route('dashboard');
            } else {
                // Jika password salah
                return redirect()->back()->withInput()->withErrors(['errors' => 'Password salah']);
            }
        }
        // jika akun tidak ditemukan
        return redirect()->back()->withInput()->withErrors(['errors' => 'Email tidak ditemukan']);
    }

    //**
    /* Logika Penanganan Autentikasi Logout
    /* */
    public function logout()
    {
        // Lakukan Logout
        Auth::logout();
        // Kembalikan tampilan ke halaman login
        return redirect()->route('login');
    }
}
