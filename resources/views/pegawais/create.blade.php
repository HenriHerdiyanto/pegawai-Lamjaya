@extends('layouts.user')

@section('content')
<form action="{{ route('pegawais.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="">Nama Pegawai</label>
        <input name="name" placeholder="Nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="">tempat lahir</label>
        <input name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
    </div>
    <div class="mb-3">
        <label for="">Tanggal lahir</label>
        <input type="date" name="tgl_lahir" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="">Jenis kelamain</label>
        <select name="gender" class="form-control" required>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="">Agama</label>
        <input name="agama" placeholder="Agama" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="">alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label for="">Kelurahan</label>
        <select name="id_kelurahan" class="form-control">
            <option selected>--PILIH--</option>
            @foreach ($kelurahan as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="">Kecamatan</label>
        <select name="id_kecamatan" class="form-control">
            <option selected>--PILIH--</option>
            @foreach ($kecamatan as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="">Provinsi</label>
        <select name="id_provinsi" class="form-control">
            <option selected>--PILIH--</option>
            @foreach ($provinsi as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection