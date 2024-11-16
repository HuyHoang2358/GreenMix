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
        Schema::create('recruitment', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('category_id');
            $table->string('address', 500);
            $table->unsignedInteger('num_people');
            $table->longText('description');
            $table->longText('requirements');
            $table->longText('benefit');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitment');
    }
};
