<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $outgoingItems = BarangKeluar::with('product')
                                     ->orderBy('date_out', 'desc')
                                     ->get();
        return view('barang_keluar.index', compact('outgoingItems'));
    }

    // CREATE: Tampilkan form tambah barang keluar
    public function create()
    {
        $products = Product::all();
        return view('barang_keluar.create', compact('products'));
    }

    // STORE: Simpan data barang keluar dan UPDATE STOK (KURANGI)
    public function store(Request $request)
    {
        // 1. Ambil data produk untuk validasi stok
        $product = Product::find($request->product_id);

        // Validasi, pastikan jumlah yang keluar TIDAK MELEBIHI stok saat ini
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1|max:' . $product->stock, // PENTING: Maksimal = Stok
            'destination' => 'required|string|max:255',
            'date_out' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        DB::beginTransaction(); // Mulai transaksi database

        try {
            // 2. Buat kode transaksi (misal: BK-YYYYMMDD-ID)
            $lastId = BarangKeluar::max('id') ?? 0;
            $transactionCode = 'BK-' . now()->format('Ymd') . '-' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);

            // 3. Simpan data barang keluar
            BarangKeluar::create(array_merge($request->all(), [
                'transaction_code' => $transactionCode
            ]));

            // 4. Update Stok Produk (KURANGI)
            $product->stock -= $request->quantity;
            $product->save();

            DB::commit(); // Komit transaksi

            return redirect()->route('barang_keluars.index')
                             ->with('success', 'Barang Keluar berhasil dicatat dan stok diupdate!');

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika ada error
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Gagal mencatat Barang Keluar. Pastikan Stok tersedia.');
        }
    }
}
