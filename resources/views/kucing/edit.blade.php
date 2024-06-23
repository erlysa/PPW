@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Data Kucing</h1>
    <form action="{{ route('kucing.update', $kucing->kode_kucing) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_kucing" class="form-label">ID Kucing</label>
            <input type="text" name="id_kucing" class="form-control" id="id_kucing" value="{{ $kucing->id_kucing }}">
            @error('id_kucing')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama_kucing" class="form-label">Nama Kucing</label>
            <input type="text" name="nama_kucing" class="form-control" id="nama_kucing" value="{{ $kucing->nama_kucing }}">
            @error('nama_kucing')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select">
                <option value="jantan" {{ $kucing->jenis_kelamin == 'jantan' ? 'selected' : '' }}>Jantan</option>
                <option value="betina" {{ $kucing->jenis_kelamin == 'betina' ? 'selected' : '' }}>Betina</option>
            </select>
            @error('jenis_kelamin')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ras_kucing" class="form-label">Ras Kucing</label>
            <input type="text" name="ras_kucing" class="form-control" id="ras_kucing" value="{{ $kucing->ras_kucing }}">
            @error('ras_kucing')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="berat_badan" class="form-label">Berat Badan</label>
            <input type="text" name="berat_badan" class="form-control" id="berat_badan" value="{{ $kucing->berat_badan }}">
            @error('berat_badan')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status_kesehatan" class="form-label">Status Kesehatan</label>
            <select name="status_kesehatan" class="form-select">
                <option value="sehat" {{ $kucing->status_kesehatan == 'sehat' ? 'selected' : '' }}>Sehat</option>
                <option value="sakit" {{ $kucing->status_kesehatan == 'sakit' ? 'selected' : '' }}>Sakit</option>
            </select>
            @error('status_kesehatan')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="foto_kucing" class="form-label">Foto Kucing</label>
            <input type="file" name="foto_kucing" class="form-control" id="foto_kucing">
            @error('foto_kucing')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
