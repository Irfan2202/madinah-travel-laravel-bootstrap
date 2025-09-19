<?php

namespace Database\Seeders;

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
        // Paket 1: Umroh Ekonomi
        Package::create([
            'name' => 'Umroh Ekonomi',
            'duration' => '10 Hari 9 Malam',
            'price' => 25000000,
            'description' => 'Paket umroh ekonomis dengan fasilitas lengkap dan nyaman.',
            'hotel_madinah' => 'Hotel Madinah Bintang 4',
            'hotel_makkah' => 'Hotel Makkah Bintang 4',
            'airline' => 'Garuda Indonesia',
            'transportation' => 'Bus AC',
            'image' => 'https://images.unsplash.com/photo-1572358899655-f63ece97bfa5',

            'total_quota' => 50,
            'remaining_quota' => 20,
            'visa_type' => 'Umrah',
            'room_type' => 'Quad',
            'meal_type' => '3x Sehari',
            'departure_city' => 'Jakarta',
            'departure_date' => '2025-11-01',
            'return_date' => '2025-11-10',
            'guide_name' => 'Ustadz Ahmad',
            'is_popular' => false,
            'notes' => null,
        ]);

        // Paket 2: Umroh VIP
        Package::create([
            'name' => 'Umroh VIP',
            'duration' => '12 Hari 11 Malam',
            'price' => 45000000,
            'description' => 'Paket umroh VIP dengan hotel terbaik dan fasilitas mewah.',
            'hotel_madinah' => 'Hotel Madinah Bintang 5',
            'hotel_makkah' => 'Hotel Makkah Dekat Haram',
            'airline' => 'Saudi Airlines',
            'transportation' => 'Kereta Cepat',
            'image' => 'https://images.unsplash.com/photo-1635829576353-1a14caec2f6f',

            'total_quota' => 30,
            'remaining_quota' => 10,
            'visa_type' => 'Umrah',
            'room_type' => 'Double',
            'meal_type' => 'Buffet Premium',
            'departure_city' => 'Jakarta',
            'departure_date' => '2025-12-01',
            'return_date' => '2025-12-12',
            'guide_name' => 'Ustadz Hadi',
            'is_popular' => true,
            'notes' => 'Termasuk shopping tour dan city tour Madinah.',
        ]);

        // Paket 3: Haji Reguler
        Package::create([
            'name' => 'Haji Reguler',
            'duration' => '35 Hari',
            'price' => 65000000,
            'description' => 'Paket haji reguler sesuai ketentuan Kementerian Agama.',
            'hotel_madinah' => 'Hotel Madinah Bintang 4-5',
            'hotel_makkah' => 'Hotel Makkah Bintang 4-5',
            'airline' => 'Emirates',
            'transportation' => 'Bus AC',
            'image' => 'https://images.unsplash.com/photo-1744711815074-1f12a88cc5d1',

            'total_quota' => 100,
            'remaining_quota' => 70,
            'visa_type' => 'Haji',
            'room_type' => 'Quad',
            'meal_type' => '3x Sehari',
            'departure_city' => 'Surabaya',
            'departure_date' => '2026-06-01',
            'return_date' => '2026-07-05',
            'guide_name' => 'Ustadz Yusuf',
            'is_popular' => false,
            'notes' => 'Pendampingan intensif 24 jam.',
        ]);
    }
}
