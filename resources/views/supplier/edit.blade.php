@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('content')
    <h1>Edit Supplier: {{ $supplier->nama_supplier }}</h1>

    {{-- Form menggunakan method POST, tetapi Blade menggunakan @method('PUT') untuk simulasi PUT/PATCH --}}
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_supplier" class="form-label">Nama Supplier</label>
            {{-- Menggunakan old() untuk menjaga input jika terjadi error, defaultnya dari $supplier->nama_supplier --}}
            <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror"
                   id="nama_supplier" name="nama_supplier"
                   value="{{ old('nama_supplier', $supplier->nama_supplier) }}" required>
            @error('nama_supplier')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control @error('alamat') is-invalid @enderror"
                      id="alamat" name="alamat">{{ old('alamat', $supplier->alamat) }}</textarea>
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak (Telp/Email)</label>
            <input type="text" class="form-control @error('kontak') is-invalid @enderror"
                   id="kontak" name="kontak"
                   value="{{ old('kontak', $supplier->kontak) }}">
            @error('kontak')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Data</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
