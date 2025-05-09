@extends('layouts.user')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Data Pegawai</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <tr>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Provinsi</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($pegawais as $pegawai)
                    <tr>
                        <td>{{ $pegawai->name }}</td>
                        <td>{{ $pegawai->tempat_lahir }}</td>
                        <td>{{ $pegawai->tgl_lahir }}</td>
                        <td>{{ $pegawai->gender }}</td>
                        <td>{{ $pegawai->agama }}</td>
                        <td>{{ $pegawai->alamat }}</td>
                        <td>{{ $pegawai->kelurahan->name }}</td>
                        <td>{{ $pegawai->kecamatan->name }}</td>
                        <td>{{ $pegawai->provinsi->name }}</td>
                        <td>
                            <a href="{{ route('pegawais.edit', $pegawai->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('pegawais.destroy', $pegawai->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
    <a href="{{ route('pegawais.create') }}">Tambah Pegawai</a>
    
@endsection