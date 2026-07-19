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
        Schema::create('api_logs', function (Blueprint $table) {
            $table->id();

            $table->string('api_name', 100);

            $table->string('endpoint')->nullable();

            $table->string('method', 10)->default('GET');

            $table->integer('status_code')->nullable();

            $table->longText('request_body')->nullable();
            $table->longText('response_body')->nullable();

            $table->decimal('response_time', 8, 2)->nullable();

            $table->boolean('success')->default(true);

            $table->timestamp('requested_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_logs');
    }
};