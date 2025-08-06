<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabaRugiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Carbon::setLocale('id');
        // Ambil tahun ini
        $year = $request->query('tahun');

        // Array untuk menyimpan laporan per bulan
        $monthlySummary = [];
        $totalKeuntungan = 0;  // Variabel untuk menyimpan total keuntungan sepanjang tahun

        // Loop dari Januari hingga Desember
        for ($month = 1; $month <= 12; $month++) {
            // Ambil start dan end date untuk bulan tersebut
            $startOfMonth = Carbon::createFromDate($year, $month, 1)->startOfMonth();
            $endOfMonth = Carbon::createFromDate($year, $month, 1)->endOfMonth();

            // Format nama bulan
            $monthName = $startOfMonth->isoFormat('MMMM YYYY');

            $startOfMonthFormatted = $startOfMonth->format('Y-m-d H:i:s');
            $endOfMonthFormatted = $endOfMonth->format('Y-m-d H:i:s');

            // Ambil total pemasukan untuk bulan ini
            $pemasukan = DB::table('transaksis')
                ->whereBetween('date_transaction', [$startOfMonthFormatted, $endOfMonthFormatted])
                ->join('kategoris', 'transaksis.category_id', '=', 'kategoris.id')
                ->where('kategoris.type', 'pemasukan')
                ->sum('amount');

            // Ambil total pengeluaran untuk bulan ini
            $pengeluaran = DB::table('transaksis')
                ->whereBetween('date_transaction', [$startOfMonthFormatted, $endOfMonthFormatted])
                ->join('kategoris', 'transaksis.category_id', '=', 'kategoris.id')
                ->where('kategoris.type', 'pengeluaran') // Kategori pengeluaran
                ->sum('amount'); // Total pengeluaran

            // Menghitung keuntungan (pemasukan - pengeluaran)
            $keuntungan = $pemasukan - $pengeluaran;

            // Menambahkan keuntungan bulan ini ke total keuntungan tahunan
            $totalKeuntungan += $keuntungan;

            // Menyimpan hasil ke dalam array
            $monthlySummary[] = [
                'month' => $monthName, //
                'pengeluaran' => number_format($pengeluaran, 0, ',', '.'),
                'pemasukan' => number_format($pemasukan, 0, ',', '.'),
                'keuntungan' => number_format($keuntungan, 0, ',', '.')
            ];
        }

        // Mengirim data ke view
        return view('src.pages.laporan.laba-rugi', [
            'keuntunganBulanan' => $monthlySummary,
            'tahun' => $year,
            'totalKeuntungan' => number_format($totalKeuntungan, 0, ',', '.')
        ]);
    }
}
