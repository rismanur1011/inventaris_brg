{{-- Contoh bagian kartu Data Barang di dashboard/index.blade.php --}}

<div class="card text-white bg-primary">
    <div class="card-body">
        <h5 class="card-title">Data Barang</h5>
        <p class="card-text">Kelola semua data barang yang tersedia.</p>

        {{-- TAMBAHKAN LINK ROUTE DI BAWAH INI --}}
        <a href="{{ route('barang.index') }}" class="btn btn-light mt-2">Lihat Data</a>

    </div>
</div>
