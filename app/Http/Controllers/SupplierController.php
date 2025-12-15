<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier ::all(); // Ambil semua data dari Model Supplier
        return view('supplier.index', compact('suppliers')); // Kirim data ke view index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([  // 1. Validasi data yang masuk
            'nama_supplier' => 'required|max:255',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:100', // Sesuaikan validasi kontak jika perlu (misal: |unique:suppliers)
        ]);

        Supplier::create([  // 2. Simpan data ke database
            'nama_supplier' => $request->nama_supplier,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
        ]);

        return redirect()->route('suppliers.index')
                         ->with('success', 'Supplier berhasil ditambahkan!');   // Redirect kembali dengan pesan sukses

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        // 1. Validasi data (kecuali nama_supplier unik pada record ini)
        $request->validate([
            'nama_supplier' => 'required|max:255',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:100',
        ]);

        // 2. Update data
        $supplier ->update([
            'nama_supplier' => $request->nama_supplier,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
        ]);

        // 3. Redirect kembali dengan pesan sukses
        return redirect()->route('suppliers.index')
                         ->with('success', 'Supplier berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('suppliers.index')
                         ->with('success', 'Supplier berhasil dihapus!');
    }
}
