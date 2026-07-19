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

            $table->foreignId('shipment_id')
                ->constrained('shipments')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('country_id')
                ->nullable()
                ->constrained('countries')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->decimal('weather_score', 5, 2)->default(0);
            $table->decimal('currency_score', 5, 2)->default(0);
            $table->decimal('news_score', 5, 2)->default(0);

            $table->decimal('total_score', 5, 2)->default(0);

            $table->string('risk_level', 20)->nullable();

            $table->text('description')->nullable();

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