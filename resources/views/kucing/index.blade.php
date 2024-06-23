@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Data Kucing</h1>
    <form action="{{ route('kucing.index') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan nama kucing..." value="{{ request('keyword') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    <a href="{{ route('kucing.create') }}" class="btn btn-success mb-3">Tambah Data</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">ID</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Ras</th>
                <th class="text-center">Berat Badan</th>
                <th class="text-center">Status Kesehatan</th>
                <th class="text-center">Foto</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kucings as $kucing)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $kucing->id_kucing }}</td>
                <td>{{ $kucing->nama_kucing }}</td>
                <td>{{ $kucing->jenis_kelamin }}</td>
                <td>{{ $kucing->ras_kucing }}</td>
                <td class="text-center">{{ $kucing->berat_badan }}</td>
                <td>{{ $kucing->status_kesehatan }}</td>
                <td class="text-center">
                    @if ($kucing->foto_kucing)
                    <img src="{{ $kucing->foto_kucing }}" width="150">
                    @else
                    Tidak ada foto
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('kucing.edit', $kucing->kode_kucing) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('kucing.destroy', $kucing->kode_kucing) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection