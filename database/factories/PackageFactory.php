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
            'name' => $this->faker->randomElement(['Umroh Ekonomi', 'Umroh VIP', 'Haji Reguler']),
            'duration' => $this->faker->randomElement(['10 Hari 9 Malam', '12 Hari 11 Malam', '35 Hari']),
            'price' => $this->faker->randomElement([25000000, 45000000, 65000000]),
            'description' => $this->faker->sentence(10),
            'hotel_madinah' => $this->faker->company . ' Hotel Madinah',
            'hotel_makkah' => $this->faker->company . ' Hotel Makkah',
            'airline' => $this->faker->randomElement(['Garuda Indonesia', 'Saudi Airlines', 'Emirates']),
            'transportation' => $this->faker->randomElement(['Bus AC', 'Kereta Cepat', 'Private Bus']),
            'image' => $this->faker->imageUrl(800, 600, 'travel'),

            'total_quota' => $this->faker->numberBetween(20, 100),
            'remaining_quota' => $this->faker->numberBetween(1, 50),

            'visa_type' => $this->faker->randomElement(['Umrah', 'Haji']),
            'room_type' => $this->faker->randomElement(['Quad', 'Triple', 'Double']),
            'meal_type' => $this->faker->randomElement(['Buffet Premium', '3x Sehari']),
            'departure_city' => $this->faker->randomElement(['Jakarta', 'Surabaya', 'Medan']),
            'departure_date' => $this->faker->date(),
            'return_date' => $this->faker->date(),
            'guide_name' => $this->faker->name,
            'is_popular' => $this->faker->boolean(),
        ];
    }
    }
}
