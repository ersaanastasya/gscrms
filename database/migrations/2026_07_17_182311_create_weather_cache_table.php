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
        Schema::create('weather_cache', function (Blueprint $table) {
            $table->id();

            $table->foreignId('country_id')
                ->constrained('countries')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('city', 100)->nullable();

            $table->decimal('temperature', 5, 2)->nullable();
            $table->integer('humidity')->nullable();
            $table->decimal('wind_speed', 6, 2)->nullable();

            $table->string('weather_condition', 100)->nullable();
            $table->text('api_response')->nullable();

            $table->timestamp('cached_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather_cache');
    }
};