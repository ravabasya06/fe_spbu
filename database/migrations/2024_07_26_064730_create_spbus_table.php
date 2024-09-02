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
        Schema::create('spbus', function (Blueprint $table) {
            $table->uuid('spbu_id')->primary();
            $table->string('name');
            $table->string('road');
            $table->string('city');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('island_id');
            $table->timestamps();

            $table->foreign('island_id')->references('island_id')->on('islands')->onDelete('cascade');
            $table->foreign('province_id')->references('province_id')->on('provinces')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spbus');
    }
};
