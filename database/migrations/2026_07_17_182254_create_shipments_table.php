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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();

            $table->string('tracking_number', 100)->unique();

            $table->foreignId('origin_port_id')
                ->constrained('ports')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('destination_port_id')
                ->constrained('ports')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('vessel_name', 150)->nullable();
            $table->string('container_number', 100)->nullable();

            $table->enum('status', [
                'Pending',
                'Departed',
                'In Transit',
                'Arrived',
                'Delivered'
            ])->default('Pending');

            $table->date('departure_date')->nullable();
            $table->date('estimated_arrival')->nullable();
            $table->date('arrival_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};