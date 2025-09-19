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
            $table->string('name');
            $table->string('duration');
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->string('hotel_madinah')->nullable();
            $table->string('hotel_makkah')->nullable();
            $table->string('airline')->nullable();
            $table->string('transportation')->nullable();
            $table->string('image')->nullable();
            $table->integer('total_quota')->nullable();
            $table->integer('remaining_quota')->nullable();
            $table->string('visa_type')->nullable();
            $table->string('room_type')->nullable();
            $table->string('meal_type')->nullable();
            $table->string('departure_city')->nullable();
            $table->date('departure_date')->nullable();
            $table->date('return_date')->nullable();
            $table->string('guide_name')->nullable();
            $table->boolean('is_popular')->default(false);
            $table->text('notes')->nullable();
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
