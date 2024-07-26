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
            $table->string('province');
            $table->string('island');
            $table->timestamps();
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
