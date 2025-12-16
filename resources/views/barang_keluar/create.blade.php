
@extends('layouts.app')

@section('title', 'Catat Barang Keluar')

@section('content')
    <h1 class="text-dark mb-4">Catat Barang Keluar</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('barang_keluars.store') }}" method="POST">
                @csrf

                <div class="row">
                    {{-- Produk --}}
                    <div class="col-md-6 mb-3">
                        <label for="product_id" class="form-label">Produk</label>
                        <select class="form-control @error('product_id') is-invalid @enderror" id="product_id" name="product_id" required>
                            <option value="">Pilih Produk</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->nama_barang }} (Stok saat ini: {{ $product->stock }})
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Tujuan/Penerima --}}
                    <div class="col-md-6 mb-3">
                        <label for="destination" class="form-label">Tujuan/Penerima</label>
                        <input type="text" class="form-control @error('destination') is-invalid @enderror" id="destination" name="destination" value="{{ old('destination') }}" required>
                        @error('destination')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row">
                    {{-- Jumlah Keluar --}}
                    <div class="col-md-6 mb-3">
                        <label for="quantity" class="form-label">Jumlah Keluar</label>
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}" required min="1">
                        @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Tanggal Keluar --}}
                    <div class="col-md-6 mb-3">
                        <label for="date_out" class="form-label">Tanggal Keluar</label>
                        <input type="date" class="form-control @error('date_out') is-invalid @enderror" id="date_out" name="date_out" value="{{ old('date_out', now()->format('Y-m-d')) }}" required>
                        @error('date_out')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                {{-- Catatan --}}
                <div class="mb-3">
                    <label for="notes" class="form-label">Catatan</label>
                    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes">{{ old('notes') }}</textarea>
                    @error('notes')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                
                <button type="submit" class="btn btn-danger">Simpan Data Keluar</button>
                <a href="{{ route('barang_keluars.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
