<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ScheduleFactory extends Factory
{
    public function definition()
    {
        return [
            'package_id' => Package::inRandomOrder()->first()?->id ?? Package::factory(), // relasi ke package
            'departure_date' => $this->faker->dateTimeBetween('+1 week', '+6 months'),
            'departure_location' => $this->faker->randomElement(['Jakarta', 'Surabaya', 'Medan']),
            'destination' => 'Jeddah',
            'total_seats' => 25,
            'available_seats' => $this->faker->numberBetween(0, 25),
        ];
    }
}
