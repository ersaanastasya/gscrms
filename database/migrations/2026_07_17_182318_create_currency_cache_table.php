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
        Schema::create('currency_cache', function (Blueprint $table) {
            $table->id();

            $table->string('base_currency', 10);
            $table->string('target_currency', 10);

            $table->decimal('exchange_rate', 15, 6)->nullable();

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
        Schema::dropIfExists('currency_cache');
    }
};