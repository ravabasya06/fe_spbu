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
        Schema::create('dispensers', function (Blueprint $table) {
            $table->uuid('dispenser_id')->primary();
            $table->bigInteger('no');
            $table->string('spbu_id');
            $table->bigInteger('queue');
            $table->timestamps();

            $table->unique(['spbu_id', 'no']);
            $table->foreign('spbu_id')->references('spbu_id')->on('spbus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispensers');
    }
};
