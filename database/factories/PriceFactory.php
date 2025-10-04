<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Package;

class PriceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'package_id' => Package::factory(),
            'type' => $this->faker->randomElement(['QUAD', 'TRIPLE', 'DOUBLE']),
            'price' => $this->faker->numberBetween(30000000, 40000000),
        ];
    }
}
