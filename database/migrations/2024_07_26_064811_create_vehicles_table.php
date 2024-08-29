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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('vehicle_id')->primary();
            $table->string('spbu_id');
            $table->unsignedBigInteger('type_vehicle_id');
            $table->timestamps();

            $table->foreign('spbu_id')->references('spbu_id')->on('spbus')->onDelete('cascade');
            $table->foreign('type_vehicle_id')->references('type_vehicle_id')->on('type_vehicles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
