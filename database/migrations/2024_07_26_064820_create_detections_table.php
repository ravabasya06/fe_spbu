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
        Schema::create('detections', function (Blueprint $table) {
            $table->uuid('detection_id');
            $table->string('spbu_id');
            $table->string('cctv_id');
            $table->unsignedBigInteger('type_detection_id');
            $table->timestamps();

            $table->foreign('spbu_id')->references('spbu_id')->on('spbus');
            $table->foreign('cctv_id')->references('cctv_id')->on('cctvs');
            $table->foreign('type_detection_id')->references('type_detection_id')->on('type_detections');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detections');
    }
};
