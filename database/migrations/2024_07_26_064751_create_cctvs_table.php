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
        Schema::create('cctvs', function (Blueprint $table) {
            $table->uuid('cctv_id')->primary();
            $table->string('spbu_id');
            $table->boolean('status');
            $table->bigInteger('man');
            $table->bigInteger('woman');
            $table->string('link');
            $table->timestamps();

            $table->foreign('spbu_id')->references('spbu_id')->on('spbus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cctvs');
    }
};
