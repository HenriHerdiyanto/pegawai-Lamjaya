@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>edit data</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('pegawais.update' , $pegawais->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Nama Pegawai</label>
                            <input name="name" placeholder="Nama" class="form-control" value="{{ $pegawais->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">tempat lahir</label>
                            <input name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="{{ $pegawais->tempat_lahir }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Tanggal lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" value="{{ $pegawais->tgl_lahir }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Jenis kelamain</label>
                            <select name="gender" class="form-control" required>
                                <option value="{{ $pegawais->gender }}">{{ $pegawais->gender }}</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Agama</label>
                            <input name="agama" placeholder="Agama" class="form-control" {{ $pegawais->agama }} required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="">alamat</label>
                            <textarea name="alamat" class="form-control" required>{{ $pegawais->alamat }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Kelurahan</label>
                            <select name="id_kelurahan" class="form-control">
                                <option {{ $pegawais->id_kelurahan }}selected>{{ $pegawais->kelurahan->name }}</option>
                                @foreach ($kelurahan as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Kecamatan</label>
                            <select name="id_kecamatan" class="form-control">
                                <option {{ $pegawais->id_kecamatan }}selected>{{ $pegawais->kecamatan->name }}</option>
                                @foreach ($kecamatan as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Provinsi</label>
                            <select name="id_provinsi" class="form-control">
                                <option {{ $pegawais->id_provinsi }}selected>{{ $pegawais->provinsi->name }}</option>
                                @foreach ($provinsi as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection