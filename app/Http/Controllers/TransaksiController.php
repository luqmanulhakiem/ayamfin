<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransaksiRequest;
use App\Models\Kategori;
use App\Models\Transaksi;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(TransaksiRequest $request, string $type)
    {
        $form = $request->validated();
        Transaksi::create([
            'user_id' => Auth::user()->id,
            'category_id' => $form['category_id'],
            'amount' => $form['amount'],
            'date_transaction' => Carbon::now(),
        ]);

        if ($type != "pemasukan") {
            return redirect()->route("pencatatan.pengeluaran")->withSuccess('Berhasil Mencatat Pengeluaran');
        } else {
            return redirect()->route("pencatatan.pemasukan")->withSuccess('Berhasil Mencatat Pemasukan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function pemasukan()
    {
        return view('src.pages.transaksi.pemasukan');
    }

    public function pengeluaran()
    {
        $category = Kategori::where('type', 'pengeluaran')->whereNot('type_pengeluaran', null)->where('status', 'active')->get();
        return view('src.pages.transaksi.pengeluaran', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
