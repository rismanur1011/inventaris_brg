@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('content')
    <h1>Edit Supplier: {{ $supplier->nama_supplier }}</h1>

    {{-- Form menggunakan method POST, tetapi Blade menggunakan @method('PUT') untuk simulasi PUT/PATCH --}}
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Supplier</label>
            {{-- Menggunakan old() untuk menjaga input jika terjadi error, defaultnya dari $supplier->name --}}
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                   id="name" name="name"
                   value="{{ old('name', $supplier->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">address</label>
            <textarea class="form-control @error('address') is-invalid @enderror"
                      id="address" name="address">{{ old('address', $supplier->address) }}</textarea>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">phone_number (Telp/Email)</label>
            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                   id="phone_number" name="phone_number"
                   value="{{ old('phone_number', $supplier->phone_number) }}">
            @error('phone_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Data</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
