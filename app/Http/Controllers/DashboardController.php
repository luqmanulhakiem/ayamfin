<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // tampilkan halaman dashboard
        // yang berada pada src > pages > dashboard > index.blade.php 
        return view('src.pages.dashboard.index');
    }
}
