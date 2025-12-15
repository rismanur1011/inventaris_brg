@extends('layouts.app')

@section('title', 'Tambah Supplier')

@section('content')
    <h1>Tambah Supplier Baru</h1>

    <form action="{{ route('suppliers.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Supplier</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control" id="address" name="address">{{ old('address') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
