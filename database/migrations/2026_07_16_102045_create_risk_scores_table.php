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
        Schema::create('risk_scores', function (Blueprint $table) {

            $table->id();

            // Relasi ke countries
            $table->foreignId('country_id')
                ->constrained('countries')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Risk Components
            |--------------------------------------------------------------------------
            */

            $table->decimal('weather_score', 5, 2)->default(0);
            $table->decimal('inflation_score', 5, 2)->default(0);
            $table->decimal('currency_score', 5, 2)->default(0);
            $table->decimal('news_score', 5, 2)->default(0);

            /*
            |--------------------------------------------------------------------------
            | Final Result
            |--------------------------------------------------------------------------
            */

            $table->decimal('total_score', 6, 2)->default(0);

            $table->enum('risk_level', [
                'Low',
                'Medium',
                'High'
            ])->default('Low');

            /*
            |--------------------------------------------------------------------------
            | Monitoring Time
            |--------------------------------------------------------------------------
            */

            $table->timestamp('calculated_at')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risk_scores');
    }
};