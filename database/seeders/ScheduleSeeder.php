<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;
use App\Models\Schedule; // <-- tambahkan ini

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan ada package dulu
        if (Package::count() === 0) {
            Package::factory(5)->create(); // bikin 5 package dummy
        }

        // Buat 3-5 jadwal per package
        Package::all()->each(function ($package) {
            Schedule::factory(rand(3, 5))->create([
                'package_id' => $package->id,
            ]);
        });
    }
}
