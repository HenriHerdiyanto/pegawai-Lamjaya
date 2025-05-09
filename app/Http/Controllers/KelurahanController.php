<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index()
    {
        $provinsi = Provinsi::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        return view('kelurahan.index', compact('kelurahan', 'provinsi', 'kecamatan'));
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        $provinsi = Provinsi::all();
        return view('kelurahan.create', compact('kecamatan', 'provinsi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'name' => 'required|string|max:100',
            'id_kecamatan' => 'required',
            // 'id_provinsi' => 'required',
            'status' => 'required|string|max:20',
        ]);

        Kelurahan::create($request->all());
        return redirect()->route('kelurahan.index')->with('success', 'Data kelurahan ditambahkan.');
    }

    public function edit(Kelurahan $kelurahan)
    {
        $kecamatan = Kecamatan::all();
        $provinsi = Provinsi::all();
        return view('kelurahan.edit', compact('kelurahan', 'kecamatan', 'provinsi'));
    }

    public function update(Request $request, Kelurahan $kelurahan)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'name' => 'required|string|max:100',
            'id_kecamatan' => 'required',
            // 'id_provinsi' => 'required|exists:provinsi,id',
            'status' => 'required|string|max:20',
        ]);

        $kelurahan->update($request->all());
        return redirect()->route('kelurahan.index')->with('success', 'Data kelurahan diperbarui.');
    }

    public function destroy(Kelurahan $kelurahan)
    {
        $kelurahan->delete();
        return redirect()->route('kelurahan.index')->with('success', 'Data kelurahan dihapus.');
    }
}
