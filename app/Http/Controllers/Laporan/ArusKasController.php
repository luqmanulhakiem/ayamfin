<?php

namespace App\Http\Controllers\Laporan;

use App\Exports\ArusKasExport;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ArusKasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $startDate = $request->query('startDate');
        $endDate = $request->query('endDate');
        $debitSaatIni = 0;
        $kreditSaatIni = 0;
        $saldoSaatIni = 0;



        $data = Transaksi::with('kategori', 'user')
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                return $query->whereBetween('date_transaction', [
                    Carbon::parse($startDate)->format('Y-m-d'),
                    Carbon::parse($endDate)->format('Y-m-d')
                ]);
            })
            ->orderBy('date_transaction', 'desc')
            ->get();

        foreach ($data as $item) {
            if ($item->kategori->type == "pemasukan") {
                $debit = $item->amount;
                $debitSaatIni += $debit;
                $saldoSaatIni += $debit;
            } else {
                $kredit = $item->amount;
                $kreditSaatIni += $kredit;
                $saldoSaatIni -= $kredit;
            }
        }

        return view('src.pages.laporan.arus-kas', compact('data', 'startDate', 'endDate', 'kreditSaatIni', 'debitSaatIni', 'saldoSaatIni'));
    }

    public function exportArusKas(Request $request)
    {
        $startDate = $request->query('startDate');
        $endDate = $request->query('endDate');

        // Memanggil kelas export dengan parameter tahun
        return Excel::download(new ArusKasExport($startDate, $endDate), 'laporan-arus-kas-' . $startDate . '_' . $endDate . '.xlsx');
        // return $excel->download(new ArusKasExport($startDate, $endDate), 'laporan-arus-kas-' . $startDate . '_' . $endDate . '.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
