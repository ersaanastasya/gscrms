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
        Schema::create('news_cache', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('source', 100)->nullable();
            $table->string('url')->nullable();

            $table->dateTime('published_at')->nullable();

            $table->text('summary')->nullable();
            $table->longText('content')->nullable();

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
        Schema::dropIfExists('news_cache');
    }
};