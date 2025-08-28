<?php

namespace App\Exports;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ArusKasExport implements FromView
{
    protected $startDate;
    protected $endDate;


    public function __construct($startDate,  $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    /**
     * @return \Illuminate\Support\View
     */
    public function view(): View
    {
        $startDate = $this->startDate;;
        $endDate = $this->endDate;
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

        return view('exports.arus-kas-export', compact('data', 'kreditSaatIni', 'debitSaatIni', 'saldoSaatIni'));
    }
}
