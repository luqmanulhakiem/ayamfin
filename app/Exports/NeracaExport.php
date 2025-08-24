<?php

namespace App\Exports;

use App\Models\Aset;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class NeracaExport implements FromView
{
    /**
     * @return \Illuminate\Support\View
     */
    public function view(): View
    {
        $data = Aset::all();
        return view('exports.neraca', ['data' => $data]);
    }
}
