<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tih_unidade', function (Blueprint $table) {
            $table->id();
            $table->String('tipo',255)->nullable();
            $table->String('nome',255)->nullable();
            $table->String('endereco',255)->nullable();
            $table->String('numero',255)->nullable();
            $table->String('bairro',255)->nullable();
            $table->String('municipio',255)->nullable();
            $table->String('contato_tel',255)->nullable();
            $table->String('contato_email',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tih_unidade');
    }
};
