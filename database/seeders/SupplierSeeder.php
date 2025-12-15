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
        Supplier::create([
            'name' => 'PT Makmur Jaya',
            'address' => 'Jl. Kenanga No. 10',
            'phone_number' => '08123456789'
        ]);
        Supplier::create([
            'name' => 'CV Sumber Rezeki',
            'address' => 'Jl. Mawar No. 5',
            'phone_number' => '08235676888'
        ]);
        Supplier::create([
            'name' => 'PT Abadi',
            'address' => 'Jl. pacitan No. 8',
            'phone_number' => '08864249470'
        ]);
        Supplier::create([
            'name' => 'PT Matahari',
            'address' => 'Jl. pahlawan No. 14',
            'phone_number' => '08554345687'
        ]);
        Supplier::create([
            'name' => 'PT sentosa',
            'address' => 'Jl. Pasuruan No. 20',
            'phone_number' => '08987656465'
        ]);
    }
}
