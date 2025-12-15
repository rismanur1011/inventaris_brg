@extends('layouts.app')

@section('title', 'Data Produk')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-dark">Data Produk</h1>
        {{-- Tombol Tambah Produk (Mengarah ke route products.create) --}}
        <a href="{{ route('products.create') }}" class="btn btn-primary shadow">
            <i class="fas fa-plus me-2"></i> Tambah Produk
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        {{-- Tambahkan class text-secondary untuk warna abu-abu (sesuai permintaan Anda) --}}
                        <tr class="table-dark text-white">
                            <th>NO</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Supplier</th>
                            {{-- <th>Harga Beli</th>
                            <th>Harga Jual</th> --}}
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>  {{-- Relasi Category: Ambil nama_kategori --}}
                            <td>{{ $product->category->name ?? 'N/A' }}</td>  {{-- Relasi Supplier: Ambil nama_supplier --}}
                            <td>{{ $product->supplier->name ?? 'N/A' }}</td>
                            {{-- <td>Rp {{ number_format($product->harga_beli, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</td> --}}
                            <td>{{ $product->stock }}</td>
                            <td>
                                {{-- Tombol Edit dan Delete akan kita buat nanti --}}
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning"> Edit </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk {{ $product->nama_barang }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"> Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data produk. Silakan tambahkan!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
