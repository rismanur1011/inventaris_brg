<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // READ - Tampilkan semua produk dengan relasi
    public function index()
    {
        // Eager loading untuk menghindari N+1 query problem
        $products = Product::with(['category', 'supplier'])
        ->orderBy ('id', 'desc')
        ->get();
        return view('product.index', compact('products'));
    }

    public function edit(Product $product)
{
    $categories = Category::all();
    $suppliers = Supplier::all();

    return view('product.edit', compact('product', 'categories', 'suppliers'));
}

public function update(Request $request, Product $product)
{
    $data = $request->all();

    $data['harga_beli'] = str_replace(',', '', $request->harga_beli);
    $data['harga_jual'] = str_replace(',', '', $request->harga_jual);

    // VALIDASI: Menggunakan Facade Validator untuk memvalidasi $data yang SUDAH BERSIH
    Validator::make($data, [
        'nama_barang' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'supplier_id' => 'required|exists:suppliers,id',
        'harga_beli' => 'required|integer|min:0',
        'harga_jual' => 'required|integer|min:0',
        'stok' => 'required|integer|min:0',
    ])->validate();

    $product->update($data);

    return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
}

public function destroy(Product $product)
{
    $product->delete();
    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()->route('products.index')
                     ->with('success', 'Produk berhasil dihapus!');
}

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('product.create', compact('categories', 'suppliers'));  // CREATE - Tampilkan form tambah
    }

    public function store(Request $request)
    {
        $data = $request->all();

    // 2. Hapus pemisah ribuan (koma) dari harga beli dan harga jual
    // Fungsi str_replace('', '', $string) akan mengganti koma dengan string kosong
    $data['harga_beli'] = str_replace(',', '', $request->harga_beli);
    $data['harga_jual'] = str_replace(',', '', $request->harga_jual);

        Validator::make ($data, [
            'nama_barang' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'harga_beli' => 'required|integer|min:0',
            'harga_jual' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',     // CREATE - Simpan data baru
        ])->validate();

        Product::create($data);

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil ditambahkan.');
    }

}
