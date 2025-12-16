@extends('layouts.app')

@section('title', 'Dashboard Utama')

@section('content')
    <h1 class="mb-4 text-dark">👋 Selamat Datang di Dashboard Inventaris</h1>
    <hr>

    {{-- BARIS CARD STATISTIK --}}
    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card bg-info text-dark shadow h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase fw-bold">Total Produk</div>
                            {{-- Gunakan $totalProducts dari DashboardController --}}
                            <div class="h3 mb-0">{{ number_format($totalProducts ?? 0) }}</div>
                        </div>
                        <i class="fas fa-boxes fa-3x"></i>
                    </div>
                    {{-- Dihapus: Link 'Lihat Detail' --}}
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-info text-dark shadow h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase fw-bold">Total Kategori</div>
                            {{-- Gunakan $totalCategories dari DashboardController --}}
                            <div class="h3 mb-0">{{ number_format($totalCategories ?? 0) }}</div>
                        </div>
                        <i class="fas fa-tags fa-3x"></i>
                    </div>
                    {{-- Dihapus: Link 'Lihat Detail' --}}
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-info text-dark shadow h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase fw-bold">Total Supplier</div>
                            {{-- Gunakan $totalSuppliers dari DashboardController --}}
                            <div class="h3 mb-0">{{ number_format($totalSuppliers ?? 0) }}</div>
                        </div>
                        <i class="fas fa-truck fa-3x"></i>
                    </div>
                    {{-- Dihapus: Link 'Lihat Detail' --}}
                </div>
            </div>
        </div>
    </div>

    {{-- TABEL DATA STOK RENDAH --}}

      <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-light text-white">
                </div>
                <div class="card-body">
                <div class="alert alert-success m-0">
                        Semua stok produk aman!
                    {{-- $lowStockProducts harus disediakan oleh DashboardController --}}
                    {{--   @if (isset($lowStockProducts) && $lowStockProducts->isEmpty())
                        <div class="alert alert-success">Semua stok produk aman!</div>
                     @elseif (isset($lowStockProducts))
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Stok Tersisa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lowStockProducts as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    {{-- Asumsi Anda sudah mendefinisikan relasi 'category' di Product Model --}}
                                   {{--  <td>{{ $product->category->name ?? 'N/A' }}</td>
                                    <td><span class="badge bg-danger">{{ $product->stock }}</span></td>
                                    <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-info">Tambah Stok</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        {{-- Tampilkan pesan jika variabel belum didefinisikan (untuk debugging) --}}
                     {{--  <div class="alert alert-warning">Data stok rendah belum dimuat dari Controller.</div>
                    @endif

                </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
