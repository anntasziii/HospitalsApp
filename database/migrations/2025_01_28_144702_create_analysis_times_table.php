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
        Schema::create('analysis_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('analysis_id');
            $table->unsignedBigInteger('time_id')->nullable();
            $table->integer('quantity');
            $table->foreign('analysis_id')->references('id')->on('analyses')->onDelete('cascade');
            $table->foreign('time_id')->references('id')->on('times')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analysis_times');
    }
};
