<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('api_logs', function (Blueprint $table) {

            $table->id();

            $table->string('service');

            $table->string('endpoint');

            $table->integer('status_code');

            $table->longText('response')->nullable();

            $table->decimal('response_time',8,2)->nullable();

            $table->timestamp('requested_at')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('api_logs');
    }
};