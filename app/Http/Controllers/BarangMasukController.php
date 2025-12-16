<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    public function index()
    {
        $incomingItems = BarangMasuk::with(['product', 'supplier'])
                                     ->orderBy('date_received', 'desc')
                                     ->get();
        return view('barang_masuk.index', compact('incomingItems'));
    }

    // CREATE: Tampilkan form tambah barang masuk
    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('barang_masuk.create', compact('products', 'suppliers'));
    }

    // STORE: Simpan data barang masuk dan update stok
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
            'date_received' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        DB::beginTransaction(); // Mulai transaksi database

        try {
            // 1. Buat kode transaksi (misal: BM-YYYYMMDD-ID)
            $lastId = BarangMasuk::max('id') ?? 0;
            $transactionCode = 'BM-' . now()->format('Ymd') . '-' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);

            // 2. Simpan data barang masuk
            BarangMasuk::create(array_merge($request->all(), [
                'transaction_code' => $transactionCode
            ]));

            // 3. Update Stok Produk
            $product = Product::find($request->product_id);
            $product->stock += $request->quantity;
            $product->save();

            DB::commit(); // Komit transaksi

            return redirect()->route('barang_masuks.index')
                             ->with('success', 'Barang Masuk berhasil dicatat dan stok diupdate!');

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika ada error
            return redirect()->back()->with('error', 'Gagal mencatat Barang Masuk. Error: ' . $e->getMessage());
        }
    }
}
