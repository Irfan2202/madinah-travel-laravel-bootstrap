<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package::factory()->create([
            'departure_date' => Carbon::create(2025, 10, 30)->toDateString(),
            'title' => 'UMROH PENUH MAKNA (Keberangkatan 30 Oktober)',
        ]);


        Package::factory()->create([
            'departure_date' => Carbon::create(2025, 11, 13)->toDateString(),
            'title' => 'UMROH PENUH MAKNA (Keberangkatan 13 November)',
        ]);

        Package::factory()->create([
            'departure_date' => Carbon::create(2025, 11, 30)->toDateString(),
            'title' => 'UMROH PENUH MAKNA (Keberangkatan 30 November)',
        ]);
    }
}
