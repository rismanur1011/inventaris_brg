
@extends('layouts.app')

@section('title', 'Data Barang Keluar')

@section('content')
    <h1 class="text-dark mb-4">Data Barang Keluar</h1>
    <a href="{{ route('barang_keluars.create') }}" class="btn btn-primary mb-3">+ Catat Barang Keluar</a>

    {{-- Tabel data barang keluar --}}
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Kode Transaksi</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Keluar</th>
                            <th>Tujuan/Penerima</th>
                            <th>Tanggal Keluar</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($outgoingItems as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->transaction_code }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->destination }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->date_shipped)->format('d-m-Y') }}</td>
                                <td>{{ $item->notes }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center">Belum ada data barang keluar.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
