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
        Schema::create('esps', function (Blueprint $table) {
            $table->id();
            $table->String('esp_id');
            $table->unsignedBigInteger('dispositivo_id');
            $table->timestamps();
        });

        Schema::table('esps', function (Blueprint $table){
            $table->foreign('dispositivo_id')->references('id')->on('dispositivos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esps');
    }
};
