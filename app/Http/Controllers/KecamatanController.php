<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::all();
        return view('kecamatan.index', compact('kecamatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'name' => 'required|string|max:100',
            'status' => 'required|string|max:20',
        ]);

        Kecamatan::create($request->all());
        return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan ditambahkan.');
    }

    public function edit(Kecamatan $kecamatan)
    {
        return view('kecamatan.edit', compact('kecamatan'));
    }

    public function update(Request $request, Kecamatan $kecamatan)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'name' => 'required|string|max:100',
            'status' => 'required|string|max:20',
        ]);

        $kecamatan->update($request->all());
        return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan diperbarui.');
    }

    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan dihapus.');
    }
}
