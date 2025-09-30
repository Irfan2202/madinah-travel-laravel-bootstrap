<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        return [
            // Detail Paket (dari Gambar 2)
            'title' => 'UMROH PENUH MAKNA 2X JUMAT + THAIF',
            'price_quad' => 32600000.00,
            'price_triple' => 34700000.00, // Contoh
            'price_double' => 38300000.00, // Contoh

            // Detail Perjalanan (dari Gambar 1 & 2)
            // 'departure_date' akan diisi di Seeder
            'duration_days' => 10,
            'hotel_stars' => 4,

            // Kapasitas
            'total_seats' => 39,
            'available_seats' => 39,

            // Informasi Keberangkatan
            'departure_location' => 'JAKARTA',
            'airline' => 'SAUDIA',
            'flight_route' => 'CGK-MED, JED-CGK, LANDING MADINAH',
        ];
    }
}
