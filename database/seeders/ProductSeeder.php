<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::get();
        $supplier = Supplier::get();
        foreach ($categories as $category) {
            Product::create(['name' => 'Gantungan Kunci', 'category_id' => $category->id, 'supplier_id' => $supplier[0]->id, 'stock' => 0]);
            Product::create(['name' => 'Face Wash', 'category_id' => $category->id, 'supplier_id' => $supplier[0]->id, 'stock' => 0]);
            Product::create(['name' => 'Cincin', 'category_id' => $category->id, 'supplier_id' => $supplier[0]->id, 'stock' => 0]);
            Product::create(['name' => 'Mousterizer', 'category_id' => $category->id, 'supplier_id' => $supplier[0]->id, 'stock' => 0]);
        }
    }
}
