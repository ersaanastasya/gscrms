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
        Schema::create('countries', function (Blueprint $table) {

            $table->id();

            // Country Identity
            $table->string('country_code', 2)->unique();
            $table->string('country_name');
            $table->string('official_name')->nullable();

            // Location
            $table->string('capital')->nullable();
            $table->string('region')->nullable();
            $table->string('subregion')->nullable();

            $table->decimal('latitude', 10, 6)->nullable();
            $table->decimal('longitude', 10, 6)->nullable();

            // Flag
            $table->string('flag_png')->nullable();
            $table->string('flag_svg')->nullable();

            // Currency
            $table->string('currency_code', 10)->nullable();
            $table->string('currency_name')->nullable();

            // Timezone
            $table->string('timezone')->nullable();

            // Status
            $table->boolean('is_active')->default(true);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};