@extends('layouts.app')

@section('title', 'Tambah Produk Baru')

@section('content')
    <h1 class="text-dark mb-4">Tambah Produk Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="row">

                    {{-- Nama Barang --}}
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Nama Barang</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    {{-- Kategori (Dropdown) --}}
                    <div class="col-md-6 mb-3">
                        <label for="category_id" class="form-label">Kategori</label>
                        <select name="category_id" class="form-select" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Supplier (Dropdown) --}}
                    <div class="col-md-6 mb-3">
                        <label for="supplier_id" class="form-label">Supplier</label>
                        <select name="supplier_id" class="form-select" required>
                            <option value="">Pilih Supplier</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Harga Beli --}}
                    {{-- <div class="col-md-6 mb-3">
                        <label for="harga_beli" class="form-label">Harga Beli (Rp)</label>
                        <input type="number" name="harga_beli" class="form-control" value="{{ old('harga_beli') }}" required min="0">
                    </div>

                    {{-- Harga Jual --}}
                    {{-- <div class="col-md-6 mb-3">
                        <label for="harga_jual" class="form-label">Harga Jual (Rp)</label>
                        <input type="number" name="harga_jual" class="form-control" value="{{ old('harga_jual') }}" required min="0">
                    </div>  --}}

                    {{-- Stok --}}
                    <div class="col-md-6 mb-3">
                        <label for="stock" class="form-label">Stock Awal</label>
                        <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" required min="0">
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>
@endsection
