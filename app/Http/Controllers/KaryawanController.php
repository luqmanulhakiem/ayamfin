<?php

namespace App\Http\Controllers;

use App\Http\Requests\KaryawanRequest;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Karyawan!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $data = Karyawan::get();
        return view('src.pages.karyawan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('src.pages.karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KaryawanRequest $request)
    {
        // Meminta Request ke FrontEnd
        $form = $request->validated();

        // Menyimpan Data
        Karyawan::create($form);

        // Kembali ke halaman karyawan
        return redirect()->route("karyawan")->withSuccess('Berhasil Membuat Karyawan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        return view('src.pages.karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KaryawanRequest $request, Karyawan $karyawan)
    {
        // Meminta Request ke FrontEnd
        $validate = $request->validated();

        // Mengupdate data
        $karyawan->update($validate);

        // Kembali ke halaman karyawan
        return redirect()->route("karyawan")->withSuccess('Berhasil Mengupdate Karyawan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        // Menghapus karyawan
        $karyawan->delete();

        // Kembali ke halaman karyawan
        return redirect()->route("karyawan")->withSuccess('Berhasil Menghapus Karyawan');
    }
}
