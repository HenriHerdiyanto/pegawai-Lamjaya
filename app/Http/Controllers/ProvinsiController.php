<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
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

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'kode' => 'required|string|max:10|unique:provinsis,kode',
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,nonactive',
        ]);

        // Simpan ke database
        Provinsi::create([
            'kode' => $request->kode,
            'name' => $request->name,
            'status' => $request->status,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data provinsi berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Provinsi $provinsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provinsi $provinsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'name' => 'required|string|max:100',
            'status' => 'required|string|max:20',
        ]);

        $provinsi = Provinsi::findOrFail($id);
        $provinsi->kode = $request->kode;
        $provinsi->name = $request->name;
        $provinsi->status = $request->status;
        $provinsi->save();

        return redirect()->back()->with('success', 'Data provinsi berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();

        return redirect()->back()->with('success', 'Data provinsi berhasil dihapus.');
    }
}
