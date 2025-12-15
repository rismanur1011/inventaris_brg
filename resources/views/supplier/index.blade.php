@extends('layouts.app')

@section('title', 'Data Supplier')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Data Supplier</h1>
        {{-- Tombol Tambah Supplier --}}
        <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Tambah Supplier</a>
    </div>

    {{-- Pesan Sukses (Success message dari Controller) --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th width="5%">NO</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->nama_supplier }}</td>
                    <td>{{ $supplier->alamat }}</td>
                    <td>{{ $supplier->kontak }}</td>
                    <td>
                        {{-- Tombol Edit --}}
                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        {{-- Form Hapus (Menggunakan method DELETE) --}}
                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin ingin menghapus supplier: {{ $supplier->nama_supplier }}?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data supplier.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
