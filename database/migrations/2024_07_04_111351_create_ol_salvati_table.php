<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lista_libri', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                    ->constrained('utenti')
                    ->onDelete('cascade');
            $table->string('nome_lista');
            $table->string('titolo');
            $table->string('stato');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('ol_salvati');
    }
};
