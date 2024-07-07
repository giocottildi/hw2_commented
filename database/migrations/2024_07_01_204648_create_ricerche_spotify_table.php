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
        Schema::create('ricerche_spotify', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user');
            $table->id('id_ricerca');
            $table->string('ricerca');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('utenti')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ricerche_spotify');
    }
};
