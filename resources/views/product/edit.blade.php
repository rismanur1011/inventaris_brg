@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
    <h1>Edit Produk: {{ $product->name }}</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="category_id" class="form-label">Kategori</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label for="supplier_id" class="form-label">Supplier</label>
                <select class="form-select" id="supplier_id" name="supplier_id" required>
                    <option value="">Pilih Supplier</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}"
                            {{ old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-md-4 mb-3">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="{{ old('harga_beli', $product->harga_beli) }}" required min="0">
            </div>
            <div class="col-md-4 mb-3">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="{{ old('harga_jual', $product->harga_jual) }}" required min="0">
            </div>
            <div class="col-md-4 mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $product->stok) }}" required min="0">
            </div>
        </div> --}}

        <button type="submit" class="btn btn-primary">Update Produk</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
