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

            $table->foreignId('country_id')
                ->constrained('countries')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->bigInteger('population')->nullable();
            $table->decimal('area', 15, 2)->nullable();
            $table->decimal('gdp', 18, 2)->nullable();
            $table->decimal('inflation', 5, 2)->nullable();
            $table->decimal('unemployment', 5, 2)->nullable();

            $table->date('updated_date')->nullable();

            $table->timestamps();
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