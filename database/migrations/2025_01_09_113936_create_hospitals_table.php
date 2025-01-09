<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sity');
            $table->string('region');

            $table->string('slug');
            $table->mediumText('description');
            $table->string('image')->nullable();

            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->mediumText('meta_description');

            $table->tinyInteger('status')->default('0')->comment('0 = Visible, 1 = Hidden');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hospitals');
    }
};
