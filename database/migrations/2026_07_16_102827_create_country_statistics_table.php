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
        Schema::create('country_statistics', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Country
            |--------------------------------------------------------------------------
            */

            $table->foreignId('country_id')
                ->constrained('countries')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Economy
            |--------------------------------------------------------------------------
            */

            $table->decimal('gdp', 20, 2)->nullable();

            $table->decimal('gdp_growth', 8, 2)->nullable();

            $table->decimal('inflation', 8, 2)->nullable();

            $table->decimal('unemployment', 8, 2)->nullable();

            /*
            |--------------------------------------------------------------------------
            | Population
            |--------------------------------------------------------------------------
            */

            $table->unsignedBigInteger('population')->nullable();

            $table->decimal('population_growth', 8, 2)->nullable();

            /*
            |--------------------------------------------------------------------------
            | Trade
            |--------------------------------------------------------------------------
            */

            $table->decimal('exports', 20, 2)->nullable();

            $table->decimal('imports', 20, 2)->nullable();

            /*
            |--------------------------------------------------------------------------
            | Data Information
            |--------------------------------------------------------------------------
            */

            $table->year('data_year')->nullable();

            $table->timestamp('last_synced_at')->nullable();

            $table->timestamps();

            $table->unique([
                'country_id',
                'data_year'
            ]);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_statistics');
    }
};