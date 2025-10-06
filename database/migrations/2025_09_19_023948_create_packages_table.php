<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('guide_name')->nullable();
            $table->string('hotel_makkah')->nullable();
            $table->string('hotel_madinah')->nullable();
            $table->date('departure_date');
            $table->date('return_date')->nullable(); // ✅ tambahkan ini
            $table->string('departure_day')->nullable();
            $table->integer('duration_days');
            $table->integer('hotel_stars');
            $table->integer('total_pax');
            $table->integer('available_pax')->default(0);
            $table->string('departure_location');
            $table->string('airline')->nullable();
            $table->string('flight_route')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
