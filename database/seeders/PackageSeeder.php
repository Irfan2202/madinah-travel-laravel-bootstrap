<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;
use App\Models\Price;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        // Buat 3 paket umroh
        Package::factory()->count(3)->create();

        // Buat harga global (tidak terkait ke package)
        Price::insert([
            ['type' => 'QUAD', 'price' => 32600000, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'TRIPLE', 'price' => 34700000, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'DOUBLE', 'price' => 38300000, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
