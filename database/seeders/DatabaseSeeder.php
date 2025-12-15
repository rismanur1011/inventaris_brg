<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void

    {
        User::create([
            'name' => 'Rizma Nurfadhila',
            'email' => 'rizma@email.com',
            'password' => Hash::make('rismaa123'),
            'username' => 'rizmaaa'
        ]);

        User::create([
            'name' => 'Rido Prasetyo',
            'email' => 'rido@email.com',
            'password' => Hash::make('rido222'),
            'username' => 'rido'
        ]);


        $this->call([
            CategorySeeder::class,
            SupplierSeeder::class,
            // ProductSeeder::class // Opsional, bisa dibuat untuk data produk dummy
        ]);
    }
}
