<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsetRequest;
use App\Models\Aset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Aset!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $data = Aset::get();
        return view('src.pages.aset.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('src.pages.aset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AsetRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;

        Aset::create($data);

        return redirect()->route('aset')->withSuccess('Berhasil Menambah Aset');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aset $aset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aset $aset)
    {
        return view('src.pages.aset.edit', compact('aset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AsetRequest $request, Aset $aset)
    {
        $form = $request->validated();
        $aset->update($form);
        return redirect()->route('aset')->withSuccess('Berhasil Mengupdate Aset');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aset $aset)
    {
        $aset->delete();
        return redirect()->route('aset')->withSuccess('Berhasil Menghapus Aset');
    }
}
