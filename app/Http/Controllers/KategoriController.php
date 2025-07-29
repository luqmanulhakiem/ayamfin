<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data kategori berdasarkan urutan tipenya
        $data = Kategori::get()->sortBy('type');
        // Menampilkan halaman kategori bersamaan dengan data kategori
        return view('src.pages.kategori.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // menampilkan halaman pembuatan kategori
        return view('src.pages.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriRequest $request)
    {
        // Meminta Request ke FrontEnd
        $data = $request->validated();

        // Menyimpan Data
        Kategori::create($data);

        // Kembali ke halaman kategori
        return redirect()->route("kategori")->withSuccess('Berhasil Membuat Kategori');
    }

    /**
     * Display the specified resource.
     */
    public function updateStatus(String $id)
    {
        // Mencari Kategori Berdasarkan id
        $data = Kategori::findorfail($id);
        if ($data->status == 'active') {
            $data->update(['status' => 'disable']);
            return redirect()->route("kategori")->withSuccess('Berhasil Mematikan Kategori');
        } else {
            $data->update(['status' => 'active']);
            return redirect()->route("kategori")->withSuccess('Berhasil Menyalakan Kategori');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        // Mencari Kategori Berdasarkan id
        $data = Kategori::findorfail($id);

        // Kembali ke halaman kategori
        return view('src.pages.kategori.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriRequest $request, String $id)
    {
        // Meminta Request ke FrontEnd
        $validate = $request->validated();

        // Mencari Kategori Berdasarkan id
        $data = Kategori::findorfail($id);

        // Mengupdate data
        $data->update($validate);

        // Kembali ke halaman kategori
        return redirect()->route("kategori")->withSuccess('Berhasil Mengupdate Kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
