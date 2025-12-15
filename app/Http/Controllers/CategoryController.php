<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories')); // READ - menampilkan semua kategori
    }

    public function create()
    {
        return view('category.create'); // CREATE - menampilkan form tambah
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.'); // CREATE - Simpan data baru
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));  // EDIT - menampilkan form edit
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id . '|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil diupdate.');  // UPDATE - Simpan perubahan
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil dihapus.'); // DELETE - Hapus data
    }


}
