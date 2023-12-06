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
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->boolean('estado');
            $table->float('temperatura');
            $table->string('esp_id');
            $table->unsignedBigInteger('ambiente_id');
            $table->timestamps();
        });

        Schema::table('dispositivos', function (Blueprint $table){
            $table->foreign('ambiente_id')->references('id')->on('ambientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositivos');
    }
};
