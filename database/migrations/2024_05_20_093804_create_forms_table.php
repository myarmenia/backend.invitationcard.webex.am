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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('template_id');
            $table->foreign('template_id')->references('id')->on('templates')->onUpdate('cascade');
            $table->bigInteger('tariff_id')->unsigned();
            $table->foreign('tariff_id')->references('id')->on('tariffs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('promo_code')->nullable();
            $table->string('link')->nullable();
            $table->string('template_route');
            $table->string('invitation_name');
            $table->string('language');
            $table->integer('age')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('sound_path')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
