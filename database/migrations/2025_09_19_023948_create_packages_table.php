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
            $table->decimal('price_quad', 10, 2);
            $table->decimal('price_triple', 10, 2)->nullable();
            $table->decimal('price_double', 10, 2)->nullable();
            $table->date('departure_date');
            $table->integer('duration_days');
            $table->integer('hotel_stars');
            $table->integer('total_seats');
            $table->integer('available_seats');
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
