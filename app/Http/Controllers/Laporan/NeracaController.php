<?php

namespace App\Http\Controllers\Laporan;

use App\Exports\NeracaExport;
use App\Http\Controllers\Controller;
use App\Models\Aset;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NeracaController extends Controller
{
    public function index(Request $request)
    {
        $data = Aset::get();
        return view('src.pages.laporan.neraca', compact('data'));
    }


    public function export(Request $request)
    {
        // Memanggil kelas export dengan parameter tahun
        return Excel::download(new NeracaExport(), 'laporan-neraca.xlsx');
    }
}
