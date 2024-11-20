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
        Schema::create('post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('title', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('description', 500)->nullable();
            $table->unsignedBigInteger('type_id')->default(0);
            $table->longText('content');
            $table->longText('images');
            $table->text('seo_keyword')->nullable();
            $table->text('seo_title')->nullable();
            $table->longText('seo_description')->nullable();
            $table->integer('viewer')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
