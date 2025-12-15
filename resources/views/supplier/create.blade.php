@extends('layouts.app')

@section('title', 'Tambah Supplier')

@section('content')
    <h1>Tambah Supplier Baru</h1>

    <form action="{{ route('suppliers.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="nama_supplier" class="form-label">Nama Supplier</label>
            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="{{ old('nama_supplier') }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak (Telp/Email)</label>
            <input type="text" class="form-control" id="kontak" name="kontak" value="{{ old('kontak') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
