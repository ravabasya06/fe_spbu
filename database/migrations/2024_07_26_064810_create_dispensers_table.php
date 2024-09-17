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
            $table->id('dispenser_id');
            $table->string('spbu_id');
            $table->bigInteger('dispenser_number');
            $table->unsignedBigInteger('type_dispenser_id');
            $table->bigInteger('queue');
            $table->timestamps();

            $table->unique(['spbu_id', 'dispenser_number']);
            $table->foreign('spbu_id')->references('spbu_id')->on('spbus')->onDelete('cascade');
            $table->foreign('type_dispenser_id')->references('type_dispenser_id')->on('type_dispensers')->onDelete('cascade');
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
