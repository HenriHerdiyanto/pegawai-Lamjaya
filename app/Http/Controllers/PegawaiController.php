<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pegawai;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawais.index', compact('pegawais'));
    }

    public function create()
    {
        $provinsi = Provinsi::all();
        $kelurahan = Kelurahan::all();
        $kecamatan = Kecamatan::all();
        $pegawais = Pegawai::all();
        return view('pegawais.create', compact('pegawais', 'provinsi', 'kelurahan', 'kecamatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'gender' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'id_kelurahan' => 'required|integer',
            'id_kecamatan' => 'required|integer',
            'id_provinsi' => 'required|integer',
        ]);

        Pegawai::create($request->all());

        return redirect()->route('pegawais.index')->with('success', 'Pegawai created successfully.');
    }

    public function edit($id)
    {
        $provinsi = Provinsi::all();
        $kelurahan = Kelurahan::all();
        $kecamatan = Kecamatan::all();
        $pegawais = Pegawai::find($id);
        return view('pegawais.edit', compact('pegawais', 'provinsi', 'kelurahan', 'kecamatan'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'name' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'gender' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'id_kelurahan' => 'required|integer',
            'id_kecamatan' => 'required|integer',
            'id_provinsi' => 'required|integer',
        ]);

        $pegawai->update($request->all());

        return redirect()->route('pegawais.index')->with('success', 'Pegawai updated successfully.');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect()->route('pegawais.index')->with('success', 'Pegawai deleted successfully.');
    }
}
