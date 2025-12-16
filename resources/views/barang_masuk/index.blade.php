
@extends('layouts.app')

@section('title', 'Data Barang Masuk')

@section('content')
    <h1 class="text-dark mb-4">Data Barang Masuk</h1>
    <a href="{{ route('barang_masuks.create') }}" class="btn btn-primary mb-3">+ Catat Barang Masuk</a>

    {{-- Tabel data barang masuk --}}
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Kode Transaksi</th>
                            <th>Nama Barang</th>
                            <th>Supplier</th>
                            <th>Jumlah Masuk</th>
                            <th>Tanggal Terima</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($incomingItems as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->transaction_code }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->supplier->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->date_received)->format('d-m-Y') }}</td>
                                <td>{{ $item->notes }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="text-center">Belum ada data barang masuk.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
