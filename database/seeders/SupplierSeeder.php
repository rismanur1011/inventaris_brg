<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier ::create([
            'nama_supplier' => 'PT Makmur Jaya',
            'alamat' => 'Jl. Kenanga No. 10',
            'kontak' => '08123456789'
        ]);
        Supplier ::create([
            'nama_supplier' => 'CV Sumber Rezeki',
            'alamat' => 'Jl. Mawar No. 5',
            'kontak' => '08235676888'
        ]);
        Supplier ::create([
            'nama_supplier' => 'PT Abadi',
            'alamat' => 'Jl. pacitan No. 8',
            'kontak' => '08864249470'
        ]);
        Supplier ::create([
            'nama_supplier' => 'PT Matahari',
            'alamat' => 'Jl. pahlawan No. 14',
            'kontak' => '08554345687'
        ]);
        Supplier ::create([
            'nama_supplier' => 'PT sentosa',
            'alamat' => 'Jl. Pasuruan No. 20',
            'kontak' => '08987656465'
        ]);
    }
}
