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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();
            // Define foreign keys
            $table->foreign('post_id')->references('id')->on('post')->onDelete('cascade')->onUpdate('restrict');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
