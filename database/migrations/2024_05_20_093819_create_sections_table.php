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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id')->nullable();
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade')->onUpdate('cascade');
            $table->string('section_name')->nullable();
            $table->string('section_number');
            $table->string('name_1')->nullable();
            $table->string('name_2')->nullable();
            $table->string('full_name')->nullable();
            $table->string('text')->nullable();
            $table->time('time')->nullable();
            $table->string('address')->nullable();
            $table->string('address_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
