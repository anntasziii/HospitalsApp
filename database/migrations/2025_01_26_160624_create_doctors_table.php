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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospitals_id');
            $table->string('name_of_specialty');
            $table->string('name');
            $table->string('surname');

            $table->string('slug');
            $table->string('type');
            $table->mediumText('small_description')->nullable();
            $table->longText('description')->nullable();

            $table->integer('original_price');
            $table->integer('quantity');
            $table->tinyInteger('trending')->default('0')->comment('1 = trending, 0 = not-trending');
            $table->tinyInteger('featured')->default('0')->comment('1 = featured, 0 = not-featured');
            $table->tinyInteger('status')->default('0')->comment('1 = hidden, 0 = visible');

            $table->string('meta_title')->nullable();
            $table->mediumText('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();

            $table->foreign('hospitals_id')->references('id')->on('hospitals')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
