@extends('layouts.app')

@section('title', 'Catat Barang Masuk')

@section('content')
    <h1 class="text-dark mb-4">Catat Barang Masuk</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('barang_masuks.store') }}" method="POST">
                @csrf

                <div class="row">
                    {{-- Produk --}}
                    <div class="col-md-6 mb-3">
                        <label for="product_id" class="form-label">Produk</label>
                        <select class="form-control @error('product_id') is-invalid @enderror" id="product_id" name="product_id" required>
                            <option value="">Pilih Produk</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }} (Stok saat ini: {{ $product->stock }})
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Supplier --}}
                    <div class="col-md-6 mb-3">
                        <label for="supplier_id" class="form-label">Supplier</label>
                        <select class="form-control @error('supplier_id') is-invalid @enderror" id="supplier_id" name="supplier_id" required>
                            <option value="">Pilih Supplier</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('supplier_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row">
                    {{-- Jumlah Masuk --}}
                    <div class="col-md-6 mb-3">
                        <label for="quantity" class="form-label">Jumlah Masuk</label>
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}" required min="1">
                        @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Tanggal Terima --}}
                    <div class="col-md-6 mb-3">
                        <label for="date_received" class="form-label">Tanggal Terima</label>
                        <input type="date" class="form-control @error('date_received') is-invalid @enderror" id="date_received" name="date_received" value="{{ old('date_received', now()->format('Y-m-d')) }}" required>
                        @error('date_received')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                {{-- Catatan --}}
                <div class="mb-3">
                    <label for="notes" class="form-label">Catatan</label>
                    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes">{{ old('notes') }}</textarea>
                    @error('notes')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <button type="submit" class="btn btn-success">Simpan Data Masuk</button>
                <a href="{{ route('barang_masuks.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
