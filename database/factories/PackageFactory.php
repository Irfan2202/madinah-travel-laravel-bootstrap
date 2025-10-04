<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'image' => 'images/packages/default.jpg',
            'description' => $this->faker->paragraph(3),
            'guide_name' => $this->faker->name(),
            'hotel_makkah' => 'Movenpick Makkah',
            'hotel_madinah' => 'Pullman Madinah',
            'departure_date' => $this->faker->dateTimeBetween('2025-10-01', '2025-12-31'),
            'departure_day' => $this->faker->dayOfWeek(),
            'duration_days' => 10,
            'hotel_stars' => 5,
            'total_pax' => 39,
            'available_pax' => 39,
            'departure_location' => 'Jakarta',
            'airline' => 'Saudia',
            'flight_route' => 'JKT - MED - JKT',
        ];
    }
}
