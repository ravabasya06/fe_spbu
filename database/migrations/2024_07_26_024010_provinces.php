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
        $table->id('province_id')->primary();
        $table->string('name');
        $table->unsignedBigInteger('island_id');
        $table->timestamps();

        $table->foreign('island_id')->references('island_id')->on('islands')->onDelete('cascade');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
