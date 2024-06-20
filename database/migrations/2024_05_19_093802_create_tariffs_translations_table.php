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
        Schema::create('tariffs_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tariff_id')->unsigned();
            $table->foreign('tariff_id')->references('id')->on('tariffs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('lang');
            $table->string('name');
            $table->string('desc');
            $table->string('info_title');
            $table->string('info_text');
            $table->json('info_items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tariffs_translations');
    }
};
